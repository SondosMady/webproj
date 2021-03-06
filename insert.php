<form method="post" enctype="application/x-www-form-urlencoded">

	<div class="input-c">
		<label for="email">Email</label>
		<input id="email" type="email" name="email" />
	</div>

	<div class="input-c">
		<label for="password">Password</label>
		<input id="password" type="password" name="password" />
	</div>

	<div class="input-c">
		<label for="confirm_password">Confirm Password</label>
		<input id="confirm_password" type="password" name="confirm_password" />
	</div>

	<div class="input-c">
		<label for="username">Username</label>
		<input id="username" type="text" name="username" />
	</div>

	<button type="submit">Insert</button>
	
</form>

<?php

/* Insert only when we have a post request */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    /* Some Validation */
	$requiredFields = [
		'email' => 'Email is required',
		'password' => 'Password is required',
		'confirm_password' => 'Confirm Password is required',
		'username' => 'Username is required'
	];

	foreach($requiredFields as $key => $message) {
		if (!isset($_POST[$key]) || empty($_POST[$key])) {
			die($message);
		}
	}

	if ($_POST['password'] != $_POST['confirm_password']) {
		die('Confirm password should be the same as password');
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
	$confirmationCode = md5(time());
	$insertPassword = md5($_POST['password']);
	$insertUsername = $_POST['username'];
	$datetime = date('Y-m-d H:i:s');

	try {
		$stmt = $conn->prepare("INSERT INTO users (email, confirmation_code, password, updated_at, created_at, username) VALUES (?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $email, $confirmationCode, $insertPassword, $datetime, $datetime, $insertUsername);

		/* execute prepared statement */
		$stmt->execute();

		printf("%d Row inserted.\n", $stmt->affected_rows);

		/* close statement and connection */
		$stmt->close();

	}catch(PDOException $e) {
		echo $e->getMessage();
	}	

	$conn->close();
}

?>