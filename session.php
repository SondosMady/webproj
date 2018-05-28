<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_name("session_name");

session_start();
if (isset($_SESSION['counter'])) {
	$_SESSION['counter'] = $_SESSION['counter'] + 1;
} else {
	$_SESSION['counter'] = 0;
}

echo "Counter= " . $_SESSION['counter'];


?>