<?php include_once 'head.php' ?>
<?php include_once 'header.php' ?>

<!-- content for this page goes here -->
<div id="companywisepost-list-page" class="container">
	<div class="col-lg-9 col-md-9 col-sm-8">
		<div id="companywisepost-list-page-main-content"  >
			<div id="companywise-post-header">
				<h2><i>Post list</i></h2>
			</div>
			<div id="companywisepost-list-main-content">
				<?php
	include 'connection/connection.php';

	$cname = mysqli_real_escape_string($conn,$_GET['cname']);
	
	$postListSql = "SELECT * FROM tbl_post WHERE post_cName='$cname'";
	$resultPostListSql = mysqli_query($conn, $postListSql);
	$resultPostListSqlCheck = mysqli_num_rows($resultPostListSql);
	if($resultPostListSqlCheck > 0){
		// retrieve all the post with this company name
		while($row = mysqli_fetch_assoc($resultPostListSql)){
			$time = $row['post_create_time'];
			$text = $row['post_text'];
			$jType = $row['post_jType'];
			$jProfile = $row['post_jProfile'];
			$ownerName = $row['post_ownerName'];
			$fullPostLink = '<a href="fullpost.php?cname='.$cname.'&time='.$time.'&">...See full post</a>';
								echo '
								<div class="media">
									<div class="media-left">
									    <img src="image/media-user-icon.png" class=" media-object" />
									</div>
									<div class="media-body">
										<h5 class="media-heading"><b>'.$ownerName.'</b><small>
										<i>posted on : '.$time.'</i></small>
										</h5>
										<div id="media-content">
											<h5><b><i>Company Name: </i></b>'.$cname.'</h5>
											<h5><b><i>Job Type: </i></b>'.$jType.'</h5>
											<h5><b><i>Job Profile: </i></b>'.$jProfile.'</h5>
											<p><b><i>Interview Experience: </i></b>';
											
											$textlength = strlen($text);
											$postSubstring ="";
											if($textlength<=250){
												echo $text;
											}else{
												$postSubstring = substr($text,0,250);
												echo $postSubstring.$fullPostLink;
											}

										echo '</p>
										</div>
									</div>
								</div>
								';
		}
	}else{
		// no post avialable with this company name
	}
	?>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-4">
		<div id="companywisepost-list-page-sidebar" >
			<div id="companywisepost-list-page-sidebar-div">
				<?php include_once 'sidebar-recent-post-list.php'; ?>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	#companywisepost-list-page-sidebar-div{
		margin-left: 10px;
		margin-right: 10px;
	}
	#companywisepost-list-page-main-content {
		min-height: 600px;
		margin-top: 20px;
		margin-bottom: 20px;
		box-shadow: 3px 3px 5px #d9d9d9;
		background-color: #f2f2f2;
		padding: 10px;
	}

	#companywisepost-list-page-main-content #companywise-post-header{
		width:100%;
		height: 200px;
		padding-top: 25px;
		background: -moz-linear-gradient(#0077b3, #f2f2f2); 
    	background: linear-gradient(#0077b3, #f2f2f2); 
    	font-family: serif;
	    font-style: italic;
	    font-size: 1.5em;
	    color:#0d0d0d;
	    text-align: center;
	    text-shadow: 1px 2px 1px #8c8c8c;
	}

	#companywisepost-list-page-main-content #companywisepost-list-main-content{
		padding-top: 30px;
		padding-left: 10px;
		padding-right: 10px;
	}

	#companywisepost-list-page-sidebar {
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

