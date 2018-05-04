<?php
	session_start();
	// check if login button is clicked
	if(isset($_POST['btn-login'])){
		// button is clicked proceed next

		// make coonection with database
		require_once '../connection/connection.php';

		// retrieve data from login form 
		$username = mysqli_real_escape_string($conn, $_POST['uname']);
		$password = mysqli_real_escape_string($conn, $_POST['pwd']);

		//check if any of the fields are empty
		if(empty($username) || empty($password)){
			header('Location: ../index.php?login=emptyfields');
			exit();
		}else{
			// both fields have some data
			$loginsql = "SELECT * FROM login WHERE uname = '$username' OR email = '$username' ";
			$result = mysqli_query($conn, $loginsql);
			$resultCheck = mysqli_num_rows($result);

			// check if username or email exist
			if($resultCheck < 1){
				// username or email doesn't exist in tha databse
				header('Location: ../index.php?login=invalid');
				exit();
			}else{
				// check if password is coorect
				if($row = mysqli_fetch_assoc($result)){
					// De-hash tha password
					$hashedPasswordCheck = password_verify($password, $row['pwd']);
					if($hashedPasswordCheck == false){
						// password incoorect
						header('Location: ../index.php?login=error');
						exit();
					}
					if($hashedPasswordCheck == true){
						// user logged in here
						$_SESSION['u_id'] = $row['uid'];
						$_SESSION['u_uname'] = $row['uname'];
						$_SESSION['u_email'] = $row['email'];
						$_SESSION['u_reg'] = $row['registration_no'];
						//echo $_SESSION['u_id'].$_SESSION['u_uname'].$_SESSION['u_email'].$_SESSION['u_reg'];
						header('Location: ../index.php?user='.$_SESSION["u_uname"].'%id='.$_SESSION["u_id"]);
						exit();
					}
				}
			}
		}

	}else{
		header('Location: ../index.php?error');
		exit();
	}