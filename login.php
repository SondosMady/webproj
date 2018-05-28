<form method="post" enctype="application/x-www-form-urlencoded">

	<div class="input-c">
		<label for="email">Email</label>
		<input id="email" type="email" name="email" />
	</div>

	<div class="input-c">
		<label for="password">Password</label>
		<input id="password" type="password" name="password" />
	</div>

	<button type="submit">Submit</button>
	
</form>

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
				header("Location: student-profile.php");
				break;
			}
			
		}
	} else {
		echo "0 results";
	}

	$conn->close();
	
}

?>