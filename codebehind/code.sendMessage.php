<?php
	session_start();

	//check if session is not set then user will not be able to visit send-messsage page
	if(!isset($_SESSION['u_id'])){
		header('Location: ../index.php?error');
		exit();
	}

	// check if it is a post back request
	if(isset($_POST['sendMessageButton'])){
		include '../connection/connection.php';

		$messageTo = mysqli_real_escape_string($conn, $_GET['messageTo']);
		$messageFrom = $_SESSION['u_uname'];
		$message = mysqli_real_escape_string($conn, $_POST['message']);

		$insertMessageSql = "INSERT INTO tbl_message (messageTo, messageFrom, message, msg_time) VALUES ('$messageTo', '$messageFrom' , '$message', now())";
		$resultinsertMessageSql = mysqli_query($conn, $insertMessageSql);

		header('Location: ../send-message.php?smstatus=success&');
		exit();
	}else{
		header('Location: ../send-message.php');
		exit();
	}