<?php
/**
 * Created by PhpStorm.
 * User: moham
 * Date: 5/28/2018
 * Time: 5:34 AM
 */

require ("mysqli_connect.php");


if(!isset($_GET['isTeacher'])) {
    if ($_GET["approve"]){
        $q = "UPDATE apply_form SET approved=1 WHERE phone_number = \"".$_GET["phone_number"]."\"";
    }else{
        $q = "DELETE FROM apply_form WHERE phone_number = \"".$_GET["phone_number"]."\"";
    }
}else{
    $q = "DELETE FROM teacher WHERE lname = \"".$_GET["phone_number"]."\"";
}

$r = @mysqli_query($dbc,$q);

header("Refresh:0; url=headmaster_page.php");