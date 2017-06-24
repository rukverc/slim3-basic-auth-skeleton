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
		'apikey' => 'key-8664038559d1e39d113095a411b4c67b',
		'domain' => 'sandbox8604c6f181c24989969ebe64c06a6ef1.mailgun.org',
		'from' => 'noreply@iconic-publishing.com',
		'host' => 'smtp.mailgun.org',
		'username' => 'postmaster@sandbox8604c6f181c24989969ebe64c06a6ef1.mailgun.org',
		'password' => 'kinky123'
	],
	
	'twilio' => [
		'sid' => 'AC835dbcfe33dfd8cf272051856483c243',
		'token' => '875358dd3bebfbe02033c7cb418397f8',
		'number' => '+14242851703',
		'my_number' => 'YOUR_MOBILE_NUMBER', //Optional for internal SMS - Replace 'YOUR_MOBILE_NUMBER' with e.g '+66123456789'
		'name' => 'YOUR_GREETING_NAME' //Optional for internal SMS - Replace 'YOUR_GREETING_NAME' with e.g 'John'
	],
	
	'recaptcha' => [
		'sitekey' => '',
		'secretkey' => ''
	],
];
