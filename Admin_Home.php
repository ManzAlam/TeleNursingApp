<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: index.php?err=2');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator homepage</title>

    <!-- Bootstrap
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	-->
	<link href='main.css' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" type="image/png" href="img/icon.png" />
  </head>
  <body>
    
	<a  href="#" onclick="history.back();return false">
		<img src="img/back_button.png" alt="back" style="width:75px;height:75px;border:0">
	</a>
    <div class="container">

<h1>
<a>
<img src="logo1.png" alt="RemoCare" />
</a>
</h1>
<h2>ADMINISTRATOR HOMEPAGE </h2>

    <div id="login">
		<fieldset class="classfix">
			<p><span class="fontawesome-user"></span><a href="registration.php">User Registration</a></p>
			<p><span class="fontawesome-user"></span><a href="patient_registration.php">Patient Registration</a></p>
			<p><span class="fontawesome-camera"></span><a href="camera_registration.php">Camera Registration</a></p>
			<p><span class="fontawesome-off"></span><a href="logout.php">Logout</a></p>
         

    </div> <!-- end login -->
</div> 

</form>
      <!--<div class="container">


        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><?php echo $_SESSION['sess_username'];?></a></li>
            <li><a href="logout.php">Logout</a></li>
			 <li><a href="registration.php">User Registration</a></li>
			 <li><a href="patient_registration.php">Patient Registration</a></li>
			 <li><a href="camera_registration.php">Camera Registration</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container homepage">
      <div class="row">
         <div class="col-md-3"></div>
            <div class="col-md-6 welcome-page">
              <h2>This is Admin area.</h2>
            </div>
          <div class="col-md-3"></div>
        </div>



    </div> --> 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    </body>
	<script>
	function goBack() {
    window.history.back();
}
</script>
</html>