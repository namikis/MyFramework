<?php
namespace app\controller;

abstract class controller{
    
    public function __construct(){
        date_default_timezone_set('Asia/Tokyo');
    }

    public function view(string $template, array $param=null){
        require("../app/view/" . $template . ".php");
        return true;
    }
}