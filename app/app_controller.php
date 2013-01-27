<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * This is a placeholder class.
 * Create the same file in app/app_controller.php
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @link http://book.cakephp.org/view/957/The-App-Controller
 */
App::import('Vendor','PHPExcel',array('file' => 'phpexcel/PHPExcel.php'));

class AppController extends Controller {

    var $components = array(
        'Auth' => array(
            'authorize' => 'controller',    
            'loginRedirect' => array(
                'admin' => false,
                'controller' => 'users',
                'action' => 'dashboard'
            ),
			'authError' => 'You are not logged in. Please login to continue.', 
            'loginError' => 'An error occured with your login attempt. Please try again.'          
        ),
        'Session',
        'Email'
    );

    function isAuthorized() {
        $user = $this->getLoggedInUser();
        if (empty($user)){
            return false;
        }
        return true;

    }

    function beforeFilter(){
        parent::beforeFilter();
            // add log function here
    }

    function afterFilter(){
        parent::afterFilter();
            //$this->LogUtil->log();
    }

    function beforeRender(){
        parent::beforeRender();
        $auth_for_layout = $this->isAuthorized();
        $this->set(compact('auth_for_layout'));
        
		$availableModules = array();        
		$this->loadModel('User');	
    	$id = $this->getLoggedInUser('id');
		$user = $this->User->read(null, $id);
		if (isset($user['Module'])){
			foreach($user['Module'] as $module){
				$availableModules[$module['title']] = array($module['controller'], $module['action']);
			}   
			$this->set('availableModules', $availableModules);     
		}
        /*
        $loggedInUser = false;
        $admin = false;
        $user = $this->Auth->user();

        if (!empty($user)){
            $loggedInUser = true;
        }
        $userTypeId = $user['User']['user_type_id'];
        $userId = $user['User']['id'];

        if ($userTypeId == '3'){
            $admin = true;
        }
        $this->set(compact('loggedInUser', 'admin', 'userId'));
         * 
         */
    }

    function getLoggedInUser($returnField = ''){
        $user = $this->Auth->user();
        if (!empty($returnField)){
        	return $user['User'][$returnField];	
        }
        return $user;
    }


	function readExcel($file){
		$file = WWW_ROOT . $file;
		$data = array();
		if (!is_file($file)){
			$data['error'] = 'File ' . $file . ' not found.';
			return $data; 
		}
		$range = range('A', 'Z');
	    $fields = array();
		$excelData = array();
				
		$objReader = new PHPExcel_Reader_Excel5();
		$objReader->setReadDataOnly(true);
		$objPHPExcel = $objReader->load( $file );
		
		$rowIterator = $objPHPExcel->getActiveSheet()->getRowIterator();
		foreach($rowIterator as $row){
			$cellIterator = $row->getCellIterator();
		    $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
		    $rowIndex = $row->getRowIndex ();
		    if($rowIndex == 1) {
    		    foreach ($cellIterator as $cell) {
			    		foreach ($range as $column){
		    			$fields[$cell->getColumn()] = $cell->getValue();
			    	}
			    }		
			    continue;    		
		    }
		    foreach ($cellIterator as $cell) {
		    	foreach ($range as $column){
		    		$excelData[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
		    	}
		    }
		}

		$data['fields'] = $fields;
		$data['records'] =  $excelData;
		return $data; 
	}    
    
    function exportToExcel($fields = array(), $data = array()){
        set_time_limit(0);
		ini_set('memory_limit', '512M');

        $objPHPExcel = new PHPExcel();

        $sheet = $objPHPExcel->getActiveSheet();

        $range1 = range('A', 'Z');
        $range2 = range('A', 'Z');
        $rows = array();
        foreach ($range1 as $key => $value){
            $rows[] = $value;
        }
        foreach ($range2 as $key => $value){
            $rows[] = $value . $range1[$key];
        }
        
        $col = 1;        
        $row = 0;
        foreach ($fields as $field){
            $sheet->setCellValue($rows[$row].$col, $field);
            $row++;
        }

        foreach ($data as $key => $studentData){
            $col++;
            $row = 0;
            foreach ($studentData as $field => $value){
            	$sheet->setCellValue($rows[$row].$col, $this->humaniseBooleans($value));
            	$row++;
            }
        }

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

        $filepath = dirname(__FILE__) . '/webroot/';
        $exportFile = 'files/data/export_' . date('d-m-Y', mktime()) . '.xls';
        $objWriter->save($filepath . $exportFile);
        $this->downloadFile(WWW_ROOT . $exportFile);
        return;

    }

	/**
	 * uploads files to the server
	 * @params:
	 *		$folder 	= the folder to upload the files e.g. 'img/files'
	 *		$formdata 	= the array containing the form files
	 *		$itemId 	= id of the item (optional) will create a new sub folder
	 * @return:
	 *		will return an array with the success of each file upload
	 */
	function uploadFile($folder, $file, $itemId = null) {
		// setup dir names absolute and relative
		$folder_url = WWW_ROOT.$folder;
		$rel_url = $folder;
		
		// create the folder if it does not exist
		if(!is_dir($folder_url)) {
			mkdir($folder_url);
		}
			
		// if itemId is set create an item folder
		if($itemId) {
			// set new absolute folder
			$folder_url = WWW_ROOT.$folder.'/'.$itemId; 
			// set new relative folder
			$rel_url = $folder.'/'.$itemId;
			// create directory
			if(!is_dir($folder_url)) {
				mkdir($folder_url);
			}
		}
		
		// replace spaces with underscores
		$filename = str_replace(' ', '_', $file['name']);
		// allow all files
		$typeOK = true;
		
		// if file type ok upload the file
		if($typeOK) {
			// switch based on error code
			switch($file['error']) {
				case 0:
					// create full filename
					$full_url = $folder_url.'/'.$filename;
					$url = $rel_url.'/'.$filename;
					// upload the file
					$success = move_uploaded_file($file['tmp_name'], $url);
					// if upload was successful
					if($success) {
						// save the url of the file
						$result['url'] = $url;
					} else {
						$result['errors'][] = "Error uploaded $filename. Please try again.";
					}
					break;
				case 3:
					// an error occured
					$result['errors'][] = "Error uploading $filename. Please try again.";
					break;
				default:
					// an error occured
					$result['errors'][] = "System error uploading $filename. Contact webmaster.";
					break;
			}
		} elseif($file['error'] == 4) {
			// no file was selected for upload
			$result['nofiles'][] = "No file Selected";
		} else {
			// unacceptable file type
			$result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";
		}

		return $result;
	}
       
    function downloadFile( $fullPath ){

        // Must be fresh start
        if( headers_sent() ){
            die('Headers Sent');
        }

        // Required for some browsers
        if(ini_get('zlib.output_compression')){
            ini_set('zlib.output_compression', 'Off');
        }

        // File Exists?
        if( file_exists($fullPath) ){

            // Parse Info / Get Extension
            $fsize = filesize($fullPath);
            $path_parts = pathinfo($fullPath);
            $ext = strtolower($path_parts["extension"]);

            // Determine Content Type
            switch ($ext) {
              case "pdf": $ctype="application/pdf"; break;
              case "exe": $ctype="application/octet-stream"; break;
              case "zip": $ctype="application/zip"; break;
              case "doc": $ctype="application/msword"; break;
              case "xls": $ctype="application/vnd.ms-excel"; break;
              case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
              case "gif": $ctype="image/gif"; break;
              case "png": $ctype="image/png"; break;
              case "jpeg":
              case "jpg": $ctype="image/jpg"; break;
              default: $ctype="application/force-download";
            }

            header("Pragma: public"); // required
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Cache-Control: private",false); // required for certain browsers
            header("Content-Type: $ctype");
            header("Content-Disposition: attachment; filename=\"".basename($fullPath)."\";" );
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: ".$fsize);
            ob_clean();
            flush();
            readfile( $fullPath );
        }else {
            die('an error occured');
        }
    }

    function humaniseBooleans($value){
        if ($value == '1'){
            return 'Yes';
        }    
        if ($value == '0'){
            return 'No';
        }    
        return $value;
    }
    
    function genRandomString($length = 10) {
        $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
        $string = '';
        for ($p = 0; $p < $length; $p++) {
            $string .= $characters[mt_rand(0, strlen($characters))];
        }
        return $string;
    }

    function getMonths (){
		$months = array();
       	for ($i=1; $i<=12; $i++){
       		$months[$i] = date('F', mktime(1, 1, 1, $i, 1));
       	}	
		return $months;    	
    }
    
    function getYears (){
    	$years = array();
    	$year = date("Y");
    	$years[$year - 1] = $year - 1;
    	$years[$year] = $year;
    	$years[$year + 1] = $year + 1;
    	return $years;
    }
    
    function reformatDate($date = '01/01/1970'){
    	// remformat date from dd/mm/yyyy to yyyy/mm/dd
    	if (empty($date)){
    		return $date;
    	}
    	$dateArray = explode('/', $date);
    	$date = $dateArray[2] . '/' . $dateArray[1] . '/' . $dateArray[0];
    	return $date;
    }
    
    function reformatMySQLDate($date = '1970-01-01'){
    	//remformat mysql date from 1970-01-01 to dd/mm/yyyy
    	if (empty($date)){
    		return $date;
    	}
    	$dateArray = explode('-', $date);
    	$date = $dateArray[2] . '/' . $dateArray[1] . '/' . $dateArray[0];
    	return $date;
    }
}
