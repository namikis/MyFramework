<?php
namespace app\controller;

require_once 'controller.php';

class testController extends controller{
    
    public function __construct(){
        parent::__construct();
    }

    public function testFunc(){
        echo "<br>" . $_GET['a'] . "<br>";
        return $this->view('tes', array());
    }
}