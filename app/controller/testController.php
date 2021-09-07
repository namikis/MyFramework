<?php
namespace app\controller;

require_once 'controller.php';
require_once '../app/model/test.php';

use app\model\test;

class testController extends controller{
    
    public function __construct(){
        parent::__construct();
    }

    public function top(){
        return $this->view('top');
    }

    public function testFunc(){
        //URI : /PHP/MyFramework/test/aaaa?b=330
        if(empty($_GET['b'])){
            $_GET['b'] = null;
        }
        return $this->view('test', array("test_query" => $_GET['b']));
    }

    public function testDB(){
        //URI : /PHP/MyFramework/test/db
        $testModel = new test();
        $content = $testModel->getTestDB();

        return $this->view('test_db', $content);
    }
}