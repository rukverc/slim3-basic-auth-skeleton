<?php

namespace Base\Controllers;

use Base\Constructor\BaseConstructor;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Base\Models\Press;
use Illuminate\Pagination\LengthAwarePaginator;

class PressController extends BaseConstructor {
	
	public function getPress(Request $request, Response $response) {
		$pressPaginate = Press::paginate($this->config->get('paginator.paginate'))->appends($request->getParams());
		$sideBar = $this->sideBarPress();
		
        return $this->view->render($response, 'press/press.php', compact('pressPaginate', 'sideBar'));
    }
	
	public function getPressDetails(Request $request, Response $response, $args) {
		$slug = $args['slug'];
		$pressMain = Press::where('slug', $slug)->first();
		$sideBar = $this->sideBarPress();
		
        return $this->view->render($response, 'press/press-details.php', compact('pressMain', 'sideBar'));
    }
	
	public function sideBarPress() {
		return Press::orderBy('published_on', 'DESC')->get();
	}
	
}
