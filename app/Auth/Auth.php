<?php

namespace Base\Auth;

use Base\Models\User\User;

class Auth {
	
    public function user() {
        return User::find($_SESSION['user']);
    }

    public function check() {
        return isset($_SESSION['user']);
    }

    public function logout() {
        unset($_SESSION['user']);
    }
	
}
