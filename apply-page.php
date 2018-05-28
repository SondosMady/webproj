<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Apply</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/apply.css">
</head>
<body>
<?php include ("inc/header.php")?>
<?php
//This script will insert the apply form to the website database

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $fn = $_POST['first_name'];
    $ln = $_POST['last_name'];
    $e = $_POST['email'];
    $p = $_POST['phone_number'];
    $i = $_POST['interests'];

    $successful = false;

    //adding the apply form to the database
    require ("mysqli_connect.php");//connecting to the database

    $q = "INSERT INTO apply_form (first_name,last_name,email,phone_number,interests,approved) VALUES 
              ('$fn','$ln','$e','$p','$i','false')";

    $r = @mysqli_query($dbc,$q);

    if ($r){
        $successful = true;
        echo "<p class=\"success message\">Your application has been sent successfully,
        we will contact you soon...</p>";
        $_POST = array();
    }else{
        echo "<p class=\"failure message\">You could not be registered due to a system error. We apologize for
any inconvenience. Contact our customer care for help</p>";
//        echo "There's an error accrued in the database".mysqli_error($dbc);
    }
}
?>
<!--<p class="success message">hi there</p>-->
<div id="content">
    <section>
        <div id="about">
            <h1>Your SchoolMistress Online Application</h1>
            <p>Start your application here, and one of our Enrollment Advisers will be in touch to support you through
                the process.</p>
            <p>Apply now to secure your seat</p>
        </div>
        <div id="form_layout">
            <p>Already have a profile? <a href="school-login.php">Log In</a></p>
            <form action="apply-page.php" method="post">
                <h3>Student Information</h3>
                <input placeholder="First Name" type="text" name="first_name"
                       value= "<?php if (isset($_POST['first_name'])) echo $_POST['first_name'];?>">
                <input placeholder="Last Name" type="text" name="last_name"
                       value= "<?php if (isset($_POST['last_name'])) echo $_POST['last_name'];?>">
                <input placeholder="Email Address" type="text" name="email"
                       value= "<?php if (isset($_POST['email'])) echo $_POST['email'];?>">
                <input placeholder="Phone Number" type="text" name="phone_number"
                       value= "<?php if (isset($_POST['phone_number'])) echo $_POST['phone_number'];?>">
                <textarea placeholder="Write in brief about your interests" name="interests"><?php if (isset($_POST['interests'])) echo $_POST['interests'];?></textarea>
                <button>Apply</button>
            </form>
        </div>
    </section>
</div>
<?php include ("inc/footer.php")?>
</body>
</html>