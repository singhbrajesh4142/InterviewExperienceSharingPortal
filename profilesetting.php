<?php require_once 'head.php' ?>

<!-- include header.php to display top header menu -->
<?php require_once 'header.php' ?> 


<!-- code for profile page begins here -->
<div id="profile-page" class="container">
	<div class="col-lg-9 col-md-9 col-sm-8">
		<div id="profile-page-main-content"  >
			
			<?php include_once 'profile-header.php' ?>

			<div id="profile-content">
				<h4> Manage your account </h4></br>
				<!-- display error the user -->
				Change Password:<br/><br/>
				<?php 
					if(isset($_GET['pserror'])){
						$status = $_GET['pserror'];
						$msg = "";
						if($status == "passwordChangeSuccess"){
							$msg = "Password has been Changed Successfully";
							echo "<span style='color:green;'>".$msg."</span>";
							$msg = "";
						}

						if ($status == "InvalidOldPassword") {
							$msg = "Invalid Old Password";
						}
						elseif ($status == "confirmpassword") {
							$msg = "New password are not same";
						}
						elseif ($status == "missingInformation") {
							$msg = "You are missing Somethig !";
						}
						echo "<span style='color:red;'>".$msg."</span>";
					}
				 ?>
				<?php
					
					echo '<form action="codebehind/code.profilesetting.php" method="post">
						<div class="form-group">
							<label for="oldpwd" >Old Password</label>
							<input type="password" class="form-control" name="oldpwd" placeholder="Old Password"/>
						</div>
						<div class="form-group">
							<label  for="newpwd" >New Password</label>
							<input type="password" class="form-control" name="newpwd" placeholder="New Password"/>
						</div>
						<div class="form-group">
							<label  for="confirmnewpwd" >Confirm new Password</label>
							<input type="password" class="form-control" name="confirmnewpwd" placeholder="Confirm New Password"/>
						</div>
						<button type="submit" class="btn btn-primary" name="savepwd">save change</button>
					</form>';

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
</style>

<?php require_once 'footer.php' ?>