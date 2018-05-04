<?php session_start(); 
	
?>
<!DOCTYPE html>
<html>
<head>
	<div>
		<form style="float:left;" action="clearchat.php" method="POST">
			<button class="btn btn-danger" type="submit" name="deletechat" >
				Clear ChatLogs from Database</button>
			
		</form>
		<form style="float:right;" action="alogout.php" method="POST">
			<button class="btn btn-danger" type="submit" name="adminlogout" >
				Logout</button>
		</form>
	</div>
	<title>User Details</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
		body{
			padding:20px 50px 20px 50px;
			background-color: #ccd3e0;
		}
		table{
			border: 1px solid #000;
		}
		h4{
			text-align: center;
			color: red;
		}
	</style>
</head>
<body>
	<h4><b>User Deatils</b></h4>
	<div class="table-responsive">
		<table class="table table-striped  table-bordered table-hover">
			<thead>
				<tr>
					<th>Sl. No.</th>
					<th>UserName</th>
					<th>Email</th>
					<th>FullName</th>
					<th>Registration No.</th>
					<th>Company</th>
					<th>Profile</th>
					<th>Job Type</th>
					<th>Resume</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$userCount = 1;
					if($con = mysqli_connect("localhost", "root", "" , "portal")){
						$usrSql = "SELECT * FROM login";
						$resultusrSql = mysqli_query($con, $usrSql);
						$resultusrSqlCount = mysqli_num_rows($resultusrSql);
						if($resultusrSqlCount > 0){
							
							while($loginRow = mysqli_fetch_assoc($resultusrSql)){
								$Username = $loginRow['uname'];
								$registration = $loginRow['registration_no'];
								$email = $loginRow['email'];

								$fullname = "";
								$company = "";
								$profile = "";
								$type = "";
								$resume = "";

								// check for profile
								$profileSql = "SELECT * FROM tbl_profile where uid= '$Username'";
								$resultprofileSql = mysqli_query($con, $profileSql);
								$resultprofileSqlCount = mysqli_num_rows($resultprofileSql);
								if($resultprofileSqlCount>0){
									// profile exist
									$profileRow = mysqli_fetch_assoc($resultprofileSql);
									$fullname = $profileRow['f_name']." ".$profileRow['l_name'];
									$company = $profileRow['company_name'];
									$profile = $profileRow['job_profile'];
									$type = $profileRow['job_type'];
								}else{
									// profile doest not exist
									$fullname = "---";
									$company = "---";
									$profile = "---";
									$type = "---";
								}

								// check for resume
								$resumeSql = "SELECT * FROM tbl_resume WHERE user_id = '$Username'";
								$resultResumeSql = mysqli_query($con, $resumeSql);
								$resultResumeSqlCount = mysqli_num_rows($resultResumeSql);
								if($resultResumeSqlCount > 0){
									// resume avialable
									$resumeRow = mysqli_fetch_assoc($resultResumeSql);
									$resumeLink = "../resumeUploads/".$resumeRow['resume_file'];
									$resume = '<a href="'.$resumeLink.'">Download</a>';
								}else{
									// resume not avialable
									$resume = "Not Avialable";
								}
								
								echo '<tr><td>'.$userCount.'</td>'
									.'<td>'.$Username.'</td>'
									.'<td>'.$email.'</td>'
									.'<td>'.$fullname.'</td>'
									.'<td>'.$registration.'</td>'
									.'<td>'.$company.'</td>'
									.'<td>'.$profile.'</td>'
									.'<td>'.$type.'</td>'
									.'<td>'.$resume.'</td></tr>';
								$userCount = $userCount+ 1;
							}
							
						}else{
							echo "No User";
						}
					}else{
						// no connection
					}

				?>
			</tbody>
		</table>
	</div>
</body>
</html>