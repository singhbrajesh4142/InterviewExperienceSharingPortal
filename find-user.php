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
				<?php
					include 'connection/connection.php';
					$currentUser = $_SESSION['u_uname'];
					
					$allUserListSql = "SELECT * FROM login WHERE uname != '$currentUser'";
					$resultAllUserListSql = mysqli_query($conn, $allUserListSql);
					$resultCount = mysqli_num_rows($resultAllUserListSql);
					if($resultCount > 0){
						// user are avialble other than currentUser
						while($row = mysqli_fetch_assoc($resultAllUserListSql)){
							echo "<div id='user-list'>";
							$user = $row['uname'];
							// check for profile
							$checkIntoProfile = "SELECT * FROM tbl_profile WHERE uid = '$user'";
							$resultcheckIntoProfile = mysqli_query($conn, $checkIntoProfile);
							$resultCountcheckIntoProfile = mysqli_num_rows($resultcheckIntoProfile);
							if($resultCountcheckIntoProfile>0){
								// profile exist then retrieve name form tbl_profile
								$row1 = mysqli_fetch_assoc($resultcheckIntoProfile);
								$fullName = $row1['f_name']." ".$row1['l_name'];
								// print fullName as Name
								$cName = $row1['company_name'];
								$jProfile = $row1['job_profile'];
								echo '<b>Name: </b>'.$fullName.'<br/>'.'<b>Company Name: </b>'.$cName.'<br/><b>Profile: </b>'.$jProfile.'<br/><br/>';
								echo '<a href="send-message.php?messageTo='.$user.'&" class="btn btn-primary" >Send Message</a>';
							}else{
								// print username as name
								echo '<b>UserName: </b>'.$user.'</br><p style="color: red;">Profile is not available for this User!</p></br>';
								echo '<a href="send-message.php?messageTo='.$user.'&" class="btn btn-primary" >Send Message</a>';
							}
							echo "</div>";
						}
					}else{
						// only you are present
						echo "Sorry! NO Users !";
					}
					
				?>
			</div>
		</div>
	</div>
	<!-- include profile page sidebar -->
	<?php include_once 'includes/profile-page-sidebar.php'; ?>
</div>
<style type="text/css">
	#user-list{
		margin: 10px;
		padding: 10px;
		background-color: #fff;
		border: 1px solid #f2f2f3;
		border-radius: 4px;
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