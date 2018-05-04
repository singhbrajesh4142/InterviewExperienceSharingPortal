<?php
	session_start();

	if(isset($_POST['btn-profile-upload'])){

		// make connection with database
		include_once '../connection/connection.php';

		$file = $_FILES['p-image'];
		
		$fileName = $_FILES['p-image']['name'];
		$fileTmpName = $_FILES['p-image']['tmp_name'];
		$fileType = $_FILES['p-image']['type'];
		$fileSize = $_FILES['p-image']['size'];
		$fileError = $_FILES['p-image']['error'];

		//echo $fileName.$fileTmpName.$fileType.$fileSize.$fileError;

		$fileExt = explode('.',$fileName);
		$fileActualExt = strtolower(end($fileExt));
		
		if($fileActualExt == "jpg" || $fileActualExt == "jpeg"){
			// check error
			if($fileError === 0){
				// check if size is in range
				if($fileSize <= 500000){
					$fileNameNew = $_SESSION["u_uname"].".".$fileActualExt;

					// insert fileName in to database
					$username = $_SESSION['u_uname'];
					$sql = "SELECT * FROM profileimg WHERE uid = '$username'";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if($resultCheck<1){
						// insert query
						$insertSql = "INSERT INTO profileimg (uid, status, img) VALUES ('$username', 1, '$fileNameNew')";
						$resultInsertSql = mysqli_query($conn, $insertSql);
					}else{
						// update query
						$updateSql = "UPDATE profileimg SET img = '$fileNameNew' WHERE uid = '$username'";
						$resultUpdateSql = mysqli_query($conn, $updateSql);
					}

					$destinationUpload = "../profileUploads/".$fileNameNew;
					if(move_uploaded_file($fileTmpName, $destinationUpload))
					{
						
						header('Location: ../editprofile.php?istatus=uploadSuccess');
						exit();
					}else{
						header('Location: ../editprofile.php?istatus=uploadFail');
						exit();
					}
				}else{
					header('Location: ../editprofile.php?istatus=largefile');
					exit();
				}
			}else{
				header('Location: ../editprofile.php?istatus=uploadingError');
				exit();
			}
		}else{
			header('Location: ../editprofile.php?istatus=invalidExtension');
			exit();
		}
		
		// close connection 
		mysqli_close($conn);

	}else{
		header('Location: ../index.php?error');
		exit();
	}