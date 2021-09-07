<?php
namespace app\model;

require_once 'model.php';

class test extends model{
    
    public function __construct(){
        parent::__construct();
    }

    public function getTestDB(){
        $sql = <<< EOF
            select image_name from contents where company_id = 1;
        EOF;
        return $this->crud($sql, "select");
    }
}