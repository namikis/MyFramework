<?php
namespace webroot;

require_once 'route.php';

//URLが存在するか判定
if(empty($_SERVER['REQUEST_URI'])){
    exit;
}

//設定ファイルからルートディレクトリを呼び出す
$ini_file = parse_ini_file("../app/app.ini", true);
$root_dir = $ini_file['SERVER']['ROOT_DIR'];
//URLを加工して大事な部分だけ取り出す
$route = str_replace($root_dir, '', $_SERVER['REQUEST_URI']);
//?でクエリーを分割する
$route = explode('?', $route);
//コントローラーと関数に分割する
$route_arr = explode('@', $route_list[$route[0]]); 
$controller = $route_arr[0];
$function = $route_arr[1];

if(file_exists('../app/controller/' . $controller . '.php')){

    include('../app/controller/' . $controller . '.php');
    $class = 'app\controller\\' . $controller;
    $obj = new $class;
    $response = $obj->$function();
    
    return $response;

}else{
    header("HTTP/1.0 404 Not Found");
    exit;
}
