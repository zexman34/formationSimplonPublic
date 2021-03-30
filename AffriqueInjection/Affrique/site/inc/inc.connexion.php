<?php

const DB_OPTION = [
    PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
    PDO::MYSQL_ATTR_FOUND_ROWS    => true // track affected SQL rows, using rowCount
  ];

  $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "; charset=utf8mb4", DB_LOGIN, DB_PASS , DB_OPTION); //Adaptation des variables 🍑

?>
