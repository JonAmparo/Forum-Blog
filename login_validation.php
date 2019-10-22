<?php 
session_start();

$_SESSION['error_login'] =  "";

$user_info=array();
$error= array();
if (isset($_POST['login1'])) {



  if (isset($_POST['username'])) {

    $username = $_POST['username'] ;
    if ( strlen($username)<5) {
      $error[]="Username can't be less than 5 chars.";
      $_SESSION['error'] =  "Username can't be less than 5 chars.";
      header("Location: index.php");  
    }
  }
  else {
    $error[]="Username can't be empty.";
    $_SESSION['error'] =  "Username can't be empty.";
    header("Location: index.php");
  }

  if (isset($_POST['password'])) {

    $password = $_POST['password'] ;
    if ( strlen($password)<6) {
      $error[]="Password can't be less than 6 chars.";
      $_SESSION['error'] =  "Password can't be less than 6 chars.";
      header("Location: index.php");
    }
  }
  else {
    $error[]="Password can't be empty.";
    $_SESSION['error'] =  "Password can't be empty.";
    header("Location: index.php");
  }





  if (empty($error)  ){



    if(!isset($_SESSION['users'])){
     $_SESSION['error_login'] ="User doesn't exist.";

     $error[]="Username/ Password is invalid.";
     $_SESSION['error'] =  "Username/ Password is invalid.";
     header("Location: index.php");

   }else{
    $users =  $_SESSION['users'];
    if(array_key_exists($_POST['username'], $users)){
      if($users[$_POST['username']]['password'] == $_POST['password']){

        $_SESSION['user'] = $users[$_POST['username']];
        $_SESSION['user']['username'] = $_POST['username'];
        $_SESSION['login']="We are logging you in.";

        header("Location: index.php");

      }else{
       $_SESSION['error_login'] = "invalid user/password";

       $error[]="Username/ Password is invalid.";
       $_SESSION['error'] =  "Username/ Password is invalid.";
       header("Location: index.php");
     }
   }else{
     $_SESSION['error_login'] = "invalid user/password";
     
     $error[]="Username/ Password is invalid.";
     $_SESSION['error'] =  "Username/ Password is invalid.";
     header("Location: index.php");
   }
 }

 
}

else{   
  $_SESSION['error_login'] = $error; 
  
  $error[]="Username/ Password is invalid.";
  $_SESSION['error'] =  "Username/ Password is invalid.";
  header("Location: index.php");


}


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration validation</title>
	<link rel="stylesheet" href="css/form_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>


</body>
</html>