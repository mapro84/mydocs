<?php
namespace src\app\Demo\interface_ns;

class Session implements SessionInterface, \Countable, \ArrayAccess {
	
    public function __construct(){
        session_start();
    }

    public function get($key) {
        if($_SESSION[$key] !== null){
            return $_SESSION[$key];
        }else{
            return null;
        }
    }

    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function delete($key) {
        unset($_SESSION[$key]);
    }

    public function count(): int {
      return 2;
    }
	
    public function offsetSet(mixed $offset, mixed $value): void {
      return;
    }
    
    public function offsetExists(mixed $offset): bool {
      return true;
    }
    
    public function offsetUnset(mixed $offset): void {
      
    }
    
    public function offsetGet(mixed $offset): mixed {
      return 1;
    }


}