<?php


$toDo = [
    [
        'task' => 'Fare la spesa',
        'completed' => true
    ],
    [
        'task' => 'Studiare PHP',
        'completed' => true
    ],
    [
        'task' => 'Bere il Thè',
        'completed' => true
    ],
    [
        'task' => 'Guardare Netflix',
        'completed' => true
    ],
];


header ('Content-Type: application/jason');
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Origin: http://localhost:5173");

echo json_encode ($toDo);

