<?php

/* Insert only when we have a post request */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    /* Some Validation */
	$requiredFields = [
		'email' => 'Email is required',
		'password' => 'Password is required',
	];

	foreach($requiredFields as $key => $message) {
		if (!isset($_POST[$key]) || empty($_POST[$key])) {
			die($message);
		}
	}

	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  		die('Invalid email format'); 
	}

	$servername = "localhost";
	$username = "c34_2018";
	$password = "comp334!";
	$dbname = "c34_2018";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$email = $_POST['email'];
	$insertPassword = md5($_POST['password']);
	
	/* Select data */
	$sql = "SELECT * FROM users where email ='" . $email ."'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row['email'] == $email && $row['password'] == $insertPassword) {
				echo "info is correct";
				session_name("session_name");
				session_start();
				$_SESSION['user'] = $row;
				header("Location: profile.php");
				break;
			}
		}
	} else {
		echo "0 results";
	}

	$conn->close();
	
}

?>
<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Teacher Profile</title>
  <meta name="author" content="Sondos">
  <link rel="shortcut icon" href="images/shortcut.jpg">
  <link rel="icon" href="images/shortcut.jpg">
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
   <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/applyCSS.css">
 
</head>

<body>
<header>
    <a href="project-html.html"><img src="images/school_logo2.png"/></a>
    <h1>Your SchoolMisters</h1>
    <a href="school-login.html">Log In</a>
    <nav>
        <a class="nav_bar">About</a>
        <a class="nav_bar">Admissions</a>
        <a class="nav_bar" href="tuitionFeesPage.html">Tuition & Feeds</a>
        <a class="nav_bar" href="applyPage.html">Apply</a>
        <a href="contact-us.html">Contact US</a>
    </nav>
</header>

<div id="content">
  <div id="topbar">
  </div>
  
  <div id="w">
    <div id="content" class="clearfix">
      <div id="userphoto"><img src="images/profile-img.png" alt="default profile image"></div>
      <h1>Teacher Profile</h1>

      <nav id="profiletabs">
        <ul class="clearfix">
          <li><a href="#bio" class="sel">Bio</a></li>
          <li><a href="#activity">Activity</a></li>
          <li><a href="#schedule">Schedule</a></li>
          <li><a href="#settings">Settings</a></li>
		  <li><a href="#Students List">Students List</a></li>
          <li><a href="#schedule">Schedule</a></li>
          <li><a href="#schedule">Schedule</a></li>

        </ul>
      </nav>
      
      <section id="bio">
        <p>Teacher Name:</p>
        
        <p>Teacher Id:</p>
        
        <p>Teacher Age: </p>
      </section>
      
      <section id="activity" class="hidden">
        <p>Most recent actions:</p>
        
        <p class="activity">@10:15PM - Submitted an assignment </p>
        
        <p class="activity">@9:50PM - Submitted assignment 2 </p>
        
        <p class="activity">@8:15PM - Posted a reply</p>
        
        
        
        <p class="activity">@12:30PM - Submitted an assignment</p>
      </section>
      
      <section id="schedule" class="hidden">
        <p>Courses list:</p>
        
        <ul id="courseslist" class="clearfix">
          <li><a href="#"><img src="images/math.png" width="22" height="22"> Math</a></li>
          <li><a href="#"><img src="images/English.png" width="22" height="22"> English</a></li>
          <li><a href="#"><img src="images/Arabic.png" width="22" height="22"> Arabic</a></li>
        </ul>
      </section>
      
      <section id="settings" class="hidden">
        <p>Edit your user settings:</p>
        
        <p class="setting"><span>E-mail Address <img src="images/edit.png" alt="*Edit*"></span> sondos.abdd@gmail.com</p>
        
        <p class="setting"><span>Language <img src="images/edit.png" alt="*Edit*"></span> English(US)</p>
        
        <p class="setting"><span>Profile Status <img src="images/edit.png" alt="*Edit*"></span> Public</p>
        
        <p class="setting"><span>Update Frequency <img src="images/edit.png" alt="*Edit*"></span> Weekly</p>
        
        <p class="setting"><span>Connected Accounts <img src="images/edit.png" alt="*Edit*"></span> None</p>
      
	  </section>
	  	 
    </div><!-- @end #content -->
  </div><!-- @end #w -->

			  
<script type="text/javascript">
$(function(){
  $('#profiletabs ul li a').on('click', function(e){
    e.preventDefault();
    var newcontent = $(this).attr('href');
    
    $('#profiletabs ul li a').removeClass('sel');
    $(this).addClass('sel');
    
    $('#content section').each(function(){
      if(!$(this).hasClass('hidden')) { $(this).addClass('hidden'); }
    });
    
    $(newcontent).removeClass('hidden');
  });
});
</script>
</div>

</body>
<footer>
    <h1>Developers</h1>
    <ul>
        <li><p>Sondos</p></li>
        <li><p>Ashjan</p></li>
        <li><p>Kahala</p></li>
    </ul>
    <p>Copyright &copy; 2018 comp334-project.birzeit.edu All rights reserved.</p>
</footer>
</html>