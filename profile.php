<?php require_once 'head.php' ?>

<!-- include header.php to display top header menu -->
<?php require_once 'header.php' ?> 


<!-- code for profile page begins here -->
<div id="profile-page" class="container">
	<div class="col-lg-9 col-md-9 col-sm-8">
		<div id="profile-page-main-content"  >
			<?php include_once 'profile-header.php' ?>
			<div id="profile-content">

				<!-- show error message if resumeis not avialable -->
			<?php 
				if(isset($_GET['resumeerror'])){
						$status = $_GET['resumeerror'];
						$msg = "";
						if($status == "resumeNotAvailable"){
							$msg = "Your resume is not avialable ! First upload it ";
							echo "<span style='color:red;'>".$msg."</span>";
							$msg = "";
						}

					}
			?>

			<!-- message when profile updated sucessfully -->
				<?php 
					if(isset($_GET['errorMessage'])){
						$status = $_GET['errorMessage'];
						$msg = "";
						if ($status == "updateSuccessfull") {
							$msg = "Profile Updated Successfully !";
						}
						echo "<span style='color:green;'>".$msg."</span>";
					}
				 ?>
				<?php
					// include connection file
					include_once 'connection/connection.php';

					// retrieve data from tbl_profile for current profile
					$sql = "SELECT * FROM tbl_profile WHERE uid = '".$_SESSION["u_uname"]."'";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);

					if($resultCheck < 1){
						echo '<h4> welcome '.$_SESSION["u_uname"].'</h4></br><h5 style="color: red;">Your Profile is not avialable! Please complete your profile.</h5>';
					}else{
						if($row = mysqli_fetch_assoc($result)){
							$firstName = $row['f_name'];
							$lastName = $row['l_name'];
							$companyName = $row['company_name'];
							$jobLocation = $row['job_location'];
							$jobType = $row['job_type'];
							$jobProfile = $row['job_profile']; 
							
							if($jobType == "full"){
								$jobType = "Full Time Job";
							}else{
								$jobType = "InternShip Programme";
							}

							echo '<h4> welcome '.$firstName.'</h4></br>';
							echo '
								<table>
									<tr>
										<td ><label>First Name: </label></td>
										<td>'.$firstName.'</td>
									</tr>
									<tr>
										<td ><label>Last Name: </label></td>
										<td>'.$lastName.'</td>
									</tr>
									<tr>
										<td ><label>Company Name: </label></td>
										<td>'.$companyName.'</td>
									</tr>
									<tr>
										<td ><label>Job Location: </label></td>
										<td>'.$jobLocation.'</td>
									</tr>
									<tr>
										<td ><label>Job Type: </label></td>
										<td>'.$jobType.'</td>
									</tr>
									<tr>
										<td ><label>Job Profile: </label></td>
										<td>'.$jobProfile.'</td>
									</tr>
								</table>
							';
							
						}
					}
				?>
			</div>
		</div>
	</div>
	<!-- include profile page sidebar -->
	<?php include_once 'includes/profile-page-sidebar.php'; ?>
</div>
<style type="text/css">
	#profile-page{

	}

	#profile-page-main-content {
		min-height: 600px;
		margin-top: 20px;
		box-shadow: 3px 3px 5px #d9d9d9;
		background-color: #f2f2f2;
		padding: 10px;
		margin-bottom: 25px;
	}

	#profile-page-main-content #display-profile-pic{
		width:100%;
		height: 200px;
		padding-top: 25px;
		background: -moz-linear-gradient(#0077b3, #f2f2f2); 
    	background: linear-gradient(#0077b3, #f2f2f2); 
	}
	#profile-page-main-content #display-profile-pic #profile-pic{
		height: 150px;
		width: 150px;
		border: 1px solid #f2f2f2;
		border-radius: 75px;
		margin: auto;
	}

	#profile-page-main-content #profile-content{
		padding-top: 30px;
		padding-left: 10px;
		padding-right: 10px;
	}
	#profile-page-main-content #profile-content h4{
		text-align: center;
		color: #000;
	} 
	#profile-page-sidebar h4{
		padding-top: 20px;
		text-align: center;
	}

	#profile-page-sidebar {
		min-height: 400px;
		margin-top: 20px;
		box-shadow: 3px 3px 5px #d9d9d9;
		background-color: #f2f2f2;
		padding-left: 20px;
		line-height: 25px;
	}
	#profile-page-sidebar ul{
		list-style: none;
	}
	td{
		padding: 10px;
	}
</style>

<?php require_once 'footer.php' ?>