<link rel="stylesheet" type="text/css" href="style.css" />
<?php

session_start(); // Start your sessions to allow your page to interact with session variables
// Connect to the database
include_once("connect.php");
// Check to see if the username textbox has data in it
if (isset($_POST['username'])) {
	// Defining local variables from the POST variables
	$username = $_POST['username'];
	$password = $_POST['password'];
	// Select data from the users table depending on the entered inputs
	$sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."' LIMIT 1";
	// Execute the SELECT query
	$res = mysql_query($sql) or die(mysql_error());
	// Check to see if the data entered into the login form matches the database information
	if (mysql_num_rows($res) == 1) {
		// Pull data from the database
		$row = mysql_fetch_assoc($res);
		// Assign session variables with the id and username from the database
		$_SESSION['uid'] = $row['id'];
		$_SESSION['username'] = $row['username'];
		header("Location: index.php");
		exit();
	} else {
		header( "refresh:1;url=index.php" );
		echo "<p><a href='index.php'>Galitaankaagu ma saxna Fadlan ku noqo Bogga Hore</a></p>";
		exit();
	}
}

?>