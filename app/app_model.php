<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @subpackage    cake.cake.libs.model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application model for Cake.
 *
 * This is a placeholder class.
 * Create the same file in app/app_model.php
 * Add your application-wide methods to the class, your models will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.model
 */
class AppModel extends Model {

    function find($type, $options = array()) {
        switch ($type) {
            case 'superlist':
                if(!isset($options['fields']) || count($options['fields']) < 3) {
                    return parent::find('list', $options);
                }

                if(!isset($options['separator'])) {
                    $options['separator'] = ' ';
                }

                $options['recursive'] = -1;
                $list = parent::find('all', $options);

                for($i = 1; $i <= 2; $i++) {
                    $field[$i] = str_replace($this->alias.'.', '', $options['fields'][$i]);
                }

                return Set::combine($list, '{n}.'.$this->alias.'.'.$this->primaryKey,
                                 array('%s'.$options['separator'].'%s',
                                       '{n}.'.$this->alias.'.'.$field[1],
                                       '{n}.'.$this->alias.'.'.$field[2]));
            break;

            default:
                return parent::find($type, $options);
            break;
        }
    }
    
	function getPageNumber($id, $rowsPerPage) {
		$result = $this->find('list'); // id => name
		$resultIDs = array_keys($result); // position - 1 => id
		$resultPositions = array_flip($resultIDs); // id => position - 1
		$position = $resultPositions[$id] + 1; // Find the row number of the record
		$page = ceil($position / $rowsPerPage); // Find the page of that row number
		return $page;
	}
}
