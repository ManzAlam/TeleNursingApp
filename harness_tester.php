<!DOCTYPE html> 
 
<?php
 session_start();
    $role2 = $_SESSION['sess_userrole'];
	$user2 = $_SESSION['sess_username'];
	$patient2 = $_SESSION['sess_patient'];
	
    if(!isset($_SESSION['sess_username']) && $role!="doctor"){
      header('Location: index.php?err=2');
    }
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

	   $heart = addslashes ($_POST['heart']);
	   $breathing = addslashes ($_POST['breathing']);
	   $farting = addslashes ($_POST['farting']);
	   
	}
	else
	{

	   $note = $_POST['note'];

	}

	$sql = "INSERT INTO harness ".
		   "(heart, breathing, farting) ".
		   "VALUES('$heart','$breathing','$farting')";
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


<html lang="en">
<head>

</head>

<body>


<form method="post" action="<?php $_PHP_SELF ?>"> 
					 
							<tr>
								<td width="100"><p>Heart Rate, Breathing Rate, Farting Rate </p></td>
								
								<td><input name="heart" type="text" id="heart"  style="font-face: 'Comic Sans MS'; font-size: larger; color: Black; background-color: #FFFFC0;"  ></td>
								
								<td><input name="breathing" type="text" id="breathing"  style="font-face: 'Comic Sans MS'; font-size: larger; color: Black; background-color: #FFFFC0;"  ></td>
								
								<td><input name="farting" type="text" id="farting"  style="font-face: 'Comic Sans MS'; font-size: larger; color: Black; background-color: #FFFFC0;"  ></td>
								
								
								
							</tr>
							
							<input name="add" type="submit" id="add" value="Add readings" style="font-face: 'Comic Sans MS'; font-size: larger; color: Black; background-color: #FFFFC0;" >			 

					</form>





</body>