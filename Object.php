<?php
/**
 * @package Wells
 * @subpackage Config
 */

namespace Wells\Config;

/**
 * A basic concrete Config object.
 */ 
class Object extends Base {
	
	public function __construct( $data = array() ){
		$this->data = $data;
	}
	
}