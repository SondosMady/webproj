<?php
/**
 * Created by PhpStorm.
 * User: moham
 * Date: 5/27/2018
 * Time: 11:13 PM
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $t = $_POST['name'];
    $y = $_POST['year'];
    $m = $_POST['month'];
    $d = $_POST['day'];

    $date = $y."-".$m."-".$d;

    require ("mysqli_connect.php");
    $q = "INSERT INTO events(name,date) VALUES ('$t','$date')";
    $r = @mysqli_query($dbc,$q);

    $_POST = array();

    if ($r){
        $successful = true;
        $message = "The Event Has Been Post Successfully";
    }else{
        $successful = false;
        $message = "The Event has not been post due to a system error. We apologize for
                    any inconvenience";
    }

    header('Location: headmaster_page.php?successful='.$successful);
}