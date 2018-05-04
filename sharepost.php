<?php require_once 'head.php' ?>

<!-- include header.php to display top header menu -->
<?php require_once 'header.php' ?> 


<!-- code for profile page begins here -->
<div id="post-page" class="container">
	<div class="col-lg-9 col-md-9 col-sm-8">
		<div id="post-page-main-content"  >
			<?php include_once 'profile-header.php' ?>
			<div id="post-content">
				<h4> Share your Experience </h4></br>
				<!-- display error the user -->
				<?php 
					if(isset($_GET['spost'])){
						$status = $_GET['spost'];
						$msg = "";
						if ($status == "missingInformation") {
							$msg = "You are missing something!";
						}
						elseif ($status == "InvalidFields") {
							$msg = "Invalid Field data !";
						}
						echo "<span style='color:red;'>".$msg."</span>";
					}
				 ?>
				<?php 
					$registration_no = $_SESSION['u_reg'];
					// check if user is eligible to post 
					include_once 'codebehind/function/generalFunction.php';
					if(checkIfEligibleToPost($registration_no)){
							echo '<form id="share-post-form" action="codebehind/code.sharepost.php" method="POST">
						<div class="form-group">
							<label for="jobType">Type</label><br/>
							<input type="radio" name="jobType" value="Full Time"/> Full Time 
							<input type="radio" name="jobType" value="Intern"/> InternShip
						</div>
						<div class="form-group">
							<label for="companyName">Company Name</label>
							<input type="text" class="form-control" name="companyName" placeholder="Company Name"/>
						</div>
						<div class="form-group">
							<label for="jobProfile">Job Profile</label>
							<input type="text" class="form-control" name="jobProfile" placeholder="Job Profile"/>
						</div>
						<div class="form-group">
							<label for="interviewExperience">Post</label>
							<textarea class="form-control" rows="7" name="interviewExperience" placeholder="Share Your Interview Experience here..."></textarea>
						</div>
						<div class="form-group">
							<input type="checkbox" name="anonymous" value="1" /> Post Anonymous
						</div>
						<button type="submit" name="submit-share-post" class="btn btn-primary">Share</button>
						</form>';
					}else{
						echo '<div id="eligiblity-message">
							<h2>Sorry!</h2>
							Only Third/Final year is allowed to post
							</div>';
					}
					
				?>
			</div>
		</div>
	</div>
	<!-- include profile page sidebar -->
	<?php include_once 'includes/profile-page-sidebar.php'; ?>
</div>
<style type="text/css">
	#post-page{

	}

	#post-page-main-content {
		min-height: 600px;
		margin-top: 20px;
		box-shadow: 3px 3px 5px #d9d9d9;
		background-color: #f2f2f2;
		padding: 10px;
		margin-bottom: 10px;
	}

	#post-page-main-content #display-profile-pic{
		width:100%;
		height: 200px;
		padding-top: 25px;
		background: -moz-linear-gradient(#0077b3, #f2f2f2); 
    	background: linear-gradient(#0077b3, #f2f2f2); 
	}
	#post-page-main-content #display-profile-pic #profile-pic{
		height: 150px;
		width: 150px;
		border: 1px solid #f2f2f2;
		border-radius: 75px;
		margin: auto;
	}

	#post-page-main-content #post-content{
		padding-top: 30px;
		padding-left: 10px;
		padding-right: 10px;
	}
	#post-page-main-content #post-content h4{
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

	#eligiblity-message h2{
		color: red;
	}
</style>

<?php require_once 'footer.php' ?>