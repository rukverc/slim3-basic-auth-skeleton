<?php

use Illuminate\Pagination\LengthAwarePaginator;
use Base\View\Factory;
use Illuminate\Pagination\Paginator;
use Slim\App;
use Noodlehaus\Config;
use Illuminate\Database\Capsule\Manager as Capsule;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Base\View\DebugExtension;
use Base\Auth\Auth;
use Base\Models\Hash;
use Base\Validation\Validator;
use Slim\Flash\Messages;
use Slim\Csrf\Guard;
use Base\Models\Select;
use Base\Models\MailgunEmail;
use Base\Models\TwilioSms;
use Base\Handlers\NotFoundHandler;
use Respect\Validation\Validator as v;
use Base\Middleware\ValidationErrorsMiddleware;
use Base\Middleware\OldInputMiddleware;
use Base\Middleware\CsrfViewMiddleware;
use Base\Middleware\CsrfStatusMiddleware;

session_start();

require __DIR__ . '/../vendor/autoload.php';

LengthAwarePaginator::viewFactoryResolver(function() {
	return new Factory;
});

LengthAwarePaginator::defaultView('pagination/pagination.php');

Paginator::currentPathResolver(function() {
	return isset($_SERVER['REQUEST_URI']) ? strtok($_SERVER['REQUEST_URI'], '?') : '/';
});

Paginator::currentPageResolver(function() {
	return isset($_GET['page']) ? $_GET['page'] : 1;
});

$app = new App([
	'settings' => [
		'determineRouteBeforeAppMiddleware' => true,
		'displayErrorDetails' => true,
		'addContentLengthHeader' => false
	],
]);

$container = $app->getContainer();

$container['config'] = function() {
	return new Config(__DIR__ . '/../config/' . file_get_contents(__DIR__ . '/../env.php') . '.php');
};

session_cache_limiter($container->config->get('php.sessionCacheLimiter'));
date_default_timezone_set($container->config->get('php.dateDefaultTimezoneSet'));
ini_set('display_errors', $container->config->get('php.displayErrors'));

$capsule = new Capsule;
$capsule->addConnection($container->config->get('db'));
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function($container) use ($capsule) {
	return $capsule;
};

$container['view'] = function($container) {
	$view = Factory::getEngine();
	$view->addExtension(new TwigExtension($container->get('router'), $container->get('request')->getUri()));
	$view->addExtension(new DebugExtension());
	$view->getEnvironment()->addGlobal('config', $container['config']);
	$view->getEnvironment()->addGlobal('flash', $container['flash']);
	$view->getEnvironment()->addGlobal('select', $container['select']);

    return $view;
};

$container['auth'] = function($container) {
    return new Auth($container);
};

$container['hash'] = function($container) {
    return new Hash($container);
};

$container['validator'] = function($container) {
    return new Validator;
};

$container['flash'] = function($container) {
    return new Messages;
};

$container['messages'] = function($container) {
    return new Config(__DIR__ . '/../config/messages.php');
};

$container['csrf'] = function($container) {
    $csrf = new Guard;
    $csrf->setFailureCallable(function ($request, $response, $next) {
        $request = $request->withAttribute("csrf_status", false);
        return $next($request, $response);
    });
	
    return $csrf;
};

$container['select'] = function($container) {
    return new Select;
};

$container['mailer'] = function($container) {
    return new MailgunEmail($container);
};

$container['sms'] = function($container) {
    return new TwilioSms($container);
};

$container['notFoundHandler'] = function($container) {
    return new NotFoundHandler($container);
};

v::with('Base\\Validation\\Rules\\');

$app->add(new ValidationErrorsMiddleware($container));
$app->add(new OldInputMiddleware($container));
$app->add(new CsrfViewMiddleware($container));
$app->add(new CsrfStatusMiddleware($container));
$app->add($container->csrf);

require __DIR__ . '/../app/routes.php';
