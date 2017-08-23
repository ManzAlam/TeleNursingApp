<!DOCTYPE HTML>

<?php 
    session_start();
    $role2 = $_SESSION['sess_userrole'];
	$user2 = $_SESSION['sess_username'];
	$patient2 = $_SESSION['sess_patient'];

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

			$sql = "SELECT hr, mn, sec FROM audio WHERE id=(select max(id) from audio)";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
				print  "  Hour:  " . $row["hr"]. "   Min:  " . $row["mn"]. "   sec:  " . $row["sec"]."<br>";
				
				$hour1 = $row["hr"];
				$min1 = $row["mn"];
				$sec1 = $row["sec"];
				
		
				}
			} else {
				echo "0 results";
			}
?>

<?php
$page = $_SERVER['PHP_SELF'];
	$sec = "30";

?>




<html>
    <head>
        <title>nativeDroid - Theme for jQuery Mobile</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		
		 <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'"> 
		
		<!-- FontAwesome - http://fortawesome.github.io/Font-Awesome/ -->
        <link rel="stylesheet" href="css/font-awesome.min.css" />

		<!-- jQueryMobileCSS - original without styling -->
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />

		<!-- nativeDroid core CSS -->
        <link rel="stylesheet" href="css/jquerymobile.nativedroid.css" />

		<!-- nativeDroid: Light/Dark -->
        <link rel="stylesheet" href="css/jquerymobile.nativedroid.dark.css"  id='jQMnDTheme' />

		<!-- nativeDroid: Color Schemes -->
        <link rel="stylesheet" href="css/jquerymobile.nativedroid.color.green.css" id='jQMnDColor' />

		<!-- jQuery / jQueryMobile Scripts -->
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>

		<!-- Javascript -->
		<script src="js/nativedroid.script.js"></script>
		
		
		<script>
function startTime() {

var setMinute = "<?php echo $min1?>"; //14:00, 2:00 PM

var setSecond = "<?php echo $sec1?>"; //14:00, 2:00 PM

var setHour = "<?php echo $hour1?>"; //14:00, 2:00 PM


    var today=new Date();
    var h=today.getHours();
    var m=today.getMinutes();
    var s=today.getSeconds();
	var vid = document.getElementById("myVideo");
    m = checkTime(m);
    s = checkTime(s);
	h = checkTime(h);
    document.getElementById('txt').innerHTML = h+":"+m+":"+s;
    var t = setTimeout(function(){startTime()},500);
	
	 if(  h == setHour && m == setMinute && s == setSecond  ){

	
		 vid.autoplay = true;
    vid.load();
	
	
    }
	

}

function checkTime(i) {
    if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
		
		

    </head>
<body onload="startTime()">
    
	<!-- Monitor page -->
    <div data-role="page" id="monitor" data-theme='b'>
	
	<!-- Panel for Menu -->
		<div data-role="panel" data-display="push" id="mypanel" data-theme="b">
			<ul data-role="listview">
				<li>Hello! Dr. Fresh</li>
				<li data-icon='false'><a href="index.html" data-ajax="false"><i class='lIcon fa fa-lock'></i>Logout</a></li>
			</ul>
		</div>

	<!-- Header -->
        <div data-role="header" data-position="fixed" data-tap-toggle="false" data-theme='b'>
            <!--<a href="index.html" data-ajax="false"><i class='fa fa-bars'></i></a>-->
			<a href="#mypanel" data-role='button' data-inline='true'><i class='fa fa-bars'></i></a>
            <h1>TeleNursing</h1>
        </div>
        
	<!-- Monitor Content -->
        <div data-role="content">   
	        <div class='inset'>
	        	<h1>Audio Reminder Interface - <?php echo $patient2?></h1>

 <div id="txt  "></div> 

<h3>Next Reminder Set for = <?php echo $hour1?> : <?php echo $min1?> : <?php echo $hour1?> </h3> 


<audio id="myVideo" controls="controls">
	<source src="uploads/goku.wav" type="audio/wav">    
	
</audio> 
				</div>
		</div>
		
		
	<!-- Footer Buttons -->
	

    </div>
	
    
    </body>
</html>

