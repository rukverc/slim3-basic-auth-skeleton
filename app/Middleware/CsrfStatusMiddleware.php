<?php

namespace Base\Middleware;

use Base\Constructor\BaseConstructor;

class CsrfStatusMiddleware extends BaseConstructor {
	
    public function __invoke($request, $response, $next) {
        if($request->getAttribute('csrf_status') === false) {
			$this->flash->addMessage('error', $this->messages->get('csrf.error'));
			return $response->withRedirect($_SERVER['HTTP_REFERER']);
		}

        $response = $next($request, $response);
        return $response;
    }
	
}
