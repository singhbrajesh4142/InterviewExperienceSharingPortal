<?php require_once 'head.php' ?>

<!-- include header.php to display top header menu -->
<?php require_once 'header.php' ?> 

<!-- check if session variable is set -->
<?php
	if(!isset($_SESSION['u_id'])){
		header('Location: index.php?error');
		exit();
	}
?>

<!-- code for profile page begins here -->
<div id="groupchat-page" class="container">
	<div class="col-lg-9 col-md-9 col-sm-8">
		<div id="groupchat-page-main-content"  >		
			<div id="groupchat-content">
					<h4><i>Welcome <?php echo $_SESSION['u_uname']; ?> </i></h4>
					<hr/>
					<div id="group-chat">
						<div id="show-chat">
							<!-- chat content will be displayed here  -->
							Loading Chatlog...
						</div>
						<form name="chatform">
							<div class="input-group">
								<input type="text" name="msg" class="form-control" placeholder="Enter your message here..." />
								<span class="input-group-btn"><a href="#" type="button" class="btn btn-default" onclick="submitChat()">Send</a>
								</span>
							</div>
						</form>
					</div>

			</div>
		</div>
	</div>
	<!-- include profile page sidebar -->
	<?php include_once 'includes/profile-page-sidebar.php'; ?>
</div>
<style type="text/css">
	#group-chat{
		border: 1px solid #dce2ed;
	}

	#show-chat{
		min-height: 350px;
		background-color: #fff;
		border: 1px solid #dce2ed;
		padding:15px;
		font-family: serif;
    	font-style: italic;
    	font-size: 1em;
	}

	#groupchat-page-main-content {
		min-height: 600px;
		margin-top: 20px;
		box-shadow: 3px 3px 5px #d9d9d9;
		background-color: #f2f2f2;
		padding: 10px;
		margin-bottom: 25px;
	}

	#groupchat-page-main-content #groupchat-content h4{
		font-family: serif;
    	font-style: italic;
    	font-size: 1.5em;
    	text-align: center;
    	color:#0d0d0d;
    	text-shadow: 1px 2px 1px #8c8c8c;
	} 
	#profile-page-sidebar h4{
		padding-top: 20px;
		text-align: center;
	}

	#profile-page-sidebar {
		min-height: 400px;
		margin-top: 20px;
		box-shadow: 3px 3px 5px #d9d9d9;
		background-color: #f2f2f2;
		padding-left: 20px;
		line-height: 25px;
	}
	#profile-page-sidebar ul{
		list-style: none;
	}
	td{
		padding: 10px;
	}
</style>

<script type="text/javascript">

function submitChat() {
	if(chatform.msg.value == '') {
		alert("message field is empty!");
		return;
	}
	var msg = chatform.msg.value;
	var xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('show-chat').innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open('GET','insertChat.php?msg='+msg,true);
	xmlhttp.send();

}

$(document).ready(function(e){
	$.ajaxSetup({
		cache: true
	});
	setInterval( function(){ $('#show-chat').load('chatLogs.php'); }, 2000 );
});

</script>

<?php require_once 'footer.php' ?>