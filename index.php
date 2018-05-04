
<?php include_once 'head.php'; ?>
 
<!-- include header file to display top header menu -->
<?php require_once 'header.php' ?>

<!-- content for this page goes here -->
<div id="home-page" class="container">
		<div class="col-lg-9 col-md-9 col-sm-8">
		<div id="home-page-main-content"  >
			<div id="display-mnnit-logo">
				<div id="mnnit-logo">
					<img style="height:100px;width:100px;" src="image/mnnit.png" class="img-responsive img-circle"  />
				</div>
			</div>
			<div id="home-main-content">
				<?php
					// this is global variable for this page
					$page = 1;

					// make connection with database
					include_once 'connection/connection.php';
					if(isset($_GET['page'])){
						$page = $_GET['page'];
					}
					$showPostSql = "SELECT * FROM tbl_post ORDER BY post_create_time DESC";
					$resultShowPost = mysqli_query($conn, $showPostSql);
					$resultShowPostCheck = mysqli_num_rows($resultShowPost);
					if($resultShowPostCheck<1){
						// no post in post database
						echo "No Posts are avialable";
					}else{
						// some posts are avialable
						//echo $resultShowPostCheck;
						// retrieve all the post from database and display them
						while($row = mysqli_fetch_assoc($resultShowPost)){
							$postText = $row['post_text'];
							$postLength = strlen($postText);
							$time = $row["post_create_time"];
							$cName = $row["post_cName"];
							$fullPostLink = '<a href="fullpost.php?cname='.$cName.'&time='.$time.'">See full post</a>';
							echo '
								<div class="media">
									<div class="media-left">
									    <img src="image/media-user-icon.png" class=" media-object" />
									</div>
									<div class="media-body">
										<h5 class="media-heading"><b>'.$row["post_ownerName"].'</b><small>
										<i>posted on : '.$time.'</i></small>
										</h5>
										<div id="media-content">
											<h5><b><i>Company Name: </i></b>'.$cName.'</h5>
											<h5><b><i>Job Type: </i></b>'.$row["post_jType"].'</h5>
											<h5><b><i>Job Profile: </i></b>'.$row["post_jProfile"].'</h5>
											<p><b><i>Interview Experience: </i></b>';
							if($postLength <= 250){
								echo $postText;
							}else{
								$subString = substr($postText,0,250);
								echo $subString.'...'.$fullPostLink;
							}
							echo '</p>
										</div>
									</div>
								</div>

								';
						}
						
					}
				 ?>
				
			</div>
			<div id="prev-next">
					<ul class="pager">
						<?php if(isset($_GET['page'])){
								if($_GET['page']>1){
								echo '<li ><a href="index.php?page='.($page-1).'&">&larr; prev</a></li>';
								} 
							}
						?>
					<li ><a href="index.php?page=<?php echo $page+1; ?>&" >Next &rarr;</a></li>
					</ul>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-4 ">
		<div id="home-page-sidebar" >
			<div id="home-page-sidebar-div">
				<?php include_once 'sidebar-recent-post-list.php'; ?>
			</div>
		</div>
	</div>

</div>
<style type="text/css">
	#home-page-sidebar-div{
		margin-left: 10px;
		margin-right: 10px;
	}
	#home-page-main-content {
		min-height: 600px;
		margin-top: 20px;
		margin-bottom: 20px;
		box-shadow: 3px 3px 5px #d9d9d9;
		background-color: #f2f2f2;
		padding: 10px;
	}

	#home-page-main-content #display-mnnit-logo{
		width:100%;
		height: 200px;
		padding-top: 25px;
		background: -moz-linear-gradient(#0077b3, #f2f2f2); 
    	background: linear-gradient(#0077b3, #f2f2f2); 
	}
	#home-page-main-content #display-mnnit-logo #mnnit-logo{
		height: 100px;
		width: 100px;
		border: 1px solid #f2f2f2;
		border-radius: 75px;
		background-color: #f2f2f2;
		margin: auto;
	}

	#home-page-main-content #home-main-content{
		padding-top: 30px;
		padding-left: 10px;
		padding-right: 10px;
	}

	#home-page-sidebar {
		padding-top: 20px;
		min-height: 400px;
		margin-top: 20px;
		box-shadow: 3px 3px 5px #d9d9d9;
		background-color: #f2f2f2;
		line-height: 25px;
	}
	#media-content{
		margin-left: 10px;
		margin-top: 10px;
		padding: 10px;
		max-width: 800px;
		border: 1px solid #d9d9d9;
		border-radius: 4px;
		margin-bottom: 20px;
		background-color: #fff;
	}
	
</style>
				<?php
				// error message for password reset
					if(isset($_GET['mailstatus'])){
						if($_GET['mailstatus'] == "notexist"){
							echo '<script> alert("This mail is not registered in our database"); </script>';
						}elseif ($_GET['mailstatus'] == "ise") {
							echo '<script> alert("Sorry! Internal Error ! mail could not be sent !"); </script>';
						}
					}
					if(isset($_GET['pwdc'])){
						if ($_GET['pwdc'] == "success") {
							echo '<script> alert("Password updated successfully !"); </script>';
						}
					}
					if(isset($_GET['login'])){
						if ($_GET['login'] == "error") {
							echo '<script> alert("Login Error !"); </script>';
						}
					}
				?>
<?php include_once 'footer.php'; ?>