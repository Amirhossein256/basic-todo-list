<?php
session_start();

require __DIR__ . "/config/init.php";
$path = !empty($_GET['path']) ? $_GET['path'] : 'user/login';

list($controller, $method) = explode('/', $path);

include "controller/{$controller}_controller.php";
if (function_exists($method)) {
    $method($_POST);
} else {
    view("tmp_notFound.php");
}


