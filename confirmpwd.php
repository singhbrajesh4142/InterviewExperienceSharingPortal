
<?php include_once 'head.php'; ?>
 
<!-- include header file to display top header menu -->
<?php require_once 'header.php' ?>

<!-- content for this page goes here -->
<div id="confirm-pwd" class="container">
	<div id="confirmation-status">
		<?php
			if(isset($_GET['status'])){
				
			}
		?>
	</div>
	<div class="col-md-2 col-lg-2 col-sm-2">

	</div>
	<div id="confirmation-div" class="col-md-8 col-lg-8 col-sm-8">
		<?php
			$mail = "";
			if(isset($_GET['mail'])){
				$mail = $_GET['mail'];
				echo '<h4 style="color:green;">An email has been sent to : '.$mail.'</h4><hr/>';
			}
		?>
		<h4>A confirmation code has been sent to your email , enter that code and submit it !</h4><br/>
		<form action="" method="POST">
			<div class="form-group">
				<input class="form-control" type="text" name="confirmcode" placeholder="Confirmation code"/>
			</div>
			<button class="btn btn-primary" type="submit" name="submit">Submit</button>
		</form>
	</div>
</div>
<style type="text/css">
	#confirm-pwd{
		min-height: 650px;
		background-color: #f2f2f2;
		text-align: center;
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

	}
</style>
<?php include_once 'footer.php'; ?>