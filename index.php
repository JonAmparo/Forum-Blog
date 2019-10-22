<?php 
include('header.php');

if (isset($_POST['logout'])) {
 unset($_SESSION['user']);
}

$array_post=array();
if (isset($_SESSION['user'])) {

    if ( isset($_COOKIE['blogs'])){
       $array_post =unserialize($_COOKIE['blogs']);
foreach ($array_post as $key => $row)
{
    $vc_array_name[$key] = $row[4];
}
array_multisort($vc_array_name, SORT_DESC, $array_post);


         }
}

function blogCount ($u_name, $total_post){
    $count=0;
 
    foreach ($total_post as $key => $value) {
        if($u_name==$value[0]){
           $count++;

       }
   }
   return  $count;
}

$show_up="";
if(isset($_SESSION['login'] )) { ?>

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
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Project Blog</title>
    <meta name="keywords" content="power blog" />
    <meta name="description" content="Power Blog" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Press+Start+2P' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/colorbox.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="css/jquery.colorbox.js"></script>
        <script>

            $(document).ready(function(){
                $(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
            });

            
            $(function(){

                $("#login_form").submit(function(e){
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
                        alert ("Signing you in...");
                        return true;
                    }  
                    alert ("Missing/ incomplete field(s).");
                    return false;

                });
            });



        </script>




    </head>
    <body>

        <div id="wrapper">

        <div id="menu">
            <ul>
                <li><a href="index.php" class="current">Home</a></li>
                <li><a href="blog_post.php"  >Post</a></li>
                <li><a href="profile.php"  >Profile</a></li>
                <li><a href="users.php" >Users</a></li>

            </ul>       
        </div> <!-- end of menu -->

        <div id="header">
            <div id="site_title">
                <a href="#" target="_blank"><span class="logo">POWER <br/> BLOG</span></a>
            </div> <!-- end of site_title -->

            <div id="header_right">
               <h1>Lorem ipsum dolor sit amet</h1>
               <p>Etiam sit amet turpis. Duis nulla diam, posuere ac, varius id, ullamcorper sit amet, libero. Nam sodales, pede vel dapibus lobortis, ipsum diam molestie risus, a vulputate risus nisl pulvinar lacus.</p>
           </div>

           <div class="cleaner"></div>
       </div> <!-- end of header -->

       <div id="content_wrapper_top"></div>
       <div id="content_wrapper">

        <div id="sidebar">           
            <div id="login">
                <?php if (!isset($_SESSION['user'])) { ?> 


                <h3 class="hr_divider">Member Login</h3>
                <form method="post" id ="login_form"  name ="login_form" action="login_validation.php">
                    <label for="username">Username:</label> <input name="username" type="text" class="login_field" id="username" maxlength="30" />
                    <div class="cleaner_h10"></div>
                    <label for="password">Password:</label> <input name="password" type="password" class="login_field" id="password" maxlength="30" />
                    <div class="cleaner_h10"></div>
                    <input type="submit" name="login1" id="login1" value="Login" class="submit_btn" /> 


<a class='iframe  submit_btn' href="registration_form.php" style="color: white; text-decoration: none;">Register</a>
</form>
<?php }
else {?> 
<h3>Welcome back</h3> 
<form method="post" id ="logout_form"  name ="logout_form" action="#">
    <div>
        <img src="<?php echo $x_avatar ?>" alt="img" class="img-box" >
    </div>
    <h4> <?php echo $x_fname ?></h4>
    <div><h4> Number of Post: <?php echo (blogCount_individual ($x_user) )?></h4></div>
        <div class="cleaner_h10"></div>
           
    <input type="submit" name="logout" id="logout" value="Logout" class="submit_btn" /> 
</form>
<?php } ?> 


</div>

</div>

<div id="content">
    <?php 
    if (isset($_SESSION['user'])) { 

        foreach ($array_post as $key => $value) { ?>
        <div class="post_box">

            <h2><a href="blog_post.html"><?php echo $value[2] ?></a></h2>

            <div class="post_meta"><strong>Date:</strong> <?php echo $value[4] ?> | <strong>Author:</strong> <?php echo $value[1] ?> </div>
            <a href="#"><img src="<?php echo($value[5] )?>" alt="image 2" height="150" width="120" /></a>

            <p><?php echo $value[3] ?></p>

            <div class="cleaner_h20"></div>
            <div class="category"><a href="#" style="text-decoration: none;"><?php echo (blogCount($value[0], $array_post)) ?>  comments</a></div> 
            <div class="cleaner"></div>

        </div>
        <?php } 
    }
    else{ ?>

    <h2>You have to log in first...</h2>
    <h3>1. Register an account</h3>
    <h3>2. Sign in with the account you registered with</h3>
    <h3>3. Now you have access to the blog!</h3>
    <!-- <img src="images/george.jpg" alt="George" style=" height: 300px;"> -->
    <?php }
    ?>


</div>

<div class="cleaner"></div>
</div><!-- end of content wrapper -->
<div id="content_wrapper_bottom"></div>
</div> <!-- end of wrapper -->

<?php 
include('footer.php');
 ?>

</body>
</html>