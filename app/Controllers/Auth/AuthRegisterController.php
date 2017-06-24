<?php

namespace Base\Controllers\Auth;

use Base\Constructor\BaseConstructor;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Base\Validation\Forms\Auth\AuthForm;
use Base\Models\User\User;
use Base\Models\User\UserPermission;

class AuthRegisterController extends BaseConstructor {
	
	public function getRegister(Request $request, Response $response) {
        return $this->view->render($response, 'auth/register.php');
    }
	
    public function postRegister(Request $request, Response $response) {
		$validation = $this->validator->validate($request, AuthForm::registerRules());

		if($validation->fails()) {
			$this->flash->addMessage('error', $this->messages->get('register.error'));
			return $response->withRedirect($this->router->pathFor('getRegister'));
		}
		
		$hash = $this->hash->hashed();
		
		$user = User::create([
			'username' => mt_rand(100000, 999999),
			'email_address' => $request->getParam('email_address'),
			'first_name' => ucwords(strtolower($request->getParam('first_name'))),
			'last_name' => ucwords(strtolower($request->getParam('last_name'))),
			'mobile_number' => $request->getParam('mobile_number'),
			'password' => $this->hash->password($request->getParam('password')),
			'active' => false,
			'locked' => true,
			'active_hash' => $hash
		]);

		$user->permissions()->create(UserPermission::$user);

		$to = $request->getParam('email_address');
		$subject = $this->config->get('company.name') . ' - Account Activation';
		$body = $this->view->fetch('emails/activation.php', compact('user', 'identifier'));
		
		$this->mailer->sendEmailWithApi($to, $subject, $body);
		
		/*
		Send SMS to New Registered User
		*/
		$number = $request->getParam('mobile_number');
		$body = $this->view->fetch('sms/activation.php', compact('user', 'identifier'));
		
		$this->sms->sendSmsWithApi($number, $body);
		
		unset($_SESSION['old']);

		$this->flash->addMessage('success', $this->messages->get('register.success'));
		return $response->withRedirect($this->router->pathFor('getLogin'));
    }

}
