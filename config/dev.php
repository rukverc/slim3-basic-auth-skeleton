<?php

return [
	'php' => [
		'sessionCacheLimiter' => false,
		'dateDefaultTimezoneSet' => 'Asia/Bangkok', //Replace 'your Timezone in LIVE Production
		'displayErrors' => 'On', //Replace with 'Off' in LIVE Production
	],
	
	'lang' => [
        'locale' => 'en'
    ],
	
	'meta' => [
		'title' => 'Your Title',
		'description' => '',
		'robots' => 'index, follow'
	],
	
	'company' => [
		'name' => 'Your Company',
		'phone' => '+000-000-0000',
		'email' => 'info@domain.com',
		'address' => 'Any Address, Any City, Any Country. 123456',
		'contactFormEmail' => 'info@domain.com'
	],
	
	'body' => [
		'onContextMenu' => 'return true'
	],
	
	'db' => [
		'driver' => 'mysql',
		'host' => '127.0.0.1',
		'database' => 'test',
		'username' => 'root',
		'password' => '',
		'charset' => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix' => ''
	],
	
	'auth' => [
		'remember' => 'user_r'
	],
	
	'paginator' => [
		'paginate' => 3
	],
	
	'mailgun' => [
		'apikey' => '',
		'domain' => '',
		'from' => '',
		'host' => 'smtp.mailgun.org',
		'username' => '',
		'password' => ''
	],
	
	'twilio' => [
		'sid' => '',
		'token' => '',
		'number' => '',
		'my_number' => 'YOUR_MOBILE_NUMBER', //Optional for internal SMS - Replace 'YOUR_MOBILE_NUMBER' with e.g '+66123456789'
		'name' => 'YOUR_GREETING_NAME' //Optional for internal SMS - Replace 'YOUR_GREETING_NAME' with e.g 'John'
	],
	
	'recaptcha' => [
		'sitekey' => '',
		'secretkey' => ''
	],
];
