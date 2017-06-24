<?php

namespace Base\Controllers\Admin;

use Base\Constructor\BaseConstructor;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Base\Models\User\User;

class AdminController extends BaseConstructor {
	
	public function admin(Request $request, Response $response) {
		$token = User::where('id', $this->auth->user()->id)->first();

		return $this->view->render($response, 'admin/index.php', compact('token'));
    }
	
}
