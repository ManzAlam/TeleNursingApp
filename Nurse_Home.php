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

	   $note = addslashes ($_POST['note']);
	}
	else
	{

	   $note = $_POST['note'];

	}

	$sql = "INSERT INTO notes ".
		   "(username, patient, note) ".
		   "VALUES('$user2','$patient2','$note')";
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
// echo $counter;
// echo $players;
// echo "Cam1 " . $players[0] . ", Cam2 " . $players[1];



?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap Carousel Component Slider/Slideshow/Gallery/Banner</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>

    <!-- NAVBAR
    ================================================== -->
    <style>
	
		body, .login-submit, .login-submit:before, .login-submit:after {
  background: #373737 url("../img/bg.png") 0 0 repeat;
}

body {
  font: 14px/20px 'Helvetica Neue', Helvetica, Arial, sans-serif;
  color: #F5F5F0;
}
	
        /* use navbar-wrapper to wrap navigation bar, the purpose is to overlay navigation bar above slider */
        .navbar-wrapper {
            position: absolute;
            top: 20px;
            left: 0;
            width: 100%;
            height: 51px;
        }
        .navbar-wrapper > .container {
            padding: 0;
        }

        @media all and (max-width: 768px ){
            .navbar-wrapper {
                position: relative;
                top: 0px;
            }
        }
    </style>
    <div class="navbar-wrapper">
        <div class="container">

            <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0px;">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" >Nurse User interface </a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                  
                            <li><a>USER: <?php echo $user2;?></a></li>
							<li><a>Patient: <?php echo $patient2;?></a></li>
							<li><a>Number of Cameras: <?php echo $counter;?></a></li>
                            <li><a href="logout2.php"> - Logout</a></li>
							
							
							
                        </ul>
                    </div>
                </div>
            </nav>

        </div>
    </div>

    <div style="min-height: 50px;">
        <!-- Jssor Slider Begin -->
        <!-- You can move inline styles to css file or css block. -->
        <!-- ================================================== -->
        <div id="slider1_container" style="display: none; position: relative; margin: 0 auto;
        top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
            <!-- Loading Screen -->
            <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
                top: 0px; left: 0px; width: 100%; height: 100%;">
                </div>
                <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                top: 0px; left: 0px; width: 100%; height: 100%;">
                </div>
            </div>
            <!-- Slides Container -->
            <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1300px; height: 500px; overflow: hidden;">
               
             
	
				
			<?php
if ($counter < 2) {
echo <<< EOF

   <img u="image" src= $players[0] />

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

            <!-- Bullet Navigator Skin Begin -->
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
            <!-- bullet navigator container -->
            <div u="navigator" class="jssorb21" style="position: absolute; bottom: 26px; left: 6px;">
                <!-- bullet navigator item prototype -->
                <div u="prototype" style="POSITION: absolute; WIDTH: 19px; HEIGHT: 19px; text-align:center; line-height:19px; color:White; font-size:12px;"></div>
            </div>
            <!-- Bullet Navigator Skin End -->
            <!-- Arrow Navigator Skin Begin -->
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
            <!-- Arrow Left -->
            <span u="arrowleft" class="jssora21l" style="width: 55px; height: 55px; top: 123px; left: 8px;">
            </span>
            <!-- Arrow Right -->
            <span u="arrowright" class="jssora21r" style="width: 55px; height: 55px; top: 123px; right: 8px">
            </span>
            <!-- Arrow Navigator Skin End -->
            <a style="display: none" href="http://www.jssor.com">bootstrap slider</a>
        </div>
        <!-- Jssor Slider End -->
    </div>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">


        <div class="row featurette">
            <div class="col-md-5">
                
			<h1>Doctor User Interface</h1> 

	<h3> Nurse Name: <?php echo $user2;?>  </h3> 
	<h3> Patient Name: <?php echo $patient2;?>  </h3> 

		<form method="post" action="<?php $_PHP_SELF ?>"> 
					 

						<tr>
						<td width="100">note</td>
						<td><input name="note" type="text" id="note"  style="font-face: 'Comic Sans MS'; font-size: larger; color: Black; background-color: #FFFFC0;"  ></td>
						</tr>

					 
					  <input name="add" type="submit" id="add" value="Add Note" style="font-face: 'Comic Sans MS'; font-size: larger; color: Black; background-color: #FFFFC0;" >			 
		</form>
		

            </div>
            <div class="col-md-7">
                <h2 class="featurette-heading">Patient LOG</h2>
                <div class="lead" style="background-color:#373737; border: 1px dashed #000; white-space: nowrap;">
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

			$sql = "SELECT id, username, note FROM notes WHERE patient = '$patient2'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
				echo " - Name: - " . $row["username"]. "    Notes: - " . $row["note"]. "<br>";
				}
			} else {
				echo "0 results";
			}
			$conn->close(); 
	?> 
                </div>
				
		
			
				
            </div>
        </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ie10-viewport-bug-workaround.js"></script>

    <!-- jssor slider scripts-->
    <!-- use jssor.js + jssor.slider.js instead for development -->
    <!-- jssor.slider.mini.js = (jssor.js + jssor.slider.js) -->
    <script type="text/javascript" src="../js/jssor.slider.mini.js"></script>
    <script>
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

            //Make the element 'slider1_container' visible before initialize jssor slider.
            $("#slider1_container").css("display", "block");
            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
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
            //responsive code end
        });
    </script>
</body>
</html>