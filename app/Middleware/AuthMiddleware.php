<?php

namespace Base\Middleware;

use Base\Constructor\BaseConstructor;

class AuthMiddleware extends BaseConstructor {
	
    public function __invoke($request, $response, $next) {
		if(!$this->auth->check()) {
            $this->flash->addMessage('error', $this->messages->get('auth.error'));
            return $response->withRedirect($this->router->pathFor('getLogin'));
        }
		
		$token = $request->getAttribute('routeInfo')[2]['token'];
		
        if(!$this->hash->hashCheck($this->auth->user()->token, $token)) {
			$this->auth->user()->removeLoginToken();
			$this->auth->logout();
			$this->flash->addMessage('info', $this->messages->get('auth.info'));
			return $response->withRedirect($this->router->pathFor('getLogin'));
		}

        $response = $next($request, $response);
        return $response;
    }
	
}