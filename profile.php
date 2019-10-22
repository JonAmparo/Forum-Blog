<?php 
include('header.php');

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
            width: "80%",
            height: "80%"
        });
    });


    $(function() {
        $("#edit_Form").submit(function(e) {
            var validated = true,
                gender = $("input[name='gender']");
            lastname = $("input[name='lastname']"),
                firstname = $("input[name='firstname']"),
                age = $("input[name='age']"),


                $(this).find(".error").remove();


            if (!gender.is(':checked')) {
                validated = false;
                gender.parent().css("color", "red");
                gender.parent().parent().append("<span class='error'>Please select your gender</span>");
                $(".error").fadeIn(500);
            } else {
                gender.parent().css("color", "black");
                gender.parent().parent().find(".error").remove();
            }
            if (lastname.val().length < 2) {
                validated = false;
                lastname.css("border-color", "red");
                lastname.parent().append(
                    "<span class='error'>Your lastname cannot be less than 2 characters</span>");
                $(".error").fadeIn(500);
            } else {
                lastname.css("border-color", "green");
                lastname.parent().find(".error").remove();
            }
            if (firstname.val().length < 2) {
                validated = false;
                firstname.css("border-color", "red");
                firstname.parent().append(
                    "<span class='error'>Your firstname cannot be less than 2 characters</span>");
                $(".error").fadeIn(500);
            } else {
                firstname.css("border-color", "green");
                firstname.parent().find(".error").remove();
            }


            if (age.val() < 5 || age.val() > 150) {
                validated = false;
                age.css("border-color", "red");
                age.parent().append("<span class='error'> Your age must be between 5 and 150</span>");
                $(".error").fadeIn(500);
            } else {
                age.css("border-color", "green");
                age.parent().find(".error").remove();
            }
            if (document.getElementById("avatar").files.length == 0) {
                validated = false;
                $('#avatar').css("border-color", "red");
                $('#avatar').parent().append("<span class='error'>File is not chosen.</span>");
                $(".error").fadeIn(500);
            } else {
                cPassword.css("border-color", "green");
                cPassword.parent().find(".error").remove();
            }

            if (validated) {
                msg = "Form submitted\n\n";
                msg += "Gender: " + $("input[name='gender']:checked").val() + "\n";

                msg += "FirststName: " + firstname.val() + "\n";
                msg += "LastName: " + lastname.val() + "\n";
                msg += "Age: " + age.val() + " years old\n";


                var yess = confirm(msg);
                if (yess)
                    return true;
                else
                    return false;
            }
            return false;
        })
    });
    </script>
</head>

<body>

    <div id="wrapper">
        <div id="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="blog_post.php">Post</a></li>
                <li><a href="profile.php" class="current">Profile</a></li>
                <li><a href="users.php">Users</a></li>

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

                        <h4> <?php echo $x_fname ?></h4>


                        <div>
                            <h4> Number of Post: <?php echo (blogCount_individual ($x_user) )?></h4>
                        </div>


                        <div class="cleaner_h10"></div>

                        <input type="submit" name="logout" id="logout" value="Logout" class="submit_btn" />

                    </form>
                    <?php }  ?>

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




                        <a class='iframe  submit_btn' href="registration_form.php"
                            style="color: white; text-decoration: none;">Register</a>
                    </form>
                    <?php }?>


                </div>
            </div>


            <div id="content">
                <?php if (isset($_SESSION['user'])) { ?>

                <h2 style="margin-left: 100px;">Edit Profile Information</h2>

                <div id="contact_form">

                    <form id="edit_Form" class="content" action="editSave_validation.php" method="POST"
                        enctype="multipart/form-data">

                        <div>
                            <label class="align">Gender:</label>
                            <label><input type="radio" name="gender" <?php  if($x_gender=="Male" ) {echo "checked";}?>
                                    value="Male"> Male

                            </label>
                            <label>
                                <input type="radio" name="gender" <?php  if($x_gender=="Female" )  {echo "checked";}?>
                                    value="Female"> Female
                            </label>
                        </div>




                        <div>
                            <br>
                            <label class="align" for="name">Firstname:</label>
                            <input type="text" id="firstname" name="firstname" value="<?= $x_fname?>">
                        </div>
                        <br>

                        <div>
                            <label class="align" for="name">Lastname:</label>
                            <input type="text" id="lastname" name="lastname" value="<?= $x_lname?>">
                        </div>
                        <br>
                        <div>
                            <label class="align" for="age">Age:</label>
                            <input type="number" id="age" name="age" value="<?= $x_age?>">
                        </div>
                        <br>


                        <div>
                            <label class="align" for="avatar">Avatar:</label>
                            <input type="file" name="avatar" id="avatar">
                        </div>
                        <br>


                        <input style="margin-left: 100px;" type="submit" name="update_profile" class="submit_btn"
                            value="Edit & Save">
                        <a class='iframe  submit_btn' href="changepassword_form.php"
                            style="color: white; text-decoration: none;">Change Password</a>
                    </form>

                </div>
                <?php } 
      else{?>
                <h2>You have to log in before viewing profiles...</h2>
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