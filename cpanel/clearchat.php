		<?php
			
				if(isset($_POST['deletechat'])){
					if($con = mysqli_connect("localhost", "root", "" , "portal")){
						$clearSql = "DELETE FROM chat";
						if($result = mysqli_query($con, $clearSql)){
						}else{
							echo "There is a problem while deleting the row!";
						}
					}
					header('Location: userdetail.php');
					exit();
				}else{
					header('Location: index.php');
					exit();
				}
			
		?>