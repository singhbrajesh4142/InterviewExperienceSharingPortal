<div id="header">
    	<div id="main-menu">
    		<nav class="navbar ">
				<div class="container-fluid">
					<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-target="#myNavbar" data-toggle="collapse">
						<!--<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>-->
						<span class="glyphicon glyphicon-menu-hamburger"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse " id="myNavbar">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"> Home</span></a></li>
						<!-- <li><a href="#">About</a></li>
						<li><a href="#">Contact Us</a></li>
						<li><a href="#">Service</a></li>-->
					</ul>
					<form class="navbar-form navbar-left" action="search.php" method="POST" role="search">
						<div class="input-group "><!-- form-group -->
							<input type="text" name="search-field" class="form-control" placeholder="Company / Student Name..." />
							<span class="input-group-btn">
								<button type="submit" name="btn-search" class="btn btn-info">
									<span class="glyphicon glyphicon-search"> </span>
								</button>
							</span>
						</div>
						<!--<button type="submit" class="btn btn-default">Search</button>-->
					</form>
					
							<ul class="nav navbar-nav navbar-right">
						<!--<li class="active"><a href="#">Subscribe</a></li>-->
						<?php 
							if(isset($_SESSION['u_id'])){
								echo '
								<li ><a id="myAccount" href="profile.php"><span class="glyphicon glyphicon-user"> MyAccount</span></a>
								</li>
								<li>
									<form id="logout-form" action="codebehind/code.logout.php" method="POST">
										<button type="submit" name="btn-logout" class="btn btn-sm btn-primary">
											<span class="glyphicon glyphicon-log-out"> Logout</span>
										</button>
									</form>
								</li>
								';
							}else{
								echo '
									<li class=""><a id="loginpopup" href="#"><span class="glyphicon glyphicon-log-in"> Login</span></a>
									<!--<button id="loginpopup" class="btn" >Login</button>-->
							<div class="modal fade" id="modal1" tabindex="-1">
								<div id="dialog-model" class="modal-dialog">
									<div class="modal-content" >
										<div class="modal-header">
										<button id="btncross" class="close" >&times;</button>
										<h4 class="modal-title">Login</h4>
										</div>

										<div class="modal-body">
										<form action="codebehind/code.login.php" method="POST">
										<div class="form-group">
										<lable for="Username">Username:</lable>
										<input type="text" class="form-control" name="uname" placeholder="Username / Email" />
										</div>
										<div class="form-group">
										<lable for="Password">Password:</lable>
										<input class="form-control" type="password" name="pwd" placeholder="Password" />
										</div>
										<button type="submit" name="btn-login" class="btn btn-success form-control">Login</button>
										</form>
										<form id="googleLogin" action="" method="" enctype="multipart/form-data">
											<button class="btn btn-danger form-control" type="submit">Login with GoogleAPI</button>
										</form>
										<form id="facebookLogin" action="" method="" enctype="multipart/form-data">
											<button class="btn btn-primary form-control" type="submit">Login with FacebookAPI</button>
										</form>
										</div>

										<div class="modal-footer">
										<!--<button id="btnclose" class="btn btn-primary" >Close</button>-->
										<a style="float: left;" id="btn-resetpwd" href="#">Forgotten password </a>
										
										

										
										<a href="signup.php"> Create an account	</a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class=""><a id="signup-link" href="signup.php"><span class="glyphicon"> Signup </span> </a> </li>
								';
							}
						?>
					</ul>
				</div>
				</div>
			</nav>
    	</div>
    </div> 
   <!-- reset password modal -->
    <div class="modal fade" id="modal2" tabindex="-1">
	<div id="dialog-model-pwd" class="modal-dialog">
		<div class="modal-content" >
			<div class="modal-header">
				<button id="btncross-resetpwd" class="close" >&times;</button>
				<h4 class="modal-title">Reset Password</h4>
			</div>

			<div class="modal-body">
				<form action="passwordreset.php" method="POST">
					<div class="form-group">
						<lable for="email">Email:</lable>
						<input type="text" class="form-control" name="email" placeholder="Enter your Email here" />
					</div>
										
						<button type="submit" name="reset-pwd" class="btn btn-success form-control">Reset password</button>
				</form>
			</div>

			<div class="modal-footer">
				
			</div>
		</div>
	</div>
	</div>
	<!-- reset password modal code end here -->

<style type="text/css" rel="stylesheet">
	#logout-form{
		padding-top: 10px;
	}
	#googleLogin{
		margin-top: 10px;
		margin-bottom: 10px;
	}
	#facebookLogin{
		margin-top: 10px;
		margin-bottom: 10px;
	}
	#signup-link{
		margin-right: 15px;
	}
</style>