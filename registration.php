<html>

<head>
	<title>Add New User</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<script src="js/jquery-1.9.1.min.js"></script>
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
		   $id = addslashes ($_POST['id']);
		   $username = addslashes ($_POST['username']);
		   $password = addslashes ($_POST['password']);
		   $role = addslashes ($_POST['role']);
		}
		else
		{
		   $id = $_POST['id'];
		   $username = $_POST['username'];
		   $password = $_POST['password'];
		   $role = $_POST['role'];

		}

		$sql = "INSERT INTO users ".
			   "(id, username, password, role) ".
			   "VALUES('$id','$username','$password','$role')";
		mysql_select_db('rolelogin');
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
		  die('Could not enter data: ' . mysql_error());
		}
		//print "Entered data successfully\n";
		//echo '<p>."Entered data successfully".</p>' 
		header('Location: registration.php?err=1');
		mysql_close($conn);
		}
		else
		{
	?>	
	
					<?php 
                                $errors = array(
                                    1=>"Data Entered Successfully",
                                  );

                                $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;

                                if ($error_id == 1) {
                                        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                    }
                    ?>  

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
			USERNAME:
			<p><span class="fontawesome-user"></span><input name="username" type="text" id="username" required/></p>
            PASSWORD:
			<p><span class="fontawesome-lock"></span><input name="password" type="password" id="password" /> </p>
			CONFIRM PASSWORD:
			<p><span class="fontawesome-lock"></span><input name="passwordCon" type="password" id="passwordCon" onChange="checkPassword();" /><div id="confirmP"><div class="fontawesome-remove-sign"></div></div></p>
			ROLE OF USER:
			<select name="role" id="role">
                <option value="user">user</option>
                <option value="admin">admin</option>
                <option value="doctor">doctor</option>
                <option value="nurse">nurse</option>
			</select>
			<div id="add"></div>

          </fieldset>

        </form>

    </div> <!-- end login -->
</div> 
<?php
}
?>
</body>
<script>
	function checkPassword() {
    var password = $("#password").val();
    var confirmPassword = $("#passwordCon").val();
	var html = $(" ");
    if (password != confirmPassword)
	{
	$("#divCheckPasswordMatch").html("Passwords do not match!");
	$("#add").html(html);
	html= $('<div class="fontawesome-remove-sign"/>');
	$("#confirmP").html(html);
	}
	
    else 
	{
	$("#divCheckPasswordMatch").html("Passwords match.");
	html= $('<input name="add" type="submit" id="add" value="Add Employee"/>');
	$("#add").html(html);
	html= $('<div class="fontawesome-ok-sign"/>');
	$("#confirmP").html(html);
	}
}

$(document).ready(function () {
    $("#passwordCon").keyup(checkPassword);
});
	</script>
</html>