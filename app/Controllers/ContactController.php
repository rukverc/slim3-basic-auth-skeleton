<?php

namespace Base\Controllers;

use Base\Constructor\BaseConstructor;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Base\Validation\Forms\ContactForm;

class ContactController extends BaseConstructor {
	
	public function contact(Request $request, Response $response) {
        return $this->view->render($response, 'contact/contact.php');
    }
	
	public function contactSubmit(Request $request, Response $response) {
		$validation = $this->validator->validate($request, ContactForm::rules());

		if($validation->fails()) {
			$this->flash->addMessage('error', $this->messages->get('contact.error'));
			return $response->withRedirect($this->router->pathFor('contact'));
		}

		$full_name = ucwords(strtolower($request->getParam('full_name')));
		$email_address = $request->getParam('email_address');
		$mobile_number = $request->getParam('mobile_number');
		$country = $request->getParam('country');
		$department = $request->getParam('department');
		$sub = ucwords(strtolower($request->getParam('subject')));
		$message = ucfirst($request->getParam('message'));

		$to = $this->config->get('company.contactFormEmail');
		$subject = $this->config->get('company.name') . ' - Website Enquiry';
		$body = $this->view->fetch('emails/contact.php', [
			'full_name' => $full_name,
			'email_address' => $email_address,
			'mobile_number' => $mobile_number,
			'country' => $country,
			'department' => $department,
			'subject' => $sub,
			'message' => $message
		]);

		$this->mailer->sendEmailWithApi($to, $subject, $body);
		
		unset($_SESSION['old']);
		
		$this->flash->addMessage('success', $this->messages->get('contact.success'));
		return $response->withRedirect($this->router->pathFor('contact'));
		
		/* Sending email via Mailgun SMTP
		$to = $this->config->get('company.contactFormEmail');
		$from = $request->getParam('email_address');
		$subject = $this->config->get('company.name') . ' - Website Enquiry';
		$body = $this->view->fetch('emails/contact.php', [
			'full_name' => $full_name,
			'email_address' => $email_address,
			'mobile_number' => $mobile_number,
			'country' => $country,
			'department' => $department,
			'subject' => $sub,
			'message' => $message
		]);

		$mail = $this->mailer->sendEmailWithSmtp($to, $from, $subject, $body);

		if(!$mail) {
			$this->flash->addMessage('error', 'Message could not be sent. Error: ' . $mail->ErrorInfo);
		} else {
			unset($_SESSION['old']);
			
			$this->flash->addMessage('success', $this->messages->get('contact.success'));
			return $response->withRedirect($this->router->pathFor('contact'));
		}
		*/
	}
	
}
