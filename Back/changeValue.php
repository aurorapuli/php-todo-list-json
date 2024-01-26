<?php
header ('Content-Type: application/json');
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Origin: http://localhost:5173");

$jsonList = file_get_contents("list.json");

$list = json_decode($jsonList, true);

$index = $_GET['index'];
$value = $_GET['value'];

$list[$index]['completed'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);;

$jsonList = json_encode($list);

file_put_contents("list.json", $jsonList);

echo $jsonList;


