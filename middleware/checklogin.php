<?php

$path = !empty($_GET['path']) ? $_GET['path'] : 'user/login';

$loggedin = !empty($_SESSION['loggedin']) ? 1 : 0 ;

if(preg_match('/^dashboard\/*/i',$path)){
    if (!$loggedin) {
        header('Location: ' . BASEURL . '/user/login');
        exit();
    }
}

if(preg_match('/^user\/(login|register)/i',$path) || empty($path)){
    if ($loggedin) {
        header('Location: ' . BASEURL . '/dashboard/index');
        exit();
    }
}
