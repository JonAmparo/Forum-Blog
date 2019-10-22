<?php 
date_default_timezone_set('America/Montreal');

session_start();


$blog_post =array();;
$error= array();
if (isset($_SESSION['user'])) {
 $user_name =$_SESSION['user']['username'];
 $Author_name =$_SESSION['user']['first_name']. " ".$_SESSION['user']['last_name'] ;
 $user_avater =$_SESSION['user']['avatar'];

 if (isset($_POST['Submit_post'])) {

  if (isset($_POST['title'])) {

    $title = $_POST['title'] ;

  }
  else {
    $error[]="Title can't be empty.";
    $_SESSION['error'] =  "Title can't be empty.";
    header("Location: blog_post.php");
  }

  if (isset($_POST['comment'])) {

    $comment = $_POST['comment'] ;
    
  }
  else {
    $error[]="Comments can't be empty.";
    $_SESSION['error'] =  "Comments can't be empty.";
    header("Location: blog_post.php");
  }
  

  if (empty($error)  ){

    $temp_post=array($user_name, $Author_name, $_POST['title'], $_POST['comment'], date("Y-m-d H:i:s"), $user_avater );

    if ( isset($_COOKIE['blogs'])){
     $blog_post = unserialize($_COOKIE['blogs']);
 
     
     
   } 
   $blog_post[]=$temp_post;

   setcookie('blogs', serialize($blog_post), time()+60*60*24); 

   $_SESSION['login']=" Your comments have been posted.";
   header("Location: blog_post.php");
   

 }

 else{   
   $error[]="Comments could not be posted.";
   $_SESSION['error'] =  "Comments could not be posted.";
   header("Location: blog_post.php");

 }


}



}
else{   
 echo '<script language="javascript">';
 echo 'alert("User does not exist.")';
 echo '</script>';

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