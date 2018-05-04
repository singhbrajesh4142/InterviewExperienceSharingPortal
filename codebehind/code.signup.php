<?php
	
	// check if signup button is clicked
	if(isset($_POST['signup'])){

		// make connection with database
		require_once '../connection/connection.php';

		// retreive data from signup page
		$uname = mysqli_real_escape_string($conn, $_POST['username']);
		$regno = mysqli_real_escape_string($conn, $_POST['reg-number']);
		$mail = mysqli_real_escape_string($conn, $_POST['email']);
		$pwd = mysqli_real_escape_string($conn, $_POST['password']);
		$confirm_pwd = mysqli_real_escape_string($conn, $_POST['confirm-pwd']);

		// check if any of the fields are empty then show error
		if(empty($uname) || empty($regno) || empty($mail) || empty($pwd) || empty($confirm_pwd) ){
			header('Location: ../signup.php?signup=emptyfields');
			exit();
		}else{
			// if data is avialabe on all the fields then proceed next
			// check for registration no fields
				$stringRegistraionNo = (string)$regno;
				$regLength = strlen($stringRegistraionNo);
				// check if it is 8 digit long 
				if($regLength != 8){
					header('Location: ../signup.php?signup=regLength');
					exit();
				}else{
					// registration no is 8 digit long
					// check if all are digit
					if(!ctype_digit($regno)){
						header('Location: ../signup.php?signup=notdigit');
						exit();
					}else{
						// if all characters are numeric then find a substring of length 4 from beginning
						$year = substr($stringRegistraionNo,0,4);
						// convert it into integer
						$intYear = (int)$year;
						$curYear = date('Y');

						if($intYear < 2010 || $intYear > $curYear){
							header('Location: ../signup.php?signup=invalidReg');
						exit();
						}
					}					
				}
			// check password length
				$strpwd = (string)$pwd;
				$pwdlen = strlen($strpwd);
				if($pwdlen < 7){
					header('Location: ../signup.php?signup=pwd7');
					exit();
				}
			// validate email
			if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
				header('Location: ../signup.php?signup=invalid_email');
				exit();
			}else{
				//check if both password fileds have same data
				if($pwd != $confirm_pwd){
					header('Location: ../signup.php?signup=password_not_match');
					exit();
				} else{
					// check if username is already exist
						$sql = "SELECT * FROM login WHERE uname = '$uname' OR email = '$mail'";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);

						if($resultCheck > 0){
							header("Location: ../signup.php?signup=usernameExist");
							exit();
						}else{
							// hashing  password
							$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
							
							// Insert the user into database
							$sql = "INSERT INTO login (uname, email, registration_no, pwd) 
									VALUES ('$uname','$mail', '$regno', '$hashedPwd' );";
							mysqli_query($conn, $sql);
							header("Location: ../signup.php?signup=success");
							exit();
						}
				}
			}
		}

	}else{
		// if signup button is not clicked then redirect user to home page
		header('Location: ../index.php');
		exit();
	}

?>