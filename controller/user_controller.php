<?php


function register($request)
{
    if (empty($request)) {
        return view('tmp_register.php');
    }
    if (empty($request['firstname'])) {
        return msg("value is null!", 'error');
    }
    $res = create_user($request['firstname'], $request['lastname'], $request['password'], $request['email'], $request['phone_number']);
    if (!$res) {
        return "database error!";
    }
    login($request);
}


function login($request)
{
    if (isset($request['email'])) {
        $res = login_user($request['email'], $request['password']);
        if (!$res) {
            return msg("user or password Is wrong!", 'error');
        }
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $res['id'];
        header('Location: /todolist/dashboard/index');
        exit();
    } else {
        view('tmp_login.php');
    }

}

function logout(){
    if($_SESSION['loggedin']){
        session_destroy();
        session_abort();
        return msg('ok', 'ok');
    }
}