<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_name("session_name");

session_start();
if (!isset($_SESSION['user'])) {
	header("Location: login.php");
} else {
	echo "User is logged in";
}


?>