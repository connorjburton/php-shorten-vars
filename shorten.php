<?php

/** STILL WIP **/

class ShortenVars {

	public function shorten_vars($data) {
		if(is_array($data)) {
			$data = array_map(array($this, 'shorten_vars'), $data);
		} else if(is_object($data)) {
	    		$check = array();
	  		$obj_to_arr = json_decode(json_encode($data), true);
	  
	  		$data = array_map(function($k, $v) use (&$check) {
	  			$new = $k[0];
	  			$new = $this->add_letters($new, $k, $check);
	  		}, array_keys($obj_to_arr), $obj_to_arr);
	  	}
	  
	 	return $data;
	}
	  
  	private function add_letters($new, $key, &$check, $times = 1) {
  		foreach($this->strpos_r($key, '_') as $pos) {
  			for ($i=0; $i < $times; $i++) {
  				$new += '_' . $k[$pos + $i];
  			}
  		}
  
  		if($check[$new]) {
  			return $this->add_letters($new, $key, $check, $times++);
  		} else {
  			$check[$new] = true;
  			return $new;
  		}
  	}
  
  	private function strpos_r($haystack, $needle) {
  		if(strlen($needle) > strlen($haystack))
          	trigger_error(sprintf("%s: length of argument 2 must be <= argument 1", __FUNCTION__), E_USER_WARNING);
  
  	    $seeks = array();
  
  	    while($seek = strrpos($haystack, $needle))
  	    {
  	        array_push($seeks, $seek);
  	        $haystack = substr($haystack, 0, $seek);
  	    }
  	    return $seeks;
  	}
}
