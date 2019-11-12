<?php

$host = "localhost";    /* Host name */
$user = "root";         /* User */
$password = "";         /* Password */
$dbname = "capstone";   /* Database name */

$con = mysql_connect($host, $user, $password) or die("Unable to connect");

// selecting database
$db = mysql_select_db($dbname, $con) or die("Database not found");