<!-- All the PHP scripts -->

<?php
/* Php Script for inserting Notes */
   
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
	
	$time = date("Y-m-d h:i:sa");


	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
	  die('Could not connect: ' . mysql_error());
	}

	if(! get_magic_quotes_gpc() )
	{

	   $note = addslashes ($_POST['note']);
	}
	else
	{

	   $note = $_POST['note'];

	}

	$sql = "INSERT INTO notes ".
		   "(username, patient, note, timestamp) ".
		   "VALUES('$user2','$patient2','$note','$time')";
	mysql_select_db('rolelogin');
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
	  die('Could not enter data: ' . mysql_error());
	}
	//echo "Entered data successfully\n";
	mysql_close($conn);
}

?>

<?php

/* Php Script for dynamic cameras */

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

	$sql = "SELECT camera FROM cameras WHERE patient = '$patient2'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
	  while($row = $result->fetch_assoc()) {
		
		$players[] = $row['camera'];
		
	//	$feed = $row["camera"];
		}

	} else {
		echo "no available cams";
	}
	$conn->close(); 

	$counter = $result->num_rows;

?>

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
  $hr = addslashes ($_POST['hr']);
  $mn = addslashes ($_POST['mn']);
  $sec = addslashes ($_POST['sec']);
  
}
else
{
  // $id = $_POST['id'];
  // $username = $_POST['username'];
   $hr = $_POST['hr'];
   $mn = $_POST['mn'];
   $sec = $_POST['mn'];
   
}

$sql = "INSERT INTO audio ".
       "(hr, mn, sec) ".
       "VALUES('$hr','$mn','$sec')";
mysql_select_db('rolelogin');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}

mysql_close($conn);
}


?>


<html>
    <head>
        <title>nativeDroid - Theme for jQuery Mobile</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		
			
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	
	<!-- All things CSS -->

    <link href="bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" >

	<style>
			audio {
				vertical-align: bottom;
				width: 10em;
			}
			video {
				vertical-align: top;
				max-width: 100%;
			}
			input {

				font-size: 2em;
				margin: .2em;
				width: 30%;
			}
			p,
			.inner {
				padding: 1em;
			}
			li {

				padding: .5em;
			}
			label {
				display: inline-block;
				width: 8em;
			}
	</style>
		
		
		
		
		<!-- FontAwesome - http://fortawesome.github.io/Font-Awesome/ -->
        <link rel="stylesheet" href="css/font-awesome.min.css" />

		<!-- jQueryMobileCSS - original without styling -->
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile.structure-1.4.2.min.css" />

		<!-- nativeDroid core CSS -->
        <link rel="stylesheet" href="css/jquerymobile.nativedroid.css" />

		<!-- nativeDroid: Light/Dark -->
        <link rel="stylesheet" href="css/jquerymobile.nativedroid.dark.css"  id='jQMnDTheme' />

		<!-- nativeDroid: Color Schemes -->
        <link rel="stylesheet" href="css/jquerymobile.nativedroid.color.green.css" id='jQMnDColor' />
		
		<style>

		#harness_page{
		display: none;
		}
		#report_page{
		display: none;
		}
		#recorder_page{
		display: none;
		}
	

		</style>

		<!-- jQuery / jQueryMobile Scripts -->
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>

		<!-- Javascript -->
		<script src="js/nativedroid.script.js"></script>
		
		
		
		<script>
		<!-- jQuery for switching between DIVs -->
		
		$(document).ready(function(){
			$("#hide").click(function(){
				$("#monitor_page").show();
				$("#harness_page").hide();
			    $("#report_page").hide();
				$("#recorder_page").hide();
				
				
			});
			$("#show").click(function(){
				$("#harness_page").show();
				$("#monitor_page").hide();
				$("#report_page").hide();
				$("#recorder_page").hide();
		
				

			});
			$("#notebutton").click(function(){

				$("#report_page").show();
				$("#monitor_page").hide();
				$("#harness_page").hide();
				$("#recorder_page").hide();
			
	
			});
			$("#recorderbutton").click(function(){
			
				$("#recorder_page").show();
				$("#monitor_page").hide();
				$("#harness_page").hide();
				$("#report_page").hide();
				
			

			});
		});
		</script>
	
		
	<style>
                /* jssor slider bullet navigator skin 21 css */
                /*
                .jssorb21 div           (normal)
                .jssorb21 div:hover     (normal mouseover)
                .jssorb21 .av           (active)
                .jssorb21 .av:hover     (active mouseover)
                .jssorb21 .dn           (mousedown)
                */
                .jssorb21 div, .jssorb21 div:hover, .jssorb21 .av {
                    background: url(../img/b21.png) no-repeat;
                    overflow: hidden;
                    cursor: pointer;
                }

                .jssorb21 div {
                    background-position: -5px -5px;
                }

                    .jssorb21 div:hover, .jssorb21 .av:hover {
                        background-position: -35px -5px;
                    }

                .jssorb21 .av {
                    background-position: -65px -5px;
                }

                .jssorb21 .dn, .jssorb21 .dn:hover {
                    background-position: -95px -5px;
                }
    </style>	
		
		
	<style>
                /* jssor slider arrow navigator skin 21 css */

                /*
                .jssora21l              (normal)
                .jssora21r              (normal)
                .jssora21l:hover        (normal mouseover)
                .jssora21r:hover        (normal mouseover)
                .jssora21ldn            (mousedown)
                .jssora21rdn            (mousedown)
                */

                .jssora21l, .jssora21r, .jssora21ldn, .jssora21rdn {
                    position: absolute;
                    cursor: pointer;
                    display: block;
                    background: url(../img/a21.png) center center no-repeat;
                    overflow: hidden;
                }

                .jssora21l {
                    background-position: -3px -33px;
                }

                .jssora21r {
                    background-position: -63px -33px;
                }

                .jssora21l:hover {
                    background-position: -123px -33px;
                }

                .jssora21r:hover {
                    background-position: -183px -33px;
                }

                .jssora21ldn {
                    background-position: -243px -33px;
                }

                .jssora21rdn {
                    background-position: -303px -33px;
                }

    </style>
		
		
	<!-- All things JavaScript -->	
	
	
	<script>
	// creates headers and footers. 
		document.createElement('article');
		document.createElement('footer');
	</script>

	
	<script src="http://code.jquery.com/jquery-latest.js">
	// Latest JQUERY API
	</script>

	
	<script src="js/docs.min.js">
	// no clue what this does
	</script>
	

    <script src="js/ie10-viewport-bug-workaround.js">
	// IE10 viewport hack for Surface/desktop Windows 8 bug 
	</script>	
	
	
	<script src="js/jquery-1.9.1.min.js">
	// Jquery file for sliders
	</script>

	
    <script src="js/bootstrap.min.js">
	// J.S file for the camera slider
	</script>

    
    <script type="text/javascript" src="js/jssor.slider.mini.js">
	// J.S file for the camera slider
	</script>
    
	
	<script>
	// JQuery for making the sliders work
	
        jQuery(document).ready(function ($) {

            var options = {
                $FillMode: 2,                                       //[Optional] The way to fill image in slide, 0 stretch, 1 contain (keep aspect ratio and put all inside slide), 2 cover (keep aspect ratio and cover whole slide), 4 actual size, 5 contain for large image, actual size for small image, default value is 0
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideEasing: $JssorEasing$.$EaseOutQuint,          //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
                $SlideDuration: 800,                               //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
              
                $BulletNavigatorOptions: {                          //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                 //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 8,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 8,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1,                                //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                    $Scale: false,                                  //Scales bullets navigator or not while slider scale
                },

                $ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                }
            };

            $("#slider1_container").css("display", "block");
            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1920));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
			
        });
		
		</script>
		
		
			<script>
		//  sql data from harness

		(function($)
		{
			$(document).ready(function()
			{
				$.ajaxSetup(
				{
					cache: false,
					beforeSend: function() {
						$('#content').hide();
						$('#loading').show();
					},
					complete: function() {
						$('#loading').hide();
						$('#content').show();
					},
					success: function() {
						$('#loading').hide();
						$('#content').show();
					}
				});
				var $container = $("#content");
				$container.load("rss-feed-data.php");
				var refreshId = setInterval(function()
				{
					$container.load('rss-feed-data.php');
				}, 2000);
			});
		})(jQuery);
		
		</script>
		
			<script>
		//  sql data from harness

		(function($)
		{
			$(document).ready(function()
			{
				$.ajaxSetup(
				{
					cache: false,
					beforeSend: function() {
						$('#content1').hide();
						$('#loading1').show();
					},
					complete: function() {
						$('#loading1').hide();
						$('#content1').show();
					},
					success: function() {
						$('#loading1').hide();
						$('#content1').show();
					}
				});
				var $container = $("#content1");
				$container.load("rss-feed-data1.php");
				var refreshId = setInterval(function()
				{
					$container.load('rss-feed-data.php1');
				}, 2000);
			});
		})(jQuery);
		
		</script>
		
			
		 <link rel="stylesheet" href="http://www.amcharts.com/lib/style.css" type="text/css">
  <script src="http://www.amcharts.com/lib/3/amcharts.js" type="text/javascript"></script>
  <script src="http://www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>

		
		  <script>
AmCharts.loadJSON = function(url) {
  // create the request
  if (window.XMLHttpRequest) {
    // IE7+, Firefox, Chrome, Opera, Safari
    var request = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    var request = new ActiveXObject('Microsoft.XMLHTTP');
  }
	
  // load it
  // the last "false" parameter ensures that our code will wait before the
  // data is loaded
  request.open('GET', url, false);
  request.send();

  // parse adn return the output
  return eval(request.responseText);
};
  </script>
		
	
		
    </head>
    <body>
    
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
	<div id="monitor_page" data-role="content" >   
		<div class='inset'>
			<h1>Monitoring -  <?php echo $patient2;?> </h1>
			<h3>&nbsp;</h3>
		</div>
		
<!--<div class='message other'>-->
			
<div id="slider1_container" style="display: none; position: relative; margin: 0 auto; top: 0px; left: 0px; width: 500px; height: 250px; overflow: hidden;">
            
			
<div u="slides" style=" cursor: move; position: absolute; left: 0px; top: 0px; width: 500px; height: 250px; ">

<?php
if ($counter < 2) {
echo <<< EOF
<div style="text-align:center;">
   <img u="image" src= $players[0] />
  </div>
EOF;
}

else if ($counter < 3) {
echo <<< EOF
<div style="text-align:center;">
   <img u="image" src= $players[0] />
</div>
EOF;

echo <<< EOF
<div style="text-align:center;">
   <img u="image" src= $players[1] />
</div>
EOF;

}
?>

	
				</div>
		</div>
<!--</div>-->


	
			
	</div>
		
	
	<!-- Patient Status Content -->
        <div id="harness_page"  data-role="content">   
	        <div class='inset'>
	        	<h1>Patient Status -  <?php echo $patient2;?></h1>
				<h3>&nbsp;</h3>
	        </div>
			
			<ul data-nativedroid-plugin='cards'>
				<li data-cards-type='text'>
					<h1>Heart</h1>
					
						<div id="content"></div>	
						<div id="loading"> loading </div>
				</li>
				
				<li data-cards-type='text'>
					<h1>Breathing </h1>
							
						<div id="content1"></div>	
						<div id="loading1"> </div>

				</li>
							
				<!--<li data-cards-type='text'>
					<h1>Statistics</h1>
					 <div id="chartdiv" style="width: auto; height: 200px;"></div>
					
				</li>
				
					<li data-cards-type='text'>
					<h1>Statistics2</h1>
					 <div id="chartdiv" style="width: 400px; height: 200px;"></div>
					
				</li>-->

			</ul>		
			
		</div>
		
		<div data-role="content" id="report_page">


	<!-- Patient Report Content -->
	
	      <div class='inset'>
		  
		  <?php
		  
				date_default_timezone_set("America/New_York");
				$noteDate = date("Y-m-d");				
		  
		  ?>
		  
	        	<h1>Patient Report -  <?php echo $patient2;?></h1>
	        
			
			<h3>&nbsp;</h3>
		
			
			
          <ul data-role="listview" data-inset="false" data-icon="false" data-divider-theme="b">
		
				<!--
		        <form method="post" action="<?php $_PHP_SELF ?>" data-ajax="false" > 
					 
							<tr>  
								<td><input style="font-size: 20px; padding: 10px;" name="note" type="text" id="note" placeholder="Add Report"  ></td>
							</tr>
							
							<input name="add" type="submit" id="add" value="Update" data-rel="back" data-role="button" data-inline="false">
				</form>
				-->
				<h2 align="center" >Report</h2>
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

						$sql = "SELECT id, username, note, timestamp FROM notes WHERE patient = '$patient2' ORDER BY id DESC;";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
							
							echo '
					<li><a >
					<h3>' . $row["username"].'</h3>
					<h3>'. $row["note"]. '</h3>
					<p class="ui-li-aside"><strong>'. $row["timestamp"].'</strong></p>
					</a></li> ';
					
					
					//	echo nl2br (" Name: - " . $row["username"]. " \n   Notes: - " . $row["note"]. "   time: " . $row["timestamp"]."\n"  );
							}
						} else {
							echo "0 results";
						}
						$conn->close(); 
						?> 
						
				
      
            
           
		   
						</ul>
			
	
				</div>
		</div>
	<script>	
	function myTest() {
    location.reload();
	}
	</script>
	
		
		
		<div data-role="content" id="recorder_page" >


				<div class='inset'>
				

						<p style="text-align:center;">
							<video id="preview" controls> </video>
						</p>
					
					

							<button id="record"  >Record</button>
							<button id="stop"  disabled>Stop</button>
							<button id="delete"  disabled>Delete your recording files from Server</button>

							<div id="container" ></div>
					
					<form method="post" action="<?php $_PHP_SELF ?>" data-ajax="false" > 

<!--
Hour:
<input style="font-size:19px;" name="hr" type="text" id="hr">

Min:
<input style="font-size:19px;" name="mn" type="text" id="mn">

Sec:
<input style="font-size:19px;" name="sec" type="text" id="sec">
-->

<ul data-role="listview" data-inset="false">

                    <li data-role="fieldcontain">
                        <input style="font-size:19px;" type="text" name="hr" id="hr" value="" data-clear-btn="true" placeholder="Hours">
						
                        <input style="font-size:19px;" type="text" name="mn" id="mn" value="" data-clear-btn="true" placeholder="Minutes">
						
                        <input style="font-size:19px;" type="text" name="sec" id="sec" value="" data-clear-btn="true" placeholder="Seconds">
						
                    </li>	
</ul>

<input name="add" type="submit" id="add" value="Set Reminder"  >
		 

</form>
				
			
				 </div>
		</div>
		
		
	<!-- Footer Buttons -->
		<div data-position="fixed" data-tap-toggle="false" data-role="footer" data-tap-toggle="false" data-theme='b'>
			<div data-role="navbar">
				<ul>
					<li><a href="#"><i class='blIcon fa fa-users' id="hide" ></i></a></li>
					<li><a href="#"><i class='blIcon fa fa-bar-chart-o' id="show" ></i></a></li>
					<li><a href="#"><i class='blIcon fa fa-file-o' id="notebutton" ></i></a></li>
					<li><a href="#"><i class='blIcon fa fa-microphone' id="recorderbutton" ></i></a></li>
				</ul>
			</div>
		</div>

    </div>
	
	
	
		
		<script>
var chart;

// create chart
AmCharts.ready(function() {

  // load the data
  var chartData = AmCharts.loadJSON('data.php');

  // SERIAL CHART
  chart = new AmCharts.AmSerialChart();
  chart.pathToImages = "http://www.amcharts.com/lib/images/";
  chart.dataProvider = chartData;
  chart.categoryField = "category";
//  chart.dataDateFormat = "YYYY-MM-DD JJ:NN:SS";

  // GRAPHS

  var graph1 = new AmCharts.AmGraph();
  graph1.valueField = "value1";
  graph1.bullet = "round";
  graph1.bulletBorderColor = "#FFFFFF";
  graph1.bulletBorderThickness = 2;
  graph1.lineThickness = 2;
  graph1.lineAlpha = 0.5;
  chart.addGraph(graph1);
	
  var graph2 = new AmCharts.AmGraph();
  graph2.valueField = "value2";
  graph2.bullet = "round";
  graph2.bulletBorderColor = "#FFFFFF";
  graph2.bulletBorderThickness = 2;
  graph2.lineThickness = 2;
  graph2.lineAlpha = 0.5;
  chart.addGraph(graph2);
	
  // CATEGORY AXIS
 // chart.categoryAxis.parseDates = true;
	
  // WRITE
  chart.write("chartdiv");
});

  </script>
	
		<script src="https://cdn.webrtc-experiment.com/RecordRTC.js"> 
		// Script for the recorder
		</script> 
	
	
	    <script>
		// JQuery for Audio recording interface
		
        function PostBlob(blob, fileType, fileName) {
            // FormData
            var formData = new FormData();
            formData.append(fileType + '-filename', fileName);
            formData.append(fileType + '-blob', blob);

            // progress-bar
            var hr = document.createElement('hr');
            container.appendChild(hr);
            var strong = document.createElement('strong');
            strong.id = 'percentage';
            strong.innerHTML = fileType + ' upload progress: ';
            container.appendChild(strong);
            var progress = document.createElement('progress');
            container.appendChild(progress);

            // POST the Blob using XHR2
            xhr('save.php', formData, progress, percentage, function(fileURL) {
                container.appendChild(document.createElement('hr'));
                var mediaElement = document.createElement(fileType);

                var source = document.createElement('source');
                var href = location.href.substr(0, location.href.lastIndexOf('/') + 1);
                source.src = href + fileURL;

                if (fileType == 'video') source.type = 'video/webm; codecs="vp8, vorbis"';
                if (fileType == 'audio') source.type = !!navigator.mozGetUserMedia ? 'audio/ogg' : 'audio/wav';

                mediaElement.appendChild(source);

                mediaElement.controls = true;
                container.appendChild(mediaElement);
                mediaElement.play();

                progress.parentNode.removeChild(progress);
                strong.parentNode.removeChild(strong);
                hr.parentNode.removeChild(hr);
            });
        }

        var record = document.getElementById('record');
        var stop = document.getElementById('stop');
        var deleteFiles = document.getElementById('delete');

        var audio = document.querySelector('audio');

        var recordVideo = document.getElementById('record-video');
        var preview = document.getElementById('preview');

        var container = document.getElementById('container');

        var isFirefox = !!navigator.mozGetUserMedia;

        var recordAudio;
        record.onclick = function() {
            record.disabled = true;
            navigator.getUserMedia({
                audio: true,
               
            }, function(stream) {
                preview.src = window.URL.createObjectURL(stream);
                preview.play();
				preview.muted = true;
				

                // var legalBufferValues = [256, 512, 1024, 2048, 4096, 8192, 16384];
                // sample-rates in at least the range 22050 to 96000.
                recordAudio = RecordRTC(stream, {
                    //bufferSize: 16384,
                    //sampleRate: 45000,
                    onAudioProcessStarted: function() {
                        if (!isFirefox) {
                            recordVideo.startRecording();
                        }
                    }
                });

                if (isFirefox) {
                    recordAudio.startRecording();
                }

                if (!isFirefox) {
                 
                    recordAudio.startRecording();
                }

                stop.disabled = false;
            }, function(error) {
                alert(JSON.stringify(error, null, '\t'));
            });
        };

        var fileName;
        stop.onclick = function() {
            record.disabled = false;
            stop.disabled = true;

            preview.src = '';

            fileName = "<?php echo $patient2;?>";
			

			

            if (!isFirefox) {
                recordAudio.stopRecording(function() {
                    PostBlob(recordAudio.getBlob(), 'audio', fileName + '.wav');
                });
            } 

            deleteFiles.disabled = false;
        };

        deleteFiles.onclick = function() {
            deleteAudioVideoFiles();
        };

        function deleteAudioVideoFiles() {
            deleteFiles.disabled = true;
            if (!fileName) return;
            var formData = new FormData();
            formData.append('delete-file', fileName);
            xhr('delete.php', formData, null, null, function(response) {
                console.log(response);
            });
            fileName = null;
            container.innerHTML = '';
        }

        function xhr(url, data, progress, percentage, callback) {
            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    callback(request.responseText);
                }
            };

            if (url.indexOf('delete.php') == -1) {
                request.upload.onloadstart = function() {
                    percentage.innerHTML = 'Upload started...';
                };

                request.upload.onprogress = function(event) {
                    progress.max = event.total;
                    progress.value = event.loaded;
                    percentage.innerHTML = 'Upload Progress ' + Math.round(event.loaded / event.total * 100) + "%";
                };

                request.upload.onload = function() {
                    percentage.innerHTML = 'Saved!';
                };
            }

            request.open('POST', url);
            request.send(data);
        }

        window.onbeforeunload = function() {
            if (!!fileName) {
                deleteAudioVideoFiles();
                return 'It seems that you\'ve not deleted audio/video files from the server.';
            }
        };

        </script>	
    
    </body>
</html>