<?php
/**
 * @package Wells
 * @subpackage Config
 */

namespace Wells\Config;

/**
 * A basic Config object.
 */ 
class Object {
	
	protected $data;
	
	protected $readOnly = false;
	
	protected $hasDefaults = false;
	
	protected $defaults = array();
	
	public function __construct( array $data = array() ){
		$this->data = $data;
	}
	
	public function set( $var, $val ){
		
		if ( $this->isReadOnly() )
			return false;
		
		if ( false === strpos($var, '.') ){
			return $this->data[ $var ] = $val;
		}
		
		array_set($this->data, $var, $val);	
		
		return $this;
	}
	
	public function get( $var ){
		
		if ( false === strpos($var, '.') ){
			return isset($this->data[ $var ]) ? $this->data[ $var ] : $this->getDefault($var);
		}
		
		return array_get($this->data, $var);
	}
	
	public function exists( $var ){
		$val = $this->get($var);
		return !empty($val);
	}

	public function setReadOnly( $val ){
		$this->readOnly = (bool) $val;	
		return $this;
	}
	
	public function setHasDefaults( $val ){
		$this->hasDefaults = (bool) $val;
		return $this;
	}
	
	public function isReadOnly(){
		return $this->readOnly;	
	}
	
	public function hasDefaults(){
		return $this->hasDefaults;	
	}
	
	public function setDefault( $var, $val ){
			
		if ( ! $this->hasDefaults() ){
			trigger_error("Config object may not have defaults. To use defaults, call ->setHasDefaults(true)");
			return null;
		}
		
		$this->defaults[ $var ] = $val;
		return $this;
	}
	
	public function getDefault( $var ){
		
		if ( ! $this->hasDefaults() ){
			trigger_error("Config object does not have defaults.");
			return null;
		}
		
		if ( ! isset($this->defaults[ $var ]) )
			return null;
		
		return $this->defaults[ $var ];
	}
}
