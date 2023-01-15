<?php
namespace src\app\Controller;

use src\Core\Utils\Debug;
use src\Core\Utils\Check;
use src\app\Url;

class UrlController extends AppController
{
  public function add()
  {
    $parameters = Check::makeSafeAssociativeArray($_POST);
    Url::addUrl($parameters);
    $boController = new BOController();
    $boController->show();
  }

}
	