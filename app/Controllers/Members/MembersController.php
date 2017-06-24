<?php

namespace Base\Controllers\Members;

use Base\Constructor\BaseConstructor;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Base\Models\User\User;

class MembersController extends BaseConstructor {
	
	public function members(Request $request, Response $response) {
		$token = User::where('id', $this->auth->user()->id)->first();

		return $this->view->render($response, 'members/index.php', compact('token'));
    }
	
}
