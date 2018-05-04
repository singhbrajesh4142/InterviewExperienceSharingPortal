<?php include_once 'head.php'; ?>
<?php include_once 'header.php'; ?>

<!-- content for this page goes here -->
<div id="search-page" class="container">
	<div class="col-lg-9 col-md-9 col-sm-8">
		<div id="search-page-main-content"  >
			<div id="display-search-result">
				
			</div>
			<div id="search-main-content">
				<?php
					// make connection with database
					include_once 'connection/connection.php';
					// check if it is a post back request
					if(isset($_POST['btn-search'])){
						$searchText = $_POST['search-field'];
						$searchSql = "SELECT * FROM tbl_post WHERE post_cName LIKE '%$searchText%' OR
										post_ownerName LIKE '%$searchText%' OR post_text LIKE '%$searchText%' OR post_jProfile LIKE '%$searchText%' OR post_jType LIKE '%$searchText%' OR post_create_time LIKE '%$searchText%'";
						$resultSearchSql =mysqli_query($conn, $searchSql);
						$resultSearchSqlCheck = mysqli_num_rows($resultSearchSql);
						if($resultSearchSqlCheck>0){
							echo $resultSearchSqlCheck." matching results found";
							while($row = mysqli_fetch_assoc($resultSearchSql)){
								$postText = $row['post_text'];
								$subString = substr($postText,0,150);
								$cName = $row["post_cName"];
								$time = $row["post_create_time"];
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
											<p><b><i>Interview Experience: </i></b>'.$subString.' ...'.$fullPostLink.'
											</p>
										</div>
									</div>
								</div>
								';
							}
						}else{
							echo "There is no results matching your search!";
						}
					}else{
						echo "This  is not a post back request";
					}
					
				 ?>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-4">
		<div id="search-page-sidebar" >
			<div id="search-page-sidebar-div">
				<?php include_once 'sidebar-recent-post-list.php'; ?>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	#search-page-sidebar-div{
		margin-left: 10px;
		margin-right: 10px;
	}
	#search-page-main-content {
		min-height: 600px;
		margin-top: 20px;
		margin-bottom: 20px;
		box-shadow: 3px 3px 5px #d9d9d9;
		background-color: #f2f2f2;
		padding: 10px;
	}

	#search-page-main-content #display-search-result{
		width:100%;
		height: 200px;
		padding-top: 25px;
		background: -moz-linear-gradient(#0077b3, #f2f2f2); 
    	background: linear-gradient(#0077b3, #f2f2f2); 
	}
	

	#search-page-main-content #search-main-content{
		padding-top: 30px;
		padding-left: 10px;
		padding-right: 10px;
	}

	#search-page-sidebar {
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