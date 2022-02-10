<?php

require_once "database.php";

$conn->query("
    CREATE TABLE users(
    id int NOT NULL AUTO_INCREMENT,
    lastname varchar(255),
    firstname varchar(255),
    email varchar(256) unique NOT NULL,
    password varchar(32) NOT NULL,
    phone_number varchar(11) NOT NULL,
    status TINYINT(3) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
    )
");