<?php

// set the database access info
define('DB_USER', 'root'); // define('DB_USER', 'username');
define('DB_PASSWORD', ''); // define('DB_PASSWORD', 'password');
define('DB_HOST', 'localhost:3306');
define('DB_NAME', 'restaurant');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: '.mysqli_connect_error());

mysqli_set_charset($dbc, 'utf8'); // set charset as in html page
?>
