<?php require_once 'head.php' ?>

<!-- include header.php to display top header menu -->
<?php require_once 'header.php' ?> 

<!-- check if session variable is set -->
<?php
	if(!isset($_SESSION['u_id'])){
		header('Location: index.php?error');
		exit();
	}
?>

<!-- code for profile page begins here -->
<div id="profile-page" class="container">
	<div class="col-lg-9 col-md-9 col-sm-8">
		<div id="profile-page-main-content"  >

			<?php include_once 'profile-header.php' ?>

			<div id="profile-content">
				<h4> Update your Profile </h4></br>
				<!-- profile photo uploads -->
				<!-- display error the user -->
				<?php 
					if(isset($_GET['istatus'])){
						$status = $_GET['istatus'];
						$msg = "";
						if($status == "uploadSuccess"){
							$msg = "Upload Success";
							echo "<span style='color:green;'>".$msg."</span>";
							$msg = "";
						}

						if ($status == "uploadFail") {
							$msg = "Upload Fail";
						}
						elseif ($status == "largefile") {
							$msg = "File size is too large";
						}
						elseif ($status == "uploadingError") {
							$msg = "Uploading Error!";
						}
						elseif ($status == "invalidExtension") {
							$msg = "Invalid Extension";
						}
						echo "<span style='color:red;'>".$msg."</span>";
					}
				 ?>

				<form id="form-profile-img" action="codebehind/code.upload-profile-img.php" method="POST" enctype="multipart/form-data">
					<table>
						<tr>
							<td><input type="file" name="p-image"/></td>
							<td><small><i>Only .jpg and .jpeg </i></small></td>
							<td><button type="submit" name="btn-profile-upload" class="btn btn-primary">
							Upload Profile Picture
							</button></td>
							
						</tr>
					</table>
				</form>
				<!-- profile photo uploads code end -->
				<!-- resume upload code begin --><br/>
				<?php 
					if(isset($_GET['rstatus'])){
						$status = $_GET['rstatus'];
						$msg = "";
						if($status == "uploadSuccess"){
							$msg = "Upload Success";
							echo "<span style='color:green;'>".$msg."</span>";
							$msg = "";
						}

						if ($status == "uploadFail") {
							$msg = "Upload Fail";
						}
						elseif ($status == "largefile") {
							$msg = "File size is too large";
						}
						elseif ($status == "uploadingError") {
							$msg = "Uploading Error!";
						}
						elseif ($status == "invalidExtension") {
							$msg = "Invalid Extension";
						}
						echo "<span style='color:red;'>".$msg."</span>";
					}
				 ?>
				<form id="form-resume" action="codebehind/code.upload-resume.php" method="POST" enctype="multipart/form-data">
					<table>
						<tr>
							<td><input type="file" name="resume"/></td>
							<td><small><i>Only .pdf and .docx</i></small> </td>
							<td><button type="submit" name="btn-resume-upload" class="btn btn-primary">
							Upload your Resume
							</button></td>
							
						</tr>
					</table>
				</form>
				<!-- resume upload code end -->
				<!-- code for profile updation goes here  -->
				</br>
				<?php 
					if(isset($_GET['errorMessage'])){
						$status = $_GET['errorMessage'];
						$msg = "";
						if ($status == "missingInformation") {
							$msg = "You are missing something !";
						}
						elseif ($status == "invalid") {
							$msg = "Invalid Fields !";
						}
						echo "<span style='color:red;'>".$msg."</span>";
					}
				 ?>
				<form id="update-profile" action="codebehind/code.saveProfile.php" method="POST">
					<div class="form-group">
						<label for="firstName">First Name</label>
						<input type="text" class="form-control" name="firstName" placeholder="First Name"/>
					</div>
					<div class="form-group">
						<label for="lastName">Last Name</label>
						<input type="text" class="form-control" name="lastName" placeholder="Last Name"/>
					</div>
					<div class="form-group">
						<label for="companyName">Company Name</label>
						<input type="text" class="form-control" name="companyName" placeholder="Company Name"/>
					</div>
					<div class="form-group">
						<label for="jobLocation">Job Location</label>
						<input type="text" class="form-control" name="jobLocation" placeholder="Job Location"/>
					</div>
					<div class="form-group">
						<label for="jobType">Type</label><br/>
						<input type="radio" name="jobType" value="full"/> Full Time 
						<input type="radio" name="jobType" value="intern"/> Intern
					</div>
					<div class="form-group">
						<label for="jobProfile">Job Profile</label>
						<input type="text" class="form-control" name="jobProfile" placeholder="Job Profile"/>
					</div>
					<button type="submit" name="submit-profile" class="btn btn-primary">save</button>
				</form>
				<!-- code for profile updation end here -->
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
		min-height: 400px;
		margin-top: 20px;
		box-shadow: 3px 3px 5px #d9d9d9;
		background-color: #f2f2f2;
		padding: 10px;
		margin-bottom: 10px;
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

	#form-profile-img{

	}
</style>

<?php require_once 'footer.php' ?>