<?php
	session_start();

	if(isset($_POST['adminlogout'])){
		if(isset($_SESSION['admin_id'])){
			session_unset();
			session_destroy();
		}
		header('Location: index.php');
		exit();
	}else{
		header('Location: index.php');
		exit();
	}