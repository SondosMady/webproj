<?php

if (isset($_COOKIE['counter'])) {
	setcookie("counter", $_COOKIE['counter'] + 1);
} else {
	setcookie("counter", 0);
}

echo "Counter= " . $_COOKIE['counter'];


?>