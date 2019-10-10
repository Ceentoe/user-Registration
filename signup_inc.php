<?php 
if (isset($_POST['submit'])) {
	include_once 'dbh_inc.php';

	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$userid = mysqli_real_escape_string($conn, $_POST['userid']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//check empty field
	if (empty($fname) || empty($lname) || empty($userid) || empty($email) || empty($pwd)) {
		header("Location: ../signup.php?signup=empty");
		exit();
	}
		else{
			//valid email
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=invalidEmail");
				exit();
			}
			else{
				$sql = "SELECT * FROM users WHERE user_userid = '$userid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header("Location: ../signup.php?signup=userAlreadyExists");
					exit();
				}
				else{
					//hash pwd
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

					//insert user into database
					$sql = "INSERT INTO users (user_fname, user_lname, user_userid, user_email, user_pwd) VALUES ('$fname', '$lname', '$userid', '$email', '$hashedPwd');";
					mysqli_query($conn, $sql);

					header("Location: ../signup.php?signup=success");
					exit();
				}
			}
		}
	}




//} 
else{
	header("Location: ../signup.php");
	exit();
}