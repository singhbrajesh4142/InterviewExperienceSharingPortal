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
<div id="inbox-page" class="container">
	<div class="col-lg-9 col-md-9 col-sm-8">
		<div id="inbox-page-main-content"  >
			<?php include_once 'profile-header.php' ?>
			<div id="profile-content">
				<h4>Here are your messages ! </h4>
				<?php 
					// include connection file 
					include 'connection/connection.php';

					// retrieve all the message from tbl_message
					$correntUser = $_SESSION['u_uname'];
					
					$msgSql = "SELECT * FROM tbl_message WHERE messageTo = '$correntUser' ORDER BY id DESC";
					$resultmsgSql = mysqli_query($conn, $msgSql);
					$resultmsgSqlCount = mysqli_num_rows($resultmsgSql);
					
					if($resultmsgSqlCount > 0){
						// there are some messages for current User
					
						while($row = mysqli_fetch_assoc($resultmsgSql)){
							echo '<div id="inbox-msg">';
							$messageFrom = $row['messageFrom'];
							$message = $row['message'];
							$readStatus = $row['readStatus'];
							$time = $row['msg_time'];
							echo '<small><i>Message sent by: '.$messageFrom.' <b>On:</b> '.$time.'</i></small><br/>'.'<b><i>Message : </i></b>'.$message.'<br/><br/>';
							echo '<a href="send-message.php?messageFrom='.$correntUser.'&messageTo='.$messageFrom.'&" class="btn btn-primary" name="reply">Reply To Message</a>';
							echo '</div>';
						}

					}else{
						// no message for you
						echo 'No message for you !';
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

	#inbox-page-main-content {
		min-height: 600px;
		margin-top: 20px;
		box-shadow: 3px 3px 5px #d9d9d9;
		background-color: #f2f2f2;
		padding: 10px;
		margin-bottom: 25px;
	}

	#inbox-page-main-content #display-profile-pic{
		width:100%;
		height: 200px;
		padding-top: 25px;
		background: -moz-linear-gradient(#0077b3, #f2f2f2); 
    	background: linear-gradient(#0077b3, #f2f2f2); 
	}
	#inbox-page-main-content #display-profile-pic #profile-pic{
		height: 150px;
		width: 150px;
		border: 1px solid #f2f2f2;
		border-radius: 75px;
		margin: auto;
	}

	#inbox-page-main-content #profile-content{
		padding-top: 30px;
		padding-left: 10px;
		padding-right: 10px;
	}
	#inbox-page-main-content #profile-content h4{
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
	#inbox-msg{
		padding: 15px;
		margin-top: 10px;
		margin-bottom: 10px;
		background-color: #fff;
		border: 1px solid #f2f2f2;
		border-radius: 4px;
	}
</style>


<?php require_once 'footer.php' ?>