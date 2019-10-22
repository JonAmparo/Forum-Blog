<?php 
session_start();
$user_info=array();
$error= array();
if (isset($_POST['register_submit'])) {

  if (isset($_POST['gender'])) {

    $gender = $_POST['gender'] ;
  }
  else {
    $error[]="Please select gender.";
    $_SESSION['error'] =  "Please select gender.";
    header("Location: registration_form.php");
  }

  if (isset($_POST['lastname'])) {

    $lastname = $_POST['lastname'] ;
    if ( strlen($lastname)<3) {
      $error[]="Last name can't be less than 3 char.";
    }
  }
  else {
    $error[]="Last name can't be empty.";
    $_SESSION['error'] =  "Last name can't be empty.";
    header("Location: registration_form.php");
  }

  if (isset($_POST['firstname'])) {

    $firstname = $_POST['firstname'] ;
    if ( strlen($firstname)<3) {
      $error[]="First name can't be less than 3 char.";
    }
  }
  else {
    $error[]="First name can't be empty.";
    $_SESSION['error'] =  "First name can't be empty.";
    header("Location: registration_form.php");
  }


  if (isset($_POST['age'])) {

    $age = $_POST['age'] ;
    if ( $age<18 ||  $age>150) {
      $error[]="Age can't be less than 18 years or greater than 150.";
      $_SESSION['error'] =  "Age can't be less than 18 years or greater than 150.";
      header("Location: registration_form.php");
    }
  }
  else {
    $error[]="Age can't be empty.";
    $_SESSION['error'] =  "Age can't be empty.";
    header("Location: registration_form.php");
  }

  if (isset($_POST['username'])) {

    $username = $_POST['username'] ;
    if ( strlen($username)<5) {
      $error[]="Username can't be less than 5 chars.";
      $_SESSION['error'] =  "Username can't be less than 5 chars.";
      header("Location: registration_form.php");
    }
  }
  else {
    $error[]="Username can't be empty.";
    $_SESSION['error'] =  "Username can't be empty.";
    header("Location: registration_form.php");
  }

  if (isset($_POST['password'])) {

    $password = $_POST['password'] ;
    if ( strlen($password)<6) {
      $error[]="Password can't be less than 6 chars.";
      $_SESSION['error'] =  "Password can't be less than 6 chars.";
      header("Location: registration_form.php");
    }
  }
  else {
    $error[]="Password can't be empty.";
    $_SESSION['error'] =  "Password can't be empty.";
    header("Location: registration_form.php");
  }

  if (isset($_POST['cPassword'])) {

    $cPassword = $_POST['cPassword'] ;
    if (  $cPassword != $_POST['password']) {
      $error[]="Password and confirm password doesn't match.";
      $_SESSION['error'] =  "Password and confirm password doesn't match.";
      header("Location: registration_form.php");
    }
  }
  else {
    $error[]="Confirm Password can't be empty.";
    $_SESSION['error'] =  "Confirm Password can't be empty.";
    header("Location: registration_form.php");
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

      
    if($_FILES['avatar']['error'] != 0){
      $error[] = "Server Error!";
      $error[] = "Please upload your picture.";

              $_SESSION['error'] =  "Please upload your picture.";
               header("Location: registration_form.php");

            }

            if($file_size > 2097152){  
              $error[] = "The size is too big.";
              $_SESSION['error'] =  "The size is too big.";
              header("Location: registration_form.php");        }

              if(!in_array($ext, $allowed_extensions)){
               $error[] = "Only image can be uploaded.";
               $_SESSION['error'] =  "Only image can be uploaded.";
               header("Location: registration_form.php");
             }
           }


           if (empty($error)  ){

            $moved = move_uploaded_file($filename, $destination);

            if ($moved){
              $user_info = array(
                "gender" =>$_POST['gender'],
                "first_name" =>$_POST['firstname'],
                "last_name" =>$_POST['lastname'],
                "username" =>$_POST['username'],
                "password"  => $_POST['password'],
                "age"       =>$_POST['age'],
                "avatar"       =>$destination
              );


              if(!isset($_SESSION['users'])){
                $users[$username]  =  $user_info ;
                $_SESSION['users'] =$users;
                $_SESSION['login']="You are registered.";
                header("Location: index.php");
               }else{
                $users =  $_SESSION['users'];
                if(!array_key_exists($_POST['username'], $users)){
                  $users[$username]  =  $user_info ;
                  $_SESSION['users'] =$users;
                  $_SESSION['login']="You are registered.";
                  header("Location: index.php");
                }
                else{

                  $error[] = "Username exists. Please try a new one.";
                  $_SESSION['error'] =  "Username exists. Please try a new one.";
                  header("Location: registration_form.php");
                }
              }
               

            }
            else{

             $error[] = "Please upload your picture.";
             $_SESSION['error'] =  "Please upload your picture.";
             header("Location: registration_form.php");
           }
         }

         else{   
           $error[] = "Error! Please try again.";
           $_SESSION['error'] =  "Error! Please try again.";
           header("Location: registration_form.php");


         }


       }

       ?>

       <!DOCTYPE html>
       <html lang="en">
       <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Registration validation</title>
         <link rel="stylesheet" href="css/form.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       </head>
       <body>


       </body>
       </html>