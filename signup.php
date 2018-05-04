<?php require_once 'head.php' ?>

<!-- include header file to display top header menu -->
<?php require_once 'header.php' ?>

<!-- content for this sign up page begins here -->
<div id="container-signup-page">
  <div class="col-lg-3 col-md-2 col-sm-2">

  </div>
	<div class="col-lg-6 col-md-8 col-sm-8 col-xs-12" id="page-signup">

        	<legend><h3>Register here</h3></legend>
        <br/>
        <!-- display error the user -->
        <?php 
          if(isset($_GET['signup'])){
            $status = $_GET['signup'];
            $msg = "";
            if($status == "success"){
              $msg = "You are registered Successfully !";
              echo "<span style='color:green;'>".$msg."</span>";
              $msg = "";
            }

            if ($status == "emptyfields") {
              $msg = "All fields are erquired !";
            }
            elseif ($status == "invalid_email") {
              $msg = "Invalid Email";
            }
            elseif ($status == "password_not_match") {
              $msg = "password fields are not matched!";
            }
            elseif ($status == "usernameExist") {
              $msg = "Username or Email already Exist ! Please choose another";
            }elseif ($status == "regLength") {
              $msg = "Registration no should be 8 digit long !";
            }elseif ($status == "notdigit") {
              $msg = "Only digits are allowed in registration no!";
            }elseif ($status == "invalidReg") {
              $msg = "Invalid registration no !";
            }elseif ($status == "pwd7") {
              $msg = "Password should be at least 7 character long !";
            }
            echo "<span style='color:red;'>".$msg."</span>";
          }
         ?>
      <form id='form-signup' action='codebehind/code.signup.php' method='post' accept-charset='UTF-8'>
        <div class="form-group">
         <label for='username' class="control-label">UserName*</label>
         <input class="form-control" type='text' name='username'  placeholder="Username" />
         <span></span>
        </div>
        <div class="form-group">
         <label for='registration_number' class="control-label">Registration Number*</label>
         <input class="form-control" type="text" name="reg-number" placeholder="Registration Number"/>
         <span></span>
        </div>
        <div class="form-group">
          <label for="email" class="control-label">Email*</label>
          <input type="text" class="form-control" name="email" placeholder="mail@domain.com" />
          <span></span>
        </div>
        <div class="form-group">
            <label for='password' class="control-label">Password*:</label>
            <input type='password' name='password' class="form-control"  placeholder="Password"/>
            <span></span>
        </div>
        <div class="form-group">
            <label for="password_confirm" class="control-label">Confirm Password*</label>
            <input type="password" name="confirm-pwd" class="form-control"  placeholder="Confirm Password "/>
            <span></span>
        </div>
        <button class="btn btn-primary" type='submit' name='signup'>Register</button>
      </form>
    </div>
</div>
<style type="text/css">
#container-signup-page{
	background-color: #f2f2f2;
}

#page-signup{
		padding-top: 15px;
		padding-bottom: 25px;
	
	margin: auto;
	background-color: #f2f2f2;
}

#form-signup{
    margin-left: 10px;
    margin-right: 10px;
}

#page-signup legend h3{
	text-align: center;
}

#page-signup #form-signup button{
	align-self: center;
}
h3{
	font-family: serif;
    font-style: italic;
    font-size: 1.5em;
    color:#0d0d0d;
    text-shadow: 1px 2px 1px #8c8c8c;
}
</style>

<?php include_once 'footer.php'; ?>