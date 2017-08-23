<?php 
    session_start();
    $role1 = $_SESSION['sess_userrole'];
	$user1 = $_SESSION['sess_username'];
	
    
?>



<?php 

  if( $role1 == "admin"){
		header('Location: Admin_Home.php');
  }
	  else if( $role1 == "doctor"){
		header('Location: Doc_Home.php');
	  }
	  else if( $role1 == "nurse"){
		header('Location: Doc_Home.php');
	  }
	  else if( $role1 == "user"){
		header('Location: User_Home.php');
	  }
	   else if( $role1 == "patientadmin"){
		header('Location: Patientadmin_Home.php');
	  }
	  
	  else{
		header('Location: index.php');
	  }

 
 $patient = "";
 

 if (isset($_POST['patient'])) {
		$patient = $_POST['patient'];
	}
 
 $_SESSION['sess_patient'] = $patient;

 
?>