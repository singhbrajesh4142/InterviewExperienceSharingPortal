<!-- check if session variable is set -->
<?php
	if(!isset($_SESSION['u_id'])){
		header('Location: index.php?error');
		exit();
	}
?>

			<div id="display-profile-pic">
				<div id="profile-pic">

			<?php 
				// set profile image 
				include_once 'connection/connection.php';
				$userName = $_SESSION['u_uname'];
				$setProfileImgSql = "SELECT * FROM profileimg WHERE uid = '$userName'";
				$resultSetProfileImgSql = mysqli_query($conn, $setProfileImgSql);
				$resultCheck = mysqli_num_rows($resultSetProfileImgSql);
				$src = "profileUploads/default.jpg";
				if($resultCheck > 0 ){
					$row = mysqli_fetch_assoc($resultSetProfileImgSql);
					if($row['status'] == 1){
						$src = "profileUploads/".$row['img'];
					}
				}
				echo '<img src="'.$src.'" style="width: 150px; height: 150px;" class=" img-responsive img-circle"  />';
			?>
					
				</div>
			</div>
