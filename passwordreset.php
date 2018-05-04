
<?php 

	
	if(isset($_POST['reset-pwd'])){
		// perform action if reset password button is clicked


		// make connection with database
		require_once 'connection/connection.php';

		// retrieve data from email input field 
		$mail = $_POST['email'];
		$strmail = (string)$mail;

		// check if mail is exist in database 
		$sql = "SELECT * FROM login WHERE email = '$mail' ";
		$result = mysqli_query($conn, $sql);
		$resultSqlNum = mysqli_num_rows($result);
		
		$msg = rand(1000,10000);
		$strmsg = (string)$msg;

		$SESSION['random'] = $strmsg;

		if($resultSqlNum > 0){
			// mail exist then send an email to the user
			if(mail($strmail,"Password reset",$strmsg)){
				header('Location: confirmpwd.php?mail='.$strmail.'&');
				exit();
			}else{
				//echo "there is some problem ";
				header('Location: index.php?mailstatus=ise');
				exit();
			}
		}else{
			// mail is not exist
			header('Location: index.php?mailstatus=notexist');
			exit();
		}

	}else{
		// otherwise redirect to home page
		header('Location: index.php?error');
		exit();
	}

?>