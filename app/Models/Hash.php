<?php

namespace Base\Models;

use Base\Constructor\BaseConstructor;

class Hash extends BaseConstructor {

	public function password($password) {
		return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
	}

	public function passwordCheck($password, $hash) {
		return password_verify($password, $hash);
	}

	public function hashed() {
		$hash = bin2hex(random_bytes(32));
		
		return $hash;
	}

	public function hashCheck($known, $user) {
		return hash_equals($known, $user);
	}
	
}
