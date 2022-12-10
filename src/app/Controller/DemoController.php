<?php
namespace src\app\Controller;

use src\app\Demo;
use src\Core\Utils\Debug;
use src\app\demos\factory\Demo as DemoFactory;

class DemoController extends AppController{
	
	public function show($demo_id) {
		$demo = Demo::find($demo_id,'demo');
		$demoFactory = new DemoFactory();
		$sample = $demoFactory->demo();
		$entities = array('demo' => $demo, 'sample' => $sample);
		$this->render('demo',$entities);
	}
}

