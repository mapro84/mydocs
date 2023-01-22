<?php
namespace src\Core\Html;

use src\Core\Html\Html;

/**
 * class BootstrapHtml
 */
class BootstrapHtml implements Html{

    private $data;
    private $surrounder;
    private $cssClass;
    private $pre;

    public function __construct($surrounder="div", $cssClass="col demoBody", $pre=true) {
        $this->surrounder = $surrounder;
        $this->cssClass = $cssClass;
        $this->pre = $pre;
        $this->startData();
    }

    public function startData(){
        $pre = $this->pre === true ? '<pre>' : '';
        $this->data = "<{$this->surrounder} class='{$this->cssClass}'>{$pre}";
    }

    public function addData($content, $pre=true){
        $this->data .= $content;
    }

    public function endData(){
        $pre = $this->pre === true ? '</pre>' : '';
        $this->data .= "{$pre}</{$this->surrounder}>";
    }

    public function getData(){
        return $this->data;
    }

    public function addTitle($title) {
        $this->data .= "<div class='demoTitle'>{$title}</div>";
    }

    public function addResult($content, $inline = true){
        $result =  $inline === true ? '<span class="demoResult"> ==> '.$content.'</span>' : '==> '.$content;
        $this->data .= $result;
    }

    public function addComment($content, $inline = true){
        $result =  $inline === true ? '<span class="demoComment"> '.$content.'</span>' : '==> '.$content;
        $this->data .= $result;
      }

    public function addSeparator($separator='<hr>'){
        $this->data .= $separator;
    }

    public function addDiv(){
        $this->data .= '<div class="demoCode">';
    }

    public function endDiv(){
        $this->data .= '</div>';
    }

    public function addLine($numberLine=1){
        for($i=0;$i<$numberLine;$i++){
          $this->data .= '<br>';
        }
    }

}