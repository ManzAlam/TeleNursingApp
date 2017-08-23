<!DOCTYPE html>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
	$user = $_SESSION['sess_username'];
	
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: index.php?err=2');
    }
?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rolelogin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT patient FROM patients WHERE username = '$user'";
$result = $conn->query($sql);

?>


<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<link href='main.css' rel='stylesheet' type='text/css'>
</head>

<body>

<div class="container">

<h1>
<a>
<img src="logo1.png" alt="RemoCare" />
</a>
</h1>
    <div id="login">
	 
    <form action="authenticate2.php" method="POST" class="login" role="form" data-ajax="false">  
   
        
          <fieldset class="clearfix">
		  <h2 for="login"> username: <?php echo $user; ?> </h2>


  
  
      <h2 for="password">Patient:   <?php
      echo "<select name='patient'>";
 while($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['patient'] . "'>" . $row['patient'] . "</option>";
}
echo "</select>";
		?> </h2>
	  
	  <h2>
	 
		</h2>	
    
		   
		   <p><input type="submit" value="Next"></p>

          </fieldset>

        </form>

    </div> <!-- end login -->
 
</div>

<!--<div class="top">  <h3><a href="http://softouchz.com/">www.softouchz.com</a></h3></div>-->
   
	
</body>
</html>