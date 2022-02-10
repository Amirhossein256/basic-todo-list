<?php

/*
 * @param $username string
 * @param $password string
 * @param $email string
 * @param $phone_number string
 *
 * @return void
 */
function create_user($firstname, $lastname, $password, $email, $phone_number)
{
    global $conn;
    $sql = "INSERT INTO users (firstname, lastname, password, email, phone_number) values (:firstname, :lastname,:password,:email,:phone_number)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'firstname' => $firstname,
        'lastname' => $lastname,
        'password' => md5($password),
        'email' => $email,
        'phone_number' => $phone_number
    ]);
    return $stmt->rowCount();
}

/*
 * @param $password string
 * @param $email string
 *
 * @return void
 *
 */
function login_user($email, $password){
    global $conn;
    $sql = "SELECT * FROM users WHERE `email` = :email AND `password` = :password ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'password' => md5($password),
        'email' => $email,
    ]);
    return $stmt->fetch();
}
