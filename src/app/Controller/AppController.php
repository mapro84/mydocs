<?php
namespace src\app\Controller;

use src\Core\Controller\Controller;

class AppController extends Controller {
	
	protected $template;
	protected $viewPath;
	
	public function __construct(){
		$this->template = 'default';
		$this->viewPath = ROOTDIR . '/src/app/view/';
	}

	
}

