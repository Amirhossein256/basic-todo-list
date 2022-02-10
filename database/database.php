<?php

try {
    $dsn = "mysql:host=localhost;dbname=" . $db_info->dbname;
    $conn = new PDO($dsn, $db_info->user, $db_info->password);
} catch (PDOException $e) {
    die("cant connect to database");
}

