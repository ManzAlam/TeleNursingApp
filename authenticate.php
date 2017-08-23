
<?php 
 require 'database-config.php';

 session_start();

 $username = "";
 $password = "";
 
 if(isset($_POST['username'])){
  $username = $_POST['username'];
 } 
 if (isset($_POST['password'])) {
  $password = $_POST['password'];
 }
 

 $q = 'SELECT * FROM users WHERE username=:username AND password=:password';

 $query = $dbh->prepare($q);

 $query->execute(array(':username' => $username, ':password' => $password));


 if($query->rowCount() == 0){


header('Location: index_response.html');

 
 }else{

  $row = $query->fetch(PDO::FETCH_ASSOC);

  session_regenerate_id();
  $_SESSION['sess_user_id'] = $row['id'];
  $_SESSION['sess_username'] = $row['username'];
        $_SESSION['sess_userrole'] = $row['role'];

        echo $_SESSION['sess_userrole'];
  session_write_close();

  if( $_SESSION['sess_userrole'] == "admin"){
   header('Location: Admin_Home.php');
  }
  else if( $_SESSION['sess_userrole'] == "doctor"){
   header('Location: patients.php');
  }
  else if( $_SESSION['sess_userrole'] == "nurse"){
   header('Location: patients.php');
  }
    else if( $_SESSION['sess_userrole'] == "user"){
   header('Location: patients.php');
  }
   else if( $_SESSION['sess_userrole'] == "patientadmin"){
   header('Location: patients.php');
  }
  
  
  else{
   header('Location: userhome.php');
  }
  
  
 }

?>