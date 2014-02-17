<?php
/**
 * @package Wells
 * @subpackage Config
 */

namespace Wells\Config;

/**
 * Class for generating config object from a file. 
 *
 * @package Config
 * @subpackage File
 */
abstract class File extends Base {
	
	protected $configFile;
	
	abstract public function parse();
	
	public function __construct( $file = null ){
		
		if ( !empty($file) )
			$this->configFile = $file;
	}
	
	public function setConfigFile( $file ){
		$this->configFile = $file;
		return $this;
	}
}
