<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <style type="text/css">
    body{
      background-color: #cbd1db;
    }
    #adminlogin{
      width: 250px;
      margin-top: 15%;
      margin-left: auto;
      margin-right: auto;
      text-align: center;
    }
    #login{
      border: 1px solid #7085a5;
      border-radius: 4px;
      padding: 20px;
      background-color: #aaaeb5;
    }
  </style>
  </head>
  <body>
    
    <div id="adminlogin">
      <h2> Admin Panel </h2>
      <?php
          if(isset($_GET['err'])){
                $status = $_GET['err'];
                if($status == "1" || $status == "2"){
                  echo '<span style="color:RED";>Unautherized Access !</span>';
                }
          }
      ?>
      <div id="login">
        <form action="alogin.php" method="POST">
        <div class="form-group">
          <input type="text" name="adminusername" placeholder="Username" class="form-control"/>
          <input type="password" name="adminpwd" placeholder="password" class="form-control"/>
        </div>
        <button type="submit" name="btnAdminLogin" class="btn btn-primary form-control">Login</button>
      </form>
      </div>
    </div>
  </body>
</html>