<?php

namespace Base\Models;

use Base\Constructor\BaseConstructor;
use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;

class TwilioSms extends BaseConstructor {
	
	public function sendSmsWithApi($number, $body) {
		$sid = $this->config->get('twilio.sid');
		$token = $this->config->get('twilio.token');

		$client = new Client($sid, $token);
		
		try {
			$message = $client->messages->create($number, [
				'from' => $this->config->get('twilio.number'),
				'body' => $body
			  ]
			);

			return $message;
		} catch (TwilioException $e) {
			//Catch error if so required
        }
	}
	
}
