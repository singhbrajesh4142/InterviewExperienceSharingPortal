<?php
	session_start();

	if(isset($_POST['btn-download-resume'])){
		$username = $_SESSION['u_uname'];

		// make connection with database
		include_once '../connection/connection.php';

		$sql = "SELECT * FROM tbl_resume WHERE user_id = '$username'";
		$resultSql = mysqli_query($conn, $sql);
		$resultSqlCheck = mysqli_num_rows($resultSql);
		if($resultSqlCheck > 0){
			// check status 
			$row = mysqli_fetch_assoc($resultSql);
			if($row['status'] == 1){
				// resume is available
				$fileName = $row['resume_file'];
				//echo $fileName;
				header('Location: ../resumeUploads/'.$fileName);
				exit();
			}
		}else{
			// no record for resume in database
			header('Location: ../profile.php?resumeerror=resumeNotAvailable');
			exit();
		}
	}else{
		header('Location: ../index.php?error');
		exit();
	}