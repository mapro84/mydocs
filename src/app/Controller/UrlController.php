<?php
namespace src\app\Controller;

use src\app\Entity\Url;
use src\Core\Utils\Check;
use src\Core\Utils\Debug;
use src\app\Controller\BOController;
use src\app\Controller\AppController;
use src\app\Controller\HomeController;

class UrlController extends AppController
{
  public function add()
  {
    $parameters = Check::makeSafeAssociativeArray($_POST);
    Url::addUrl($parameters);
    $boController = new BOController();
    $boController->show();
  }

  public function delete()
  {
    $parameters = Check::makeSafeAssociativeArray($_POST);
    Url::deleteUrl($parameters);
    $homeController = new HomeController();
    $homeController->show();
  }

}
	