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
<div id="send-message-page" class="container">
	<div class="col-lg-9 col-md-9 col-sm-8">
		<div id="send-message-page-main-content"  >
			<div id="send-message-content">
				<?php 
					if(isset($_GET['smstatus'])){
						$status = $_GET['smstatus'];
						$msg = "";
						if($status == "success"){
							$msg = "Message sent succesfully!";
							echo "<span style='color:green;'>".$msg."</span>";
							$msg = "";
						}
					}
				 ?>
				<h4>Send Message</h4><br/>
				<?php
				include 'connection/connection.php';
				if(isset($_GET['messageTo'])){
					$messageTo = mysqli_real_escape_string($conn,$_GET['messageTo']);
				}
				?>
				<form action="codebehind/code.sendMessage.php?messageTo=<?php echo $messageTo.'&'; ?>" method="POST">
					<label for="message">Message: </label>
					<textarea name="message" class="form-control" rows="7" > </textarea><br/>
					<button type="submit" class="btn btn-primary" name="sendMessageButton" >Send </button>
				</form>
				<?php
				if(isset($_GET['status'])){
					echo '<span class="">Message Send Successfully!</span>';
				}else{

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

	#send-message-page-main-content {
		min-height: 600px;
		margin-top: 20px;
		box-shadow: 3px 3px 5px #d9d9d9;
		background-color: #f2f2f2;
		padding: 10px;
		margin-bottom: 25px;
	}


	#send-message-page-main-content #send-message-content{
		padding-top: 30px;
		padding-left: 10px;
		padding-right: 10px;
	}
	#send-message-page-main-content #send-message-content h4{
		text-align: center;
		color: #000;
		text-shadow: 1px 2px 1px #8c8c8c;
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