<?php
namespace src\classes;

/**
 * class Htmlform
 */
class Htmlform{

    private $data;
    public $surrounder = 'p';

    /**
     * @param array $data
     */
    public function __construct(array $data = []) {
        $this->data = $data;
       
    }

    /**
     * @param string $html 
     * @return string
     */
    private function surround($html){
        return "<{$this->surrounder}>$html<{$this->surrounder}>";
    }

    private function getValue($index){
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    public function getData(){
        return $this->data;
    }

    static function input($name){
        return $this->surround('<button type="text" name='.$name.'>');
    }

    public function submit(){
        return $this->surround('<button type="submit">Send</button>');
    }

}