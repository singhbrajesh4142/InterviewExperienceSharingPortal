<?php
	
	if(isset($_POST['submitpwd'])){
		// make connection with database
		require_once '../connection/connection.php';

		// retrieve data from password and confirm password fields
		$pwd = mysqli_real_escape_string($conn, $_POST['newpwd']);
		$confirmnewpwd = mysqli_real_escape_string($conn, $_POST['confirmnewpwd']);
		if(isset($_GET['mail'])){
		$mail = mysqli_real_escape_string($conn, $_GET['mail']);
		}
		// check if any of the field is empty
		if(empty($pwd) || empty($confirmnewpwd)){
			header('Location: ../confirmchangepwd.php?status=empty&mail='.$mail.'&');
			exit();
		}else{
			// validate both password fields 
			$pwdlength = strlen((string)$pwd);
			if($pwdlength < 7){
				header('Location: ../confirmchangepwd.php?status=len7&mail='.$mail.'&');
				exit();
			}
			// check if both fields have same value
			if($pwd != $confirmnewpwd){
				header('Location: ../confirmchangepwd.php?status=notmatch&mail='.$mail.'&');
				exit();
			}else{
				// both fields are having same value then proceed next
				$sql = "SELECT pwd FROM login WHERE email = '$mail'";
				$resultsql = mysqli_query($conn, $sql);
				// hashing  password
				$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
				
				$updateSql = "UPDATE login SET pwd = '$hashedPwd' WHERE email = '$mail'";
				if($result = mysqli_query($conn, $updateSql)){
					// password updated successfully 
					header('Location: ../index.php?pwdc=success');
					exit();
				}

			}
		}
	}else{
		header('Location: ../index.php?error');
		exit();
	}

?>