<?php
//App::import('Vendor','PHPExcel',array('file' => 'phpexcel/PHPExcel.php'));
//App::import('Vendor','PHPExcelWriter',array('file' => 'phpexcel/PHPExcel/Writer/Excel5.php'));

class ExcelHelper extends AppHelper { 
	
	function read($file){
		$file = www_ROOT . '/' . $file;
		if (is_file($file)){
			die($file);
		}else {
			die('could not find ' . $file);
		}
		$objReader = new PHPExcel_Reader_Excel5();
		$objReader->setReadDataOnly(true);
		$objPHPExcel = $objReader->load( dirname(__FILE__) . '/xls/test_data.xls' );
		
		$rowIterator = $objPHPExcel->getActiveSheet()->getRowIterator();
		
		$array_data = array();
		foreach($rowIterator as $row){
		    $cellIterator = $row->getCellIterator();
		    $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
		    if(1 == $row->getRowIndex ()) continue;//skip first row
		    $rowIndex = $row->getRowIndex ();
		    $array_data[$rowIndex] = array('A'=>'', 'B'=>'','C'=>'','D'=>'');
		 
		    foreach ($cellIterator as $cell) {
		        if('A' == $cell->getColumn()){
		            $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
		        } else if('B' == $cell->getColumn()){
		            $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
		        } else if('C' == $cell->getColumn()){
		            $array_data[$rowIndex][$cell->getColumn()] = PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), 'YYYY-MM-DD');
		        } else if('D' == $cell->getColumn()){
		            $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
		        }
		    }
		}
		die(debug($array_data));
	}
}
