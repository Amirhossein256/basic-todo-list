<?php

require_once "database.php";

$conn->query("
    CREATE TABLE todoes(
    id int NOT NULL AUTO_INCREMENT,
    user_id int,
    title varchar(256),
    description text,
    status TINYINT(3) DEFAULT 1,
    scheduled_at DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users (id)
    )
");
