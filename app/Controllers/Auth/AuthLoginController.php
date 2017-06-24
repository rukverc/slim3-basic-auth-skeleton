<?php

namespace Base\Controllers\Auth;

use Base\Constructor\BaseConstructor;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Base\Validation\Forms\Auth\AuthForm;
use Base\Models\User\User;
use Carbon\Carbon;

class AuthLoginController extends BaseConstructor {

    public function getLogin(Request $request, Response $response) {
        return $this->view->render($response, 'auth/login.php');
    }

    public function postLogin(Request $request, Response $response) {
		$validation = $this->validator->validate($request, AuthForm::loginRules());

		if($validation->fails()) {
			$this->flash->addMessage('error', $this->messages->get('login.error'));
			return $response->withRedirect($this->router->pathFor('getLogin'));
		}

		$identifier = $request->getParam('email_or_username');
		$email_address = $request->getParam('email_address');
		$password = $request->getParam('password');
		$remember = $request->getParam('remember');

		$user = User::where(function($query) use ($identifier) {
			return $query->where('email_address', $identifier)->orWhere('username', $identifier);
		})->first();

		if(!$user || !$this->hash->passwordCheck($password, $user->password)) {
			$this->flash->addMessage('error', $this->messages->get('login.notUser'));
			return $response->withRedirect($this->router->pathFor('getLogin'));
		}

		if(!$user->active == true) {
			$this->flash->addMessage('warning', $this->messages->get('login.notActive'));
			return $response->withRedirect($this->router->pathFor('getLogin'));
		}

		if(!$user->recover_hash == null) {
			$this->flash->addMessage('warning', $this->messages->get('login.passwordReset'));
			return $response->withRedirect($this->router->pathFor('getLogin'));
		}

		$locked = User::where('locked', true)->where(function($query) use ($identifier) {
			return $query->where('email_address', $identifier)->orWhere('username', $identifier);
		})->first();

		if($locked) {
			$this->flash->addMessage('warning', $this->messages->get('login.locked'));
			return $response->withRedirect($this->router->pathFor('getLogin'));
		}

		if($user && $this->hash->passwordCheck($password, $user->password)) {
			$_SESSION['user'] = $user->id;

			$token = $this->hash->hashed();

			$user->createLoginToken($token);

			if($remember === 'on') {
				$rememberIdentifier = $this->hash->hashed();
				$rememberToken = $this->hash->hashed();

				$user->updateRememberCredentials(
					$rememberIdentifier,
					$this->hash->hashed($rememberToken)
				);

				setcookie($this->config->get('auth.remember'), 
					$rememberIdentifier . '___' . $rememberToken, 
					Carbon::parse('+1 month')->timestamp
				);
			}

			if($this->auth->user()->isGroup()) {
				return $response->withRedirect($this->router->pathFor('admin', compact('token')));
			} else {
				return $response->withRedirect($this->router->pathFor('members', compact('token')));
			}
		} else {
			$this->flash->addMessage('warning', $this->messages->get('login.notActive'));
			return $response->withRedirect($this->router->pathFor('getLogin'));
		}
    }
	
	public function logout(Request $request, Response $response) {
		if(isset($_COOKIE[$this->config->get('auth.remember')])) {
			$this->auth->user()->removeRememberCredentials();
			setcookie($this->config->get('auth.remember'), null, 1);
		}
		
		$this->auth->user()->removeLoginToken();
		$this->auth->logout();
		
		$this->flash->addMessage('warning', $this->messages->get('login.logout'));
        return $response->withRedirect($this->router->pathFor('getLogin'));
    }

}
