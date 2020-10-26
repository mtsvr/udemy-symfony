<?php

require __DIR__.'/../vendor/autoload.php';

use App\Format\{JSON,XML,YAML};

$data = ["name" => "John", "surname" => "Doe"];

$json = new JSON($data);
$xml = new XML($data);
$yml = new YAML($data);

// var_dump($json);
// var_dump($xml);
// var_dump($yml);

var_dump($json->convert());
var_dump($xml->convert());
var_dump($yml->convert());

var_dump($json->convertFromString('{"name": "ronny", "surname": "dovs"}'));