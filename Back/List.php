<?php
header ('Content-Type: application/jason');
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Origin: http://localhost:5173");



$jsonList = file_get_contents ("list.json");

echo $jsonList;

