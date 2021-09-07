<?php
namespace webroot;

$route_list = array(
    "/" => "testController@top",
    "/test/aaaa" => "testController@testFunc",
    "/test/db" => "testController@testDB"
);

function test(){
    echo "test";
}