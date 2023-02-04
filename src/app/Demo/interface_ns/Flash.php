<?php
namespace src\app\Demo\interface_ns;

use src\app\Demo\interface_ns\Session;
use src\app\Demo\interface_ns\SessionInterface;

/**
 * Designed to display flash messages with Bootstrap (get function)
 */
class Flash{

  private $session;
  const  FLASHMSG = 'flashmsg';

  public function __construct(SessionInterface $session){
    $this->session = $session;
  }

  public function set($message, $type='success'){
    $this->session->set(self::FLASHMSG, ['message' => $message, 'type' => $type]);
    
  }

  public function get(): string{
    $flash = $this->session->get(self::FLASHMSG);
    $this->session->delete(self::FLASHMSG);
    return '<div class="alert alert-'.$flash["type"].'">'.$flash["message"].'</div>';
  }

}