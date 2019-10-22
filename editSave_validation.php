<?php 
session_start();

$user_info=array();
$error= array();
if (isset($_SESSION['user'])) {
  $user_name =$_SESSION['user']['username'];
  $user_password =$_SESSION['user']['password'];

  if (isset($_POST['update_profile'])) {

    if (isset($_POST['gender'])) {

      $gender = $_POST['gender'] ;
    }
    else {
      $error[]="Please select gender.";
      $_SESSION['error'] =  "Please select gender.";
      header("Location: profile.php");
    }

    if (isset($_POST['lastname'])) {

      $lastname = $_POST['lastname'] ;
      if ( strlen($lastname)<3) {
        $error[]="Last name can't be less than 3 chars.";
        $_SESSION['error'] =  "Last name can't be less than 3 chars.";
        header("Location: profile.php");
      }
    }
    else {
      $error[]="Last name can't be empty.";
      $_SESSION['error'] =  "Last name can't be empty.";
      header("Location: profile.php");
    }

    if (isset($_POST['firstname'])) {

      $firstname = $_POST['firstname'] ;
      if ( strlen($firstname)<3) {
        $error[]="First name can't be less than 3 char.";
        $_SESSION['error'] =  "First name can't be less than 3 chars.";
        header("Location: profile.php");
      }
    }
    else {
      $error[]="First name can't be empty.";
      $_SESSION['error'] =  "First name can't be empty.";
      header("Location: profile.php");
    }


    if (isset($_POST['age'])) {

      $age = $_POST['age'] ;
      if ( $age<18 || $age>150) {
        $error[]="Age can't be less than 18 years or greater than 150.";
        $_SESSION['error'] =  "Age can't be less than 18 years or greater than 150.";
        header("Location: profile.php");
      }
    }
    else {
      $error[]="Age can't be empty.";
      $_SESSION['error'] =  "Age can't be empty.";
      header("Location: profile.php");
    }



    if(isset($_FILES['avatar'])){
     $path = "uploads/";
     $filename = $_FILES['avatar']['tmp_name'];
     $file_size = $_FILES['avatar']['size'];
     $file_type = $_FILES['avatar']['type'];
     $name = $_FILES['avatar']['name'];

     $extArray = explode(".", $name);
     $ext = $extArray[COUNT($extArray) - 1];
     $error = array();
     $allowed_extensions = ["jpg", "jpeg", "png", "gif", "svg"];
     $ext = strtolower($ext);

     $destination = $path . $extArray[0] ."_" . time() . "." . $ext;

        //check for server error
     if($_FILES['avatar']['error'] != 0){

      $error[] = "Server Error!"; 
      $_SESSION['error'] =  "Please upload your picture.";
      header("Location: profile.php");
    }

        //check for the size
        if($file_size > 2097152){ //exactly 2MB
          $error[] = "The size is too big";
          $_SESSION['error'] =  "The size is too big.";
          header("Location: profile.php");   
        }

        //check for the type
        if(!in_array($ext, $allowed_extensions)){
          $error[] = "Only image can be uploaded!";
          $_SESSION['error'] =  "Only image can be uploaded.";
          header("Location: profile.php");
        }
      }
      


      if (empty($error)  ){
        $moved = move_uploaded_file($filename, $destination);
        

        if ($moved){         

          $user_info = array(
            "gender" =>$_POST['gender'],
            "first_name" =>$_POST['firstname'],
            "last_name" =>$_POST['lastname'],
            "username" =>$user_name,
            "password"  => $user_password,
            "age"       =>$_POST['age'],
            "avatar"       =>$destination
          );

          $users[$user_name]  =  $user_info ;
          $_SESSION['users'] =$users;
          $_SESSION['user'] =$user_info;

          $_SESSION['login']="Your information have been changed.";
          header("Location: profile.php");

        }
        else{
          $error[] = "Please upload your picture.";
          $_SESSION['error'] =  "Please upload your picture.";
          header("Location: profile.php");
        }
      }

     /* else{   
        $error[] = "  Please fill up all the information .";
        $_SESSION['error'] =  "Please fill up all the information .";
        header("Location: profile.php");

      }*/


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