<?php

namespace Base\Controllers\Auth;

use Base\Constructor\BaseConstructor;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Base\Validation\Forms\Auth\AuthForm;
use Base\Models\User\User;

class AuthResetPasswordController extends BaseConstructor {
	
	public function getResetPassword(Request $request, Response $response, $args) {
		$email = $args['email_address'];
		$user = User::where('email_address', $email)->first();
		
		if($user->recover_hash == null) {
			return $response->withRedirect($this->router->pathFor('getLogin'));
		}
		
        return $this->view->render($response, 'auth/reset-password.php', compact('user'));
    }
	
	public function postResetPassword(Request $request, Response $response, $args) {
		$email_address = $args['email_address'];

		$validation = $this->validator->validate($request, AuthForm::resetPasswordRules());

		if($validation->fails()) {
			$this->flash->addMessage('error', $this->messages->get('reset.required'));
			return $response->withRedirect($this->router->pathFor('getResetPassword', compact('email_address')));
		}

		$user = User::where('email_address', $email_address)->first();

		$identifier = $user->recover_hash;
		$password = $request->getParam('password');

		if(!$user || !$this->hash->hashCheck($user->recover_hash, $identifier)) {
			$this->flash->addMessage('error', $this->messages->get('reset.error'));
			return $response->withRedirect($this->router->pathFor('getResetPassword', compact('email_address')));
		} else {
			$user->update([
				'password' => $this->hash->password($password),
				'recover_hash' => null
			]);

			$to = $user->email_address;
			$subject = $this->config->get('company.name') . ' - Password Reset';
			$body = $this->view->fetch('emails/reset-password.php', compact('user'));

			$this->mailer->sendEmailWithApi($to, $subject, $body);

			/*
			Send SMS to New Registered User
			*/
			$number = $user->mobile_number;
			$body = $this->view->fetch('sms/reset-password.php', compact('user'));

			$this->sms->sendSmsWithApi($number, $body);

			unset($_SESSION['old']);

			$this->flash->addMessage('success', $this->messages->get('reset.success'));
			return $response->withRedirect($this->router->pathFor('getLogin'));
		}
	}

}
