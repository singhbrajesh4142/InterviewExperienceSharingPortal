<?php
	session_start();

	// check if this is postback request
	if(isset($_POST['submit-share-post'])){
		// it is a postback request

		// make connection with database
		require_once '../connection/connection.php';

		// retrieve datafrom share post page
		$uname = $_SESSION['u_uname'];
		$fullName = "";
		// find name of the user from tbl_profile
		$getNameSql = "SELECT f_name, l_name FROM tbl_profile WHERE uid = '$uname'";
		$resultGetNameSql = mysqli_query($conn, $getNameSql);
		$resultGetNameSqlCheck = mysqli_num_rows($resultGetNameSql);
		if($resultGetNameSqlCheck < 1){
			// profile is not avialable
			$fullName = $uname;
			//echo $fullName;
		}else{
			// get first and last name
			if($row = mysqli_fetch_assoc($resultGetNameSql))
			{
				$fName = $row['f_name'];
				$lName = $row['l_name'];
				$fullName = $fName." ".$lName;
				//echo $fullName;
			}
		}

		// retrieve data from the post page
		$joType = mysqli_real_escape_string($conn, $_POST['jobType']);
		$companyName = mysqli_real_escape_string($conn, $_POST['companyName']);
		$jobProfile = mysqli_real_escape_string($conn, $_POST['jobProfile']);
		$post = mysqli_real_escape_string($conn, $_POST['interviewExperience']);
		if(isset($_POST['anonymous'])){
			$fullName = "Anonymous";
		}
		
		// if any of the fields are empty
		if(empty($joType) || empty($companyName) || empty($jobProfile) || empty($post) ){
			header('Location: ../sharepost.php?spost=missingInformation');
			exit();
		}else{
			// all fields are having some value so check for anonymous field
			// check validation for all fields
			if(!preg_match("/^[a-zA-Z. ]*$/", $companyName) || !preg_match("/^[a-zA-Z ]*$/", $jobProfile)){
					header("Location: ../sharepost.php?spost=InvalidFields");
					exit();
			}else{
				// all data is valid procedd next
				$post_owner = $_SESSION['u_uname'];
				
				$post_text = $post;
				$post_jType = $joType;
				$post_cName = $companyName;
				$post_jProfile = $jobProfile;
				$post_ownerFullName = $fullName;

				// save post in to database
				$savePostSql = "INSERT INTO tbl_post (post_owner, post_create_time, post_text, post_jType, post_cName, post_jProfile, post_ownerName) VALUES ('$post_owner', now(), '$post_text', '$post_jType', '$post_cName' ,'$post_jProfile' ,'$post_ownerFullName')";
				$resultSavePostSql = mysqli_query($conn, $savePostSql);
				if($resultSavePostSql){
					// query executed successfully
					header('Location: ../index.php');
					exit();
				}
			}
		}
	}else{
		// if this isnot a postback request
		header('Location: ../index.php?error');
		exit();
	}