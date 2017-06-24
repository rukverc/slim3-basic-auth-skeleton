<?php

use Base\Controllers\StaticSiteController;
use Base\Controllers\PressController;
use Base\Controllers\ContactController;

use Base\Controllers\Auth\AuthRegisterController;
use Base\Controllers\Auth\AuthActivateController;
use Base\Controllers\Auth\AuthLoginController;
use Base\Controllers\Auth\AuthRecoverPasswordController;
use Base\Controllers\Auth\AuthResetPasswordController;

use Base\Controllers\Members\MembersController;
use Base\Controllers\Admin\AdminController;
use Base\Middleware\AuthMiddleware;

$app->get('/', StaticSiteController::class . ':index')->setName('index');

$app->group('/press', function() {
	$this->get('', PressController::class . ':getPress')->setName('getPress');
	$this->get('/{slug}', PressController::class . ':getPressDetails')->setName('getPressDetails');
});

$app->group('/contact', function() {
	$this->get('', ContactController::class . ':contact')->setName('contact');
	$this->post('', ContactController::class . ':contactSubmit')->setName('contactSubmit');
});

$app->group('/register', function() {
	$this->get('', AuthRegisterController::class . ':getRegister')->setName('getRegister');
	$this->post('', AuthRegisterController::class . ':postRegister')->setName('postRegister');
});

$app->group('/activatation', function() {
	$this->get('', AuthActivateController::class . ':activate')->setName('activate');
});

$app->group('', function() {
	$this->get('/login', AuthLoginController::class . ':getLogin')->setName('getLogin');
	$this->post('/login', AuthLoginController::class . ':postLogin')->setName('postLogin');
	$this->get('/logout', AuthLoginController::class . ':logout')->setName('logout');
});

$app->group('/recover-password', function() {
	$this->get('', AuthRecoverPasswordController::class . ':getRecoverPassword')->setName('getRecoverPassword');
	$this->post('', AuthRecoverPasswordController::class . ':postRecoverPassword')->setName('postRecoverPassword');
});

$app->group('/reset-password/{email_address}', function() {
	$this->get('', AuthResetPasswordController::class . ':getResetPassword')->setName('getResetPassword');
	$this->post('', AuthResetPasswordController::class . ':postResetPassword')->setName('postResetPassword');
});

$app->group('/members/{token}', function() {
	$this->get('/dashboard', MembersController::class . ':members')->setName('members');
})->add(new AuthMiddleware($container));

$app->group('/admin/{token}', function() {
	$this->get('/dashboard', AdminController::class . ':admin')->setName('admin');
})->add(new AuthMiddleware($container));
