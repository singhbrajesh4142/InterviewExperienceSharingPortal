<?php

	if(isset($_POST['btn-logout'])){
		
		session_start();
		session_unset();
		session_destroy();

		//redirect to home 
		header('location: ../index.php');
		exit();
	}else{
		header('location: ../index.php');
		exit();
	}