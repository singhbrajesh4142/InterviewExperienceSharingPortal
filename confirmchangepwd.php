
<?php include_once 'head.php'; ?>
 
<!-- include header file to display top header menu -->
<?php require_once 'header.php' ?>

<!-- content for this page goes here -->
<div id="confirm-pwd" class="container">
	<div id="confirmation-status">
		<?php
			$mail = "";
			if(isset($_GET['mail'])){
				$mail = $_GET['mail'];
			}
			$msg = "";
			if(isset($_GET['status'])){
				if($_GET['status'] == "empty"){
					$msg = "Both fields are required !";
				}elseif ($_GET['status'] == "notmatch") {
					$msg = "Password fields are not matching !";
				}elseif ($_GET['status'] == "len7") {
					$msg = "Password should be 7 character long !";
				}
			}
			echo '<i style="color:red;">'.$msg.'</i>';
		?>
	</div>
	<div class="col-md-2 col-lg-2 col-sm-2">

	</div>
	<div id="confirmation-div" class="col-md-8 col-lg-8 col-sm-8">
		<h4><b>Change Password <span class="glyphicon glyphicon-lock"> </span></b></h4><hr/>
		<form action="codebehind/code.confirmchangepwd.php?mail=<?php echo $mail; ?>" method="POST">
			<label for="newpwd">New password : </label>
			<div class="form-group">
				<input class="form-control" type="text" name="newpwd" placeholder="New Password"/>
			</div>
			<label for="confirmnewpwd">Confirm new Password : </label>
			<div class="form-group">	
				<input class="form-control" type="text" name="confirmnewpwd" placeholder="Confirm new Password"/>
			</div>
			<button class="btn btn-primary" type="submit" name="submitpwd">save</button>
		</form>
	</div>
</div>
<style type="text/css">
	#confirm-pwd{
		min-height: 650px;
		background-color: #f2f2f2;
		box-shadow: 3px 3px 5px #d9d9d9;
		padding: 100px;
	}
	#confirmation-div{
		border: 1px solid #fff;
		border-radius: 5px;
		padding: 20px;
		background-color: #fff;
	}
	#confirmation-status{
		text-align: center;
		padding: 20px;
	}
</style>
<?php include_once 'footer.php'; ?>