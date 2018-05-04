<?php include_once 'head.php'; ?>
 
<!-- include header file to display top header menu -->
<?php require_once 'header.php' ?>

<!-- content for this page goes here -->
<div id="companywisepost-page" class="container">
	<div class="col-lg-9 col-md-9 col-sm-8">
		<div id="companywisepost-page-main-content"  >
			<div id="companywise-post-header">
				<h2><i>Company wise post</i></h2>
			</div>
			<div id="companywisepost-main-content">
				<?php
					// include database connection
					include 'connection/connection.php';
					$sql = "SELECT DISTINCT post_cName FROM tbl_post";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if($resultCheck > 0){
						// some post are available
						echo '<div id="company-list"><ul class="list-group">';
						while($row = mysqli_fetch_assoc($result)){
							$cname = $row['post_cName'];
							echo '<li class="list-group-item"><a href="post-list.php?cname='.$cname.'&">'.$cname.'</a></li>';
						}
						echo '</ul></div>';
					}else{
						// no post into database
						echo 'Sorry! There is no post';
					}
				?>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-4">
		<div id="companywisepost-page-sidebar" >
			<div id="companywisepost-page-sidebar-div">
				<?php include_once 'sidebar-recent-post-list.php'; ?>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	#companywisepost-page-sidebar-div{
		margin-left: 10px;
		margin-right: 10px;
	}
	#companywisepost-page-main-content {
		min-height: 600px;
		margin-top: 20px;
		margin-bottom: 20px;
		box-shadow: 3px 3px 5px #d9d9d9;
		background-color: #f2f2f2;
		padding: 10px;
	}

	#companywisepost-page-main-content #companywise-post-header{
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

	#companywisepost-page-main-content #companywisepost-main-content{
		padding-top: 30px;
		padding-left: 10px;
		padding-right: 10px;
	}

	#companywisepost-page-sidebar {
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
	#company-list{
		padding: 20px;
	}
</style>


<?php include_once 'footer.php'; ?>