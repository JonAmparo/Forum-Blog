<?php 
include('header.php');
?>

<!DOCTYPE html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Power Blog</title>
  <meta name="keywords" content="power blog" />
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link href='http://fonts.googleapis.com/css?family=Press+Start+2P' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/form.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script>

    $(document).ready(function(){
    });

    $(function(){
      $("#blog_post").submit(function(e){
        var validated = true,
        title = $("input[name='title']");
        comment = $("textarea[name='comment']"),
        
        $(this).find(".error").remove();
        
        if(title.val().length < 1){
          validated = false;
          title.css("border-color", "red");
          title.parent().append("<span class='error'>You have to write something..</span>");
          $(".error").fadeIn(500);
        }else{
          title.css("border-color", "green");
          title.parent().find(".error").remove();
        }
        if(comment.val().length < 1){
          validated = false;
          comment.css("border-color", "red");
          comment.parent().append("<span class='error'>You have to write something..</span>");
          $(".error").fadeIn(500);
        }else{
          comment.css("border-color", "green");
          comment.parent().find(".error").remove();
        }

        if(validated){
          msg = "Title\n\n";
          msg +=  title.val() + "\n";

          msg += "Comments: "   + "\n";
          msg +=  comment.val() + "\n";

          
          var yess = confirm(msg);
          if (yess)
            return true;
          else
           return false;
       }
    });
  </script>
</head>
<body>

  <div id="wrapper">
    <div id="menu">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="blog_post.php" class="current">Post</a></li>
        <li><a href="profile.php" >Profile</a></li>
        <li><a href="users.php" >Users</a></li>
      </ul>       
    </div> <!-- end of menu -->

    <div id="header">
      <div id="site_title">
        <a href="#" target="_blank"><span class="logo">POWER <br/> BLOG</span></a>
      </div> <!-- end of site_title -->

      <div id="header_right">
        <h1>Lorem ipsum dolor sit amet</h1>
        <p>Etiam sit amet turpis. Duis nulla diam, posuere ac, varius id, ullamcorper sit amet, libero. Nam sodales, pede vel dapibus lobortis, ipsum diam molestie risus, a vulputate risus nisl pulvinar lacus. </p>
      </div>

      <div class="cleaner"></div>
    </div> <!-- end of header -->

    <div id="content_wrapper_top"></div>
    <div id="content_wrapper">

      <div id="sidebar">           
        <div id="login">

          <?php 
          if (isset($_SESSION['user'])) {  ?>
          <h3>Welcome back</h3>
          
          <form method="post" action="index.php">
            <div>
             
             <img src="<?php echo $x_avatar ?>" alt="img">       

           </div>
           
           <label class="hr_divider"> <h4> <?php echo $x_fname ?></h4> </label> 

           <div ><h4> Number of Post: <?php echo (blogCount_individual ($x_user) )?></h4></div>

           <div class="cleaner_h10"></div>
           
           <input type="submit" name="logout" id="logout" value="Logout" class="submit_btn" />  
           
         </form>
         <?php }  ?>

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
<?php }?>
</div>
</div>



<div id="content">
 <?php if (isset($_SESSION['user'])) { ?> 

 <h2>Shout Out</h2>
 <hr>
 <div id="bpost">



   <form id="blog_post" class="content" action="post_validation.php" method="POST" enctype="multipart/form-data">


    <div>
      <label   for="name">Title</label><br>
      <input type="text" id="title" name="title"  >
    </div>

    <div>
      <label   for="name">Body</label><br>
      <textarea rows="4" cols="50" name="comment"  >
      </textarea>          </div>


      <br>
      <input  type="submit" name="Submit_post" class="submit_btn" value="Submit the post">
    </form>

  </div> 
  <?php } 
  else{?> 

    <h2>You have to log in before posting</h2>
    <img src="images/george.jpg" alt="George" style=" height: 300px;">

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