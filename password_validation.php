<?php 
session_start();

$user_info=array();
$error= array();
if (isset($_SESSION['user'])) {
  $user_password =$_SESSION['user']['password'];
  $user_name =$_SESSION['user']['username'];

  if (isset($_POST['changepassword_submit'])) {

    if (isset($_POST['old_password'])) {

      $old_password = $_POST['old_password'] ;
      if ($old_password!=$user_password) {
        $error[]="Password doesn't match.";
        $_SESSION['error'] =  "Password doesn't match.";
      }
    }
    else {
      $error[]="Password can't be empty.";
      $_SESSION['error'] =  "Password can't be empty.";
    }

    if (isset($_POST['new_password'])) {

      $new_password = $_POST['new_password'] ;

    }
    else {
      $error[]="Password can't be empty.";
      $_SESSION['error'] =  "Password can't be empty.";

    }

    if (isset($_POST['cPassword'])) {

      $cPassword = $_POST['cPassword'] ;
      if ($cPassword!=$_POST['new_password']) {
        $error[]="Password doesn't match.";
        $_SESSION['error'] =  "Password doesn't match.";

      }
    }
    else {
      $error[]="Password can't be empty.";
      $_SESSION['error'] =  "Password can't be empty.";

    }


    if (empty($error)  ){


      $user_info = array(
        "gender" =>$_SESSION['user']['gender'],
        "first_name" =>$_SESSION['user']['first_name'],
        "last_name" =>$_SESSION['user']['last_name'],
        "username" =>$_SESSION['user']['username'],
        "password"  => $new_password,
        "age"       =>$_SESSION['user']['age'],
        "avatar"       =>$_SESSION['user']['avatar']
      );

      $users[$user_name]  =  $user_info ;
      $_SESSION['users'] =$users;
      $_SESSION['user'] =$user_info;
      $_SESSION['login']="Your password has been changed.";

    }

    else{   
      $error[]="Password doesn't match.";
      $_SESSION['error'] =  "Password doesn't match.";


    }


  }



}
else{    $error[]="Password doesn't match.";
$_SESSION['error'] =  "Password doesn't match.";

}


?>

<?php if(isset($_SESSION['login'] )) { 
$show_up = $_SESSION['login'];?>

        <script>
        alert ("<?php echo  ($_SESSION['login'] )?>");
      </script>  
      <?php unset($_SESSION['login']) ;}


    if(isset($_SESSION['error'] )) { ?>
        <script>
        alert ("<?php echo  ($_SESSION['error'] )?>");
      </script>  
      <?php unset($_SESSION['error']) ;} ?>

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