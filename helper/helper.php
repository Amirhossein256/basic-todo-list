<?php

function view($path, $data = null)
{
    include __DIR__ . "/../tmp/" . $path;
}

function msg($msg, $type)
{
    global $path;
    $_SESSION['msg'] = $msg;
    $header = 'Location: ' . BASEURL . "/" . "?error";
    return header($header);
}