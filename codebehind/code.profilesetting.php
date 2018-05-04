<?php
	session_start();
	// check if save password button is clicked
	if(isset($_POST['savepwd'])){
		// make connection with database
		require_once '../connection/connection.php';

		// retrieve password fields data from the file 
		$oldpwd = mysqli_real_escape_string($conn, $_POST['oldpwd']);
		$newpwd = mysqli_real_escape_string($conn, $_POST['newpwd']);
		$confirmNewPwd = mysqli_real_escape_string($conn, $_POST['confirmnewpwd']);

		$uname = $_SESSION['u_uname'];

		// check if any of fields are empty
		if(empty($oldpwd) || empty($newpwd) || empty($confirmNewPwd) ){
			// some fields are empty
			header('Location: ../profilesetting.php?pserror=missingInformation');
			exit();
		}else{
			// all fields have some value

			// check if newpwd and confirmNewPwd is equal
			if($newpwd == $confirmNewPwd){
				// both fields have equal value
				
				$sql = "SELECT * FROM login WHERE uname = '$uname'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				if($row = mysqli_fetch_assoc($result)){
					// check if old password is equal to the password stored in database
					$hashPasswordCheck = password_verify($oldpwd, $row['pwd']);
					if($hashPasswordCheck == true){
						// hash the new password
						$newHashedPwd = password_hash($newpwd, PASSWORD_DEFAULT);
						// password match with database then update new password
						$updatePwdSql = "UPDATE login SET pwd='$newHashedPwd' WHERE uname = '$uname'";
						$resultUpdatePwdSql = mysqli_query($conn, $updatePwdSql);
						// password change successfully
						header('Location: ../profilesetting.php?pserror=passwordChangeSuccess');
						exit();
					}else{
						// password not match
						header('Location: ../profilesetting.php?pserror=InvalidOldPassword');
						exit();
					}
				}
			}else{
				// new password and confirm password values are not equal
				header('Location: ../profilesetting.php?pserror=confirmpassword');
				exit();
			}
		}

	}else{
		// otherwise redirect user to profile page
		header('Location: ../index.php?error');
		exit();
	}