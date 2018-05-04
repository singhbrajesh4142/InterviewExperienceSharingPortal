<?php

	if($con = mysqli_connect("localhost","root","","portal")){
		// connection established woth database
		// check if it is a post back request
		if(isset($_POST['btnAdminLogin'])){
			$username = mysqli_real_escape_String($con, $_POST['adminusername']);
			$password = mysqli_real_escape_String($con, $_POST['adminpwd']);
			if(empty($username) || empty($password)){
				header('Location: index.php?err=1&');
				exit();
			}else{
				// check if username and pasword is equal to th edata stored into database
				$sql = "SELECT * FROM admin WHERE username = '$username'";
				$resultCount = 0;
				if($result = mysqli_query($con, $sql)){
					$resultCount = mysqli_num_rows($result);
				}
				if($resultCount < 1){
					// username does not exist into database
					header('Location: index.php');
					exit();
				}else{
					// check if password is correct
					$row = mysqli_fetch_assoc($result);
					$pwd = $row['password'];
					// perform hashing here
					$new_password = md5($password);
					// check if password is corect 
					if($new_password==$pwd){
						// if password is correct then redirect to the details page
						$_SESSION['admin_id'] = $row['id'];
						$_SESSION['admin_uname'] = $row['username'];
						header('Location: userdetail.php');
						exit();
					}else{
						header('Location: index.php?err=2&');
						exit();
					}
				}
			}

		}else{
			header('Location: index.php?unauthrizedAccess');
			exit();
		}
	}