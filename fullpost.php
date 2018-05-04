<?php include_once 'head.php'; ?>
<?php include_once 'header.php'; ?>

<!-- content for this page goes here -->
<div id="fullpost-page" class="container">
	<div class="col-lg-9 col-md-9 col-sm-8">
		<div id="fullpost-page-main-content"  >
			<div id="fullpost-main-content">
				<?php

					$cname = $_GET['cname'];
					$time = $_GET['time'];
					// make connection with database
					include_once 'connection/connection.php';
					$sql = "SELECT * FROM tbl_post WHERE post_cName = '$cname' AND post_create_time= '$time'";
					$resultSql = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($resultSql);
					if($resultCheck>0){
						$row = mysqli_fetch_assoc($resultSql);
						$postText = $row['post_text'];
						$jType = $row['post_jType'];
						$jProfile = $row['post_jProfile'];
						$ownerName = $row['post_ownerName'];
						echo '
								<div class="media">
									<div class="media-left">
									    <img src="image/media-user-icon.png" class=" media-object" />
									</div>
									<div class="media-body">
										<h5 class="media-heading"><b>'.$ownerName.'</b><small>
										<i >posted on : '.$time.'</i></small>
										</h5>
										<div id="media-content">
											<h5><b><i>Company Name: </i></b>'.$cname.'</h5>
											<h5><b><i>Job Type: </i></b>'.$jType.'</h5>
											<h5><b><i>Job Profile: </i></b>'.$jProfile.'</h5>
											<p><b><i>Interview Experience: </i></b>'.$postText.'</p>
										</div>
									</div>
								</div>
								';
					}else{

					}
				?>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-4 ">
		<div id="fullpost-page-sidebar" >
			<div id="fullpost-page-sidebar-div">
				<?php include_once 'sidebar-recent-post-list.php'; ?>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	#fullpost-page-sidebar-div{
		margin-left: 10px;
		margin-right: 10px;
	}
	#fullpost-page-main-content {
		min-height: 600px;
		margin-top: 20px;
		margin-bottom: 20px;
		box-shadow: 3px 3px 5px #d9d9d9;
		background-color: #f2f2f2;
		padding: 10px;
	}

	#fullpost-page-main-content #fullpost-main-content{
		width:100%;
		min-height: 500px;
		padding-top: 25px;
		background: -moz-linear-gradient(#6dbbff, #f2f2f2); 
    	background: linear-gradient(#6dbbff, #f2f2f2); 
	}
	

	#fullpost-page-main-content #fullpost-main-content{
		padding-top: 30px;
		padding-left: 10px;
		padding-right: 10px;
	}

	#fullpost-page-sidebar {
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


<?php include_once 'footer.php'; ?>