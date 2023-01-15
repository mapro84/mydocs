<?php
namespace src\app\Controller;

use src\app\Demo;
use src\app\Demo\factory\Demo as FactoryDemo;
use src\app\Demo\fluent\Demo as FluentDemo;
use src\app\Demo\DIC\Demo as DICDemo;
use src\app\Demo\Hint\Demo as HintDemo;
use src\app\Demo\Closure\Demo as ClosureDemo;

class DemoController extends AppController{

	/**
	 * 
	 * To test
	 * @return void
	 */
	public function showAll()
	{
		$closuredemo = new ClosureDemo();
        $closuredemo->demo();
	}

	public function show($demo_id) {
		$demo = Demo::find($demo_id,'demo');
		$demoContent = '';

		$demoClassName = 'src\app\Demo\\'.$demo->name.'\Demo';
		$reflexionClass = new \ReflectionClass($demoClassName);
		$demoClass = $reflexionClass->newInstance();
		$demoContent = $demoClass->demo();

		$entities = array('demo' => $demo, 'demoContent' => $demoContent);
		$this->render('demo',$entities);
	}
}
