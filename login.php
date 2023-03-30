<?php
// Start a session
session_start();

// Include the database connection file
include_once "connections.php";

$con = connection();

// Check if the form was submitted
if (isset($_POST['submit'])) 
  // Get the username and password from the form data
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Prepare a MySQL query to check if the username and password are valid
    $sql = "SELECT * FROM student_users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $sql);
 
   // Check if the query returned a result
   if (mysqli_num_rows($result) > 0) {

     // Set the user's session variables and redirect to the home page

     $_SESSION['username'] = $username;
     header("Location: home.php");
     exit();
   } else {

     // Display an error message if the credentials are invalid
     echo "Invalid username or password.";
   }


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="login-box">
		<h2>Login Here</h2>
		<form action="login.php" method="post">
			<div class="user-box">
				<input type="text" name="username" required="">
				<label>Username</label>
			</div>
			<div class="user-box">
				<input type="password" name="password" required="">
				<label>Password</label>
			</div>
			<input type="submit" name="submit" value="Login">
		</form>
	</div>
</body>
</html>
