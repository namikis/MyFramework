<?php
namespace app\model;

use PDO;

abstract class model{
    
    public function __construct(){
        $ini_file = parse_ini_file("../app/app.ini", true);
        $DB_type = $ini_file['DB']['DB_TYPE'];
        $DB_name = $ini_file['DB']['DB_NAME'];
        $host = $ini_file['DB']['HOST'];
        $user = $ini_file['DB']['USER'];
        $pass = $ini_file['DB']['PASSWORD'];
        try {
            switch($DB_type){
                case 'MySQL':
                    $dsn = 'mysql:dbname=' . $DB_name . ';host=' . $host;
                    $this->dbh = new PDO($dsn, $user, $pass);
                    break;
            }
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function select($sql){
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute();
            $rec = $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $rec;
    }


}