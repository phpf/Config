<?php
/**
 * @package Phpf
 * @subpackage Config
 */

namespace Phpf\Config;

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
	
	/**
	 * Sets a config item value.
	 */
	public function set( $var, $val ){
		
		if ( $this->isReadOnly() )
			return false;
		
		if ( false === strpos($var, '.') ){
			return $this->data[ $var ] = $val;
		}
		
		array_set($this->data, $var, $val);	
		
		return $this;
	}
	
	/**
	 * Returns a config item value.
	 */
	public function get( $var ){
		
		if ( false === strpos($var, '.') ){
			return isset($this->data[ $var ]) ? $this->data[ $var ] : $this->getDefault($var);
		}
		
		return array_get($this->data, $var);
	}
	
	/**
	 * Whether a config item exists.
	 */
	public function exists( $var ){
		$val = $this->get($var);
		return !empty($val);
	}

	/**
	 * Set whether the config items are read-only.
	 */
	public function setReadOnly( $val ){
		$this->readOnly = (bool) $val;	
		return $this;
	}
	
	/**
	 * Set whether the config items can have defaults.
	 */
	public function setHasDefaults( $val ){
		$this->hasDefaults = (bool) $val;
		return $this;
	}
	
	/**
	 * Whether the config items are read-only.
	 */
	public function isReadOnly(){
		return $this->readOnly;	
	}
	
	/**
	 * Whether the config items can have defaults.
	 */
	public function hasDefaults(){
		return $this->hasDefaults;	
	}
	
	/**
	 * Set an item's default value.
	 */
	public function setDefault( $var, $val ){
			
		if ( ! $this->hasDefaults() ){
			trigger_error("Config object may not have defaults. To use defaults, call ->setHasDefaults(true)");
			return null;
		}
		
		$this->defaults[ $var ] = $val;
		return $this;
	}
	
	/**
	 * Get an item's default value.
	 */
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
