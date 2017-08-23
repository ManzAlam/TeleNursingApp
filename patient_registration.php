<html>
<head>
<title>Patient Registration</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link href='main.css' rel='stylesheet' type='text/css'>
<link rel="icon" type="image/png" href="img/icon.png" />
</head>
<body>

<!--
-->
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
  $username = addslashes ($_POST['username']);
  $patient = addslashes ($_POST['patient']);
}
else
{
   $username = $_POST['username'];
   $patient = $_POST['patient'];
}

$sql = "INSERT INTO patients ".
       "(username, patient) ".
       "VALUES('$username','$patient')";
mysql_select_db('rolelogin');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
echo "Entered data successfully\n";
mysql_close($conn);

}
?>
<!--
-->


	<div class="container">

<h1>
<a>
<img src="logo1.png" alt="RemoCare" />
</a>
</h1>
<h2>NEW USER REGISTRATION </h2>

    <div id="login">
	
         <form method="post" action="<?php $_PHP_SELF ?>"> 
		
          <fieldset class="clearfix">


<!--
-->
<p><span class="fontawesome-user"></span><input type="text" name="patient" required placeholder="patient">
</p>

<p> <span class="fontawesome-user-md"></span>Assign to: 
<select name="username" id="Caregiver">
<?php
$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';


		$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		if(! $conn )
		{
		  die('Could not connect: ' . mysql_error());
		}
		mysql_select_db('rolelogin');
$sql = mysql_query("SELECT username FROM users");
while ($row=mysql_fetch_array($sql))
{
echo "<option value='".$row['username']."' >".$row['username']."</option>";
}
?>
</select></p>

<input name="add" type="submit" id="add" value="Add Patient">
<!--
-->

</fieldset>

        </form>

    </div> <!-- end login -->
</div> 

</body>
</html>
