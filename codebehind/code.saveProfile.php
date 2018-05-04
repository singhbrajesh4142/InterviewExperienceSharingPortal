<?php
	session_start();

	// check if this is a postback request
	if(isset($_POST['submit-profile'])){
		// make connection with database
		require_once '../connection/connection.php';

		// retrieve data from the fields
		$uname = $_SESSION['u_uname'];
		$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
		$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
		$companyName = mysqli_real_escape_string($conn, $_POST['companyName']);
		$jobLocation = mysqli_real_escape_string($conn, $_POST['jobLocation']);
		$jobType = mysqli_real_escape_string($conn, $_POST['jobType']);
		$jobProfile = mysqli_real_escape_string($conn, $_POST['jobProfile']);

		//echo $uname.$firstName.$lastName.$companyName.$jobLocation.$jobType.$jobProfile;

		// check if any of the field is empty
		if(empty($firstName) || empty($lastName) || empty($companyName) 
			|| empty($jobLocation) || empty($jobType) || empty($jobProfile) )
		{
			// some fields are empty
			header('Location: ../editprofile.php?errorMessage=missingInformation');
			exit();
		}else{
			// check validation for all the fields
			if(!preg_match("/^[a-zA-Z ]*$/", $firstName) || !preg_match("/^[a-zA-Z ]*$/", $lastName) || 
				!preg_match("/^[a-zA-Z. ]*$/", $companyName) || !preg_match("/^[a-zA-Z., ]*$/", $jobLocation) || 
				!preg_match("/^[a-zA-Z ]*$/", $jobProfile)){
					header("Location: ../editprofile.php?errorMessage=invalid");
					exit();
			}else{
				// data is valid as per my validation
				$sql = "SELECT * FROM tbl_profile WHERE uid = '$uname'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				// check if profile is already present in database then updata it
				if($resultCheck < 1){
					// profile is not present then insert it 
					$sqlInsert = "INSERT INTO tbl_profile (uid , f_name, l_name, company_name, job_location, job_type, job_profile) VALUES ('$uname', '$firstName', '$lastName', '$companyName', '$jobLocation', '$jobType', '$jobProfile')";
					$resultInsert = mysqli_query($conn, $sqlInsert);
					if($resultInsert){
						// query executed successfully
						header('Location: ../profile.php?errorMessage=updateSuccessfull');
						exit();
					}else{
						// query is not executed
						header('Location: ../index.php?error');
						exit();
					}
				}else{
					// profile is present then update it
					$sqlUpdate = "UPDATE tbl_profile SET f_name = '$firstName' , l_name = '$lastName' ,
									company_name = '$companyName', job_location = '$jobLocation' , 
									job_type = '$jobType', job_profile = '$jobProfile' WHERE uid = '$uname'";
					$resultUpdate = mysqli_query($conn, $sqlUpdate);
					if($resultUpdate){
						// update query successfully
						header('Location: ../profile.php?errorMessage=updateSuccessfull');
						exit();
					}else{
						// query is not executed
						header('Location: ../index.php?error');
						exit();
					}
				}
			}
		}


	}else{
		// not a postback request then redirect user to home page
		header('Location: ../index.php?error');
		exit();
	}