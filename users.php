<?php 
session_start();
$x_fname="";
$x_lname="";
$x_age="";
$x_gender=false;
$x_user="";

$users=array();

if (isset($_SESSION['user'])) {

  $users=$_SESSION['users'];
  $x_gender =$_SESSION['user']['gender'];
  $x_fname =$_SESSION['user']['first_name'];

  $x_lname =$_SESSION['user']['last_name'];
  $x_user =$_SESSION['user']['username'];

  $x_age =$_SESSION['user']['age'];
  $x_avatar =$_SESSION['user']['avatar'];

}

function blogCount_individual ($u_name){
  $count=0;
  if ( isset($_COOKIE['blogs'])){
   $array_post =unserialize($_COOKIE['blogs']);

   foreach ($array_post as $key => $value) {
    if($u_name==$value[0]){
     $count++;

   }
 }
}

return  $count;
}
?>




<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Power Blog</title>
    <meta name="keywords" content="power blog" />
    <meta name="description" content="Power Blog" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Press+Start+2P' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/form_style.css">
    <link rel="stylesheet" href="css/colorbox.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src=" jquery.colorbox.js"></script>
    <script>
    $(document).ready(function() {
        $(".iframe").colorbox({
            iframe: true,
            width: "75%",
            height: "40%"
        });
    });
    </script>
</head>

<body>

    <div id="wrapper">
        <div id="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="blog_post.php">Post</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="users.php" class="current">Users</a></li>

            </ul>
        </div> <!-- end of menu -->

        <div id="header">
            <div id="site_title">
                <a href="#" target="_blank"><span class="logo">POWER <br /> BLOG</span></a>
            </div> <!-- end of site_title -->

            <div id="header_right">
                <h1>Lorem ipsum dolor sit amet</h1>
                <p>Etiam sit amet turpis. Duis nulla diam, posuere ac, varius id, ullamcorper sit amet, libero. Nam
                    sodales, pede vel dapibus lobortis, ipsum diam molestie risus, a vulputate risus nisl pulvinar
                    lacus.</p>
            </div>

            <div class="cleaner"></div>
        </div> <!-- end of header -->

        <div id="content_wrapper_top"></div>
        <div id="content_wrapper">

            <div id="sidebar">
                <div id="login">

                    <?php 
          if (isset($_SESSION['user'])) {  ?>
                    <h3 class="hr_divider">Welcome back</h3>

                    <form method="post" action="index.php">
                        <div>
                            <img src="<?php echo $x_avatar ?>" alt="img" class="img-box">
                        </div>
                        <label>
                            <h4><?php echo $x_fname ?></h4>
                        </label>
                        <div>
                            <h4> Number of Post: <?php echo (blogCount_individual ($x_user) )?></h4>
                        </div>

                        <div class="cleaner_h10"></div>

                        <input type="submit" name="logout" id="logout" value="Logout" class="submit_btn" />

                    </form>
                    <?php }?>

                    <?php if (!isset($_SESSION['user'])) { ?>


                    <h3 class="hr_divider">Member Login</h3>
                    <form method="post" id="login_form" name="login_form" action="login_validation.php">
                        <label for="username">Username:</label> <input name="username" type="text" class="login_field"
                            id="username" maxlength="30" />
                        <div class="cleaner_h10"></div>
                        <label for="password">Password:</label> <input name="password" type="password"
                            class="login_field" id="password" maxlength="30" />
                        <div class="cleaner_h10"></div>
                        <input type="submit" name="login1" id="login1" value="Login" class="submit_btn" />

                        <!--                     <input type="submit" name="submit" id="submit2" value="Register" class="submit_btn" />
-->
                        <!--  ///nadia//// -->


                        <a class='iframe  submit_btn' href="registration_form.php"
                            style="color: white; text-decoration: none;">Register</a>
                    </form>
                    <?php }?>
                </div>
            </div>


            <div id="content">
                <?php if (isset($_SESSION['user'])) { ?>
                <h2>Registered Users</h2>

                <div id="Registered_users">

                    <form id="edit_Form" class="content" action="registration_validation.php" method="POST"
                        enctype="multipart/form-data">

                        <table>


                            <?php  
      foreach( $users as $key=>$value) {  ?>

                            <tr>

                                <td>
                                    <a class='iframe'
                                        href="user_card.php?user_Name=<?php echo ($users[$key]['username'])?>"
                                        style="text-decoration: none; font-weight:bold; font-size: 16px ;"><?php echo ($users[$key]['first_name'] ." ". $users[$key]['last_name']) ; }?></a>
                                </td>
                            </tr>
                        </table>

                    </form>

                </div>
                <?php } 
else{?>

                <h2>You have to log in before viewing users...</h2>
                <h3>1. Register an account</h3>
                <h3>2. Sign in with the account you registered with</h3>
                <h3>3. Now you have access to the blog!</h3>
                <!-- <img src="images/george.jpg" alt="George" style=" height: 300px;"> -->

                <?php } ?>
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