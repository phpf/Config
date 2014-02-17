<?php
/**
 * @package Wells
 * @subpackage Config
 */

namespace Wells\Config;

/**
 * Class for generating config object from .ini file.
 * 
 * @package Config
 * @subpackage Ini
 */
class Ini extends File {
	
	protected $showSections = false;
		
	public function setShowSections( $val ){
		$this->showSections = (bool) $val;	
	}
	
	public function parse(){
		$this->data = \parse_ini_file_to_array( $this->configFile, $this->showSections );
	}
}