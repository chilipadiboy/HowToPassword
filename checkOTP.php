<?php 
	require 'connect.php';
	session_start();

	//get user-entered OTP
	$_SESSION['userOTP'] = mysqli_real_escape_string($conn, $_POST['password']);

	//check OTP in database
	$dbOTP = "SELECT password FROM userbase WHERE username = $_SESSION['user_name']";

	if ($conn -> query($dbOTP) == TRUE) { 
		//check user-entered OTP against OTP in database
		if ($dbOTP == $_SESSION['userOTP']) {
			echo "Authentication success";

			//some actions

		} else {
			echo "Authentication failed";
		}

		//clear OTP after authentication 
		$clearOTP = "UPDATE userbase SET password = null WHERE username = $_SESSION['user_name']";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
?>