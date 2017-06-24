<?php

namespace Base\Controllers\Auth;

use Base\Constructor\BaseConstructor;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Base\Models\User\User;

class AuthActivateController extends BaseConstructor {
	
    public function activate(Request $request, Response $response) {
		$email_address = $request->getParam('email_address');
		$identifier = $request->getParam('identifier');
	    
		$active = User::where('email_address', $email_address)->where('active', true)->first();
		
		if($active) {
			$this->flash->addMessage('info', $this->messages->get('activate.active'));
			return $response->withRedirect($this->router->pathFor('getLogin'));
		}
		
		$user = User::where('email_address', $email_address)->where('active', false)->first();
	
		if(!$user || !$this->hash->hashCheck($user->active_hash, $identifier)) {
			$this->flash->addMessage('error', $this->messages->get('activate.problem'));
			return $response->withRedirect($this->router->pathFor('getLogin'));
		} else {
			$user->activateAccount();
			
			$to = $user->email_address;
			$subject = $this->config->get('company.name') . ' - Account Verification';
			$body = $this->view->fetch('emails/verification.php', compact('user'));

			$this->mailer->sendEmailWithApi($to, $subject, $body);
			
			/*
			Send SMS to New Registered User
			*/
			$number = $user->mobile_number;
			$body = $this->view->fetch('sms/verification.php', compact('user', 'identifier'));

			$this->sms->sendSmsWithApi($number, $body);
			
			$this->flash->addMessage('success', $this->messages->get('activate.success'));
			return $response->withRedirect($this->router->pathFor('getLogin'));
		}
    }
	
}
