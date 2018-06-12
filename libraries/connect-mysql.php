<?php

include_once ('../libraries/Database.php');

$host = 'basicphp_mysql_1:3306';
$db   = 'blogs';
$user = 'root';
$pass = 'admin';
$charset = 'utf8';

return new Database($host, $db, $user, $pass);