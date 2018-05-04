	<div class="col-lg-3 col-md-3 col-sm-4 ">
		<div id="profile-page-sidebar" >
			<h4><small><i>welcome </i></small><?php echo $_SESSION['u_uname']; ?></h4></br>
			<div id="p-top">
				<a id="btn-shareExperience" class="btn btn-info form-control" href="sharepost.php" >Share Experience</a>
				<a href="editprofile.php" class="btn btn-info form-control">Edit Profile</a>
				<a href="profilesetting.php" class="btn btn-info form-control">Account & Setting</a>
			</div>
			<form id="donwloadResumeForm" action="codebehind/code.download.resume.php" method="POST" enctype="multipart/form-data">
				<button type="submit" name="btn-download-resume" class="btn btn-primary form-control">Download Resume</button>
			</form>
			
			<div id="find-user">
				<a  type="button" href="find-user.php" class="btn btn-primary form-control">Members</a>
				<a type="button" href="inbox.php" class="btn btn-primary form-control">Inbox</a>
				<a type="button" href="groupchat.php" class="btn btn-primary form-control" >Start Group Chat</a>
			</div>
		</div>
	</div>
	<style type="text/css">
		#p-top{
			margin-right: 10px;
			margin-left: 10px;
		}

		#p-top a{
			margin-bottom: 10px;
		}

		#donwloadResumeForm{
			margin: 10px;
		}

		#find-user{
			margin-right: 10px;
			margin-left: 10px;
		}
		#find-user a{
			margin-top: 5px;
			margin-bottom: 5px;
		}
	</style>