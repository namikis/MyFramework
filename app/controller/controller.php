<?php
namespace app\controller;

abstract class controller{
    
    public function __construct(){
        date_default_timezone_set('Asia/Tokyo');
    }

    public function view(string $template, array $param){
        echo "controller!!!!";
        //smarty
        return "tes";
    }
}