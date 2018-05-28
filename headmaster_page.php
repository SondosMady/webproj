<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Headmaster</title>
    <link rel="stylesheet" href="css/headmaster.css">
    <script src="scripts/headmaster.js"></script>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $t = $_POST['title'];
    $c = $_POST['content'];

    require ("mysqli_connect.php");
    $q = "INSERT INTO news(title,content) VALUES ('$t','$c')";
    $r = @mysqli_query($dbc,$q);

    $_POST = array();
    global $successful;
    global $message;

    if ($r){
        $successful = true;
        $message = "The News Has Been Post Successfully";
    }else{
        $successful = true;
        $message = "The News has not been post due to a system error. We apologize for
                    any inconvenience";
    }

    include ("popupMessage.php");
}else if(isset($_GET['successful'])){
    global $successful;
    global $message;

    $successful = $_GET['successful'];

    if($successful){
        $message = "The Event Has Been Post Successfully";
    }else{
        $message = "The Event has not been post due to a system error. We apologize for
                    any inconvenience";
    }

    include ("popupMessage.php");
    $_GET = array();
}
?>
<header>
    <a id="logout_link">Log Out | Kahala<?php if(isset($_SESSION['username'])) echo $_SESSION['username']?></a>
    <ul class="nav">
        <li><a class="selected" onclick="newsAndEvents()">News & Events</a></li>
        <li><a onclick="getForms()">Student's Applications</a></li>
        <li><a onclick="getTeachers()">Teachers</a></li>
        <li><a>Grade's Sections</a></li>
        <li><a>Section's Students</a></li>
        <li><a>Section's Schedule</a></li>
    </ul>
</header>
<section id="contents">

</section>
<script>document.getElementsByClassName('selected')[0].click();console.log("hi")</script>
</body>
</html>
