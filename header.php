<?php 
session_start();
date_default_timezone_set('America/Montreal');

$x_fname="";
$x_lname="";
$x_age="";
$x_gender=false;
$x_user="";

if (isset($_SESSION['user'])) {

  $x_gender = $_SESSION['user']['gender'];
  $x_fname = $_SESSION['user']['first_name'];

  $x_lname = $_SESSION['user']['last_name'];
  $x_user = $_SESSION['user']['username'];

  $x_age = $_SESSION['user']['age'];
  $x_avatar = $_SESSION['user']['avatar'];

}
function blogCount_individual ($u_name){
  $count=0;
  if (isset($_COOKIE['blogs'])){
   $array_post = unserialize($_COOKIE['blogs']);

   foreach ($array_post as $key => $value) {
    if($u_name==$value[0]){
     $count++;

    }
  }
}

  return  $count;
}

if(isset($_SESSION['login'] )) { ?>

  <script>
    alert ("<?php echo($_SESSION['login'] )?>");
  </script>  
      <?php unset($_SESSION['login']) ;}


    if(isset($_SESSION['error'] )) { ?>
        <script>
        alert ("<?php echo  ($_SESSION['error'] )?>");
      </script>  
      <?php unset($_SESSION['error']) ;} ?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Project Blog</title>
    <meta name="keywords" content="power blog" />
    <meta name="description" content="Power Blog" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Press+Start+2P' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/colorbox.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="css/jquery.colorbox.js"></script>
    <link rel="stylesheet" href="css/form.css">

        <script>
            $(document).ready(function(){
                $(".iframe").colorbox({iframe:true, width:"85%", height:"85%"});

            });
            
            $(function(){

                $("#login_form").submit(function(a){
                    var validated = true,
                    username = $("input[name='username']"),
                    password = $("input[name='password']");


                    if($('#username').val().length < 5){
                        validated = false;
                        username.css("border-color", "red");
                        username.parent().append("<span class='error'>Your username cannot be less than 5 characters</span>");
                        $(".error").fadeIn(500);
                    }else{
                        username.css("border-color", "green");
                        username.parent().find(".error").remove();
                    }
                    if($('#password').val().length < 6){
                        validated = false;
                        password.css("border-color", "red");
                        password.parent().append("<span class='error'>Your password cannot be less than 6 characters</span>");
                        $(".error").fadeIn(500);
                    }else{
                        password.css("border-color", "green");
                        password.parent().find(".error").remove();
                    }
                    if(validated){
                        alert ("Logging you in...");
                        return true;
                    }  
                    alert ("Missing a few fields...");
                    return false;

                });
            });

        </script>

</head>
<body>

