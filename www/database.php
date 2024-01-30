<?php

$host =         "mariadb";
$dbuser =       "root";
$dbpassword =   "password";
$dbname =       "mobile4you";

$conn = mysqli_connect($host, $dbuser, $dbpassword, $dbname);

echo mysqli_connect_error();