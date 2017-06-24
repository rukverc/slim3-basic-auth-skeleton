<?php

namespace Base\Models;

class Filters {
	
	public static function generateSlug($text) {
	  $text = preg_replace('~[^\pL\d]+~u', '-', $text);
	  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	  $text = preg_replace('~[^-\w]+~', '', $text);
	  $text = trim($text, '-');
	  $text = preg_replace('~-+~', '-', $text);
	  $text = strtolower($text);

	  if(empty($text)) {
		return 'n-a';
	  }

	  return $text;
	}
	
	public static function ip() {
		if(getenv('HTTP_CLIENT_IP')) { 
			$ip = getenv('HTTP_CLIENT_IP');
		} else if(getenv('HTTP_X_FORWARDED_FOR')) { 
			$ip = getenv('HTTP_X_FORWARDED_FOR');
		} else if(getenv('HTTP_X_FORWARDED')) { 
			$ip = getenv('HTTP_X_FORWARDED');
		} else if(getenv('HTTP_FORWARDED_FOR')) {
			$ip = getenv('HTTP_FORWARDED_FOR');
		} else if(getenv('HTTP_FORWARDED')) {
			$ip = getenv('HTTP_FORWARDED');
		} else { 
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		 
		return $ip;
	}

}
