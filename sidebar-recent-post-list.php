				<?php
					if(isset($_SESSION['u_id'])){
						echo '<a id="btn-shareExperience" href="sharepost.php" class="btn btn-primary form-control">Share Experience</a>';
					}else{
						echo '';
					}
					include 'connection/connection.php';
					echo '<h5 style="text-align: center;">Recent Post</h5><hr/>';
					$sql = "SELECT * FROM tbl_post ORDER BY post_create_time DESC LIMIT 5";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if($resultCheck>0){
						echo '<ul class="list-group">';
						while($row = mysqli_fetch_assoc($result)){
							$cName = $row['post_cName'];
							$time = $row['post_create_time'];
							$fullPostLink = '<li class="list-group-item"><a href="fullpost.php?cname='.$cName.'&time='.$time.'">'.$cName.'</a></li>';
							echo $fullPostLink;
						}
						echo "</ul>";
					}else{
						echo "No post avialable";
					}

					echo '<a type="button" href="companywisepost.php" class="btn btn-primary form-control">Company wise Post</a>';
				?>