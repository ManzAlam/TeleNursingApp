<html>
<head>
<title>Camera Registration</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link href='main.css' rel='stylesheet' type='text/css'>
<link rel="icon" type="image/png" href="img/icon.png" />
</head>
<body>
<?php
if(isset($_POST['add']))
{
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';


$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

if(! get_magic_quotes_gpc() )
{
   //$id = addslashes ($_POST['id']);
  //  $username = addslashes ($_POST['username']);
  $patient = addslashes ($_POST['patient']);
  $camera = addslashes ($_POST['camera']);
}
else
{
  // $id = $_POST['id'];
  // $username = $_POST['username'];
   $patient = $_POST['patient'];
   $camera = $_POST['camera'];

}

$sql = "INSERT INTO cameras ".
       "(patient, camera) ".
       "VALUES('$patient','$camera')";
mysql_select_db('rolelogin');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
echo "Entered data successfully\n";
mysql_close($conn);
}
else
{
?>


	
<div class="container">

<h1>
<a>
<img src="logo1.png" alt="RemoCare" />
</a>
</h1>
<h2>CAMERA REGISTRATION </h2>

    <div id="login">
	
         <form method="post" action="<?php $_PHP_SELF ?>"> 
		
          <fieldset class="clearfix">
			PATIENT:
			<p><span class="fontawesome-user"></span><input name="patient" type="text" id="patient" required></p>
            CAMERA:
			<p><span class="fontawesome-camera"></span><input name="camera" type="text" id="camera" required> </p>
			<input name="add" type="submit" id="add" value="Register Camera">
          </fieldset>

        </form>

    </div> <!-- end login -->
</div> 

</form>
<?php
}
?>
</body>
</html>