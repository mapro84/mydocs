<?php
namespace src\app\Demo\interface_ns;

interface SessionInterface {
	
    public function get($key);

    public function set($key, $value);

    public function delete($key);
	
}