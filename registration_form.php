<?php 
session_start();
   
 
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
  <title>Registration form</title>
  <link rel="stylesheet" href="css/form.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body style="background-color: lightgrey;">




<form id="myForm" class="content" action="registration_validation.php" method="POST" enctype="multipart/form-data">
    <h1>Registration Form </h1>

    <div>
        <label   class="align">Gender:</label>
        <label><input type="radio" name="gender" value="Male" > Male

        </label>
        <label>             
            <input type="radio" name="gender" value="Female"> Female
        </label>
    </div>
    <br>


    <div>
        <label class="align" for="name">Lastname:</label>
        <input type="text" id="lastname" name="lastname">
    </div>
    <br>
    <div>
        <label  class="align" for="name">Firstname:</label>
        <input type="text" id="firstname" name="firstname">
    </div>
    <br>
    <div>
        <label class="align" for="age">Age:</label>
        <input type="number" id="age" name="age">
    </div>
    <br>
    <div>
        <label class="align" for="username">Username:</label>
        <input type="text" id="username" name="username">
    </div>
    <br>
    <div>
        <label class="align" for="password">Password:</label>
        <input type="password" id="password" name="password">
    </div>
    <br>
    <div>
        <label class="align" for="cPassword">Password confirmation:</label>
        <input type="password" id="cPassword" name="cPassword">
    </div>
    <br>

    <div>
        <label class="align" for="avatar">Avatar:</label>
        <input type="file" name="avatar" id="avatar">
    </div>
    <br>


    <input style="margin-left: 100px;" type="submit" name="register_submit" value="Register now!">
    <input type="reset" value="Restart form">
</form>


<script>

    $(function(){
        $("#myForm").submit(function(e){
            var validated = true,
            gender = $("input[name='gender']");
            lastname = $("input[name='lastname']"),
            firstname = $("input[name='firstname']"),
            age = $("input[name='age']"),
            username = $("input[name='username']"),
            password = $("input[name='password']"),
            cPassword = $("input[name='cPassword']"),
            $(this).find(".error").remove();


            if(!gender.is(':checked')){
                validated = false;
                gender.parent().parent().append("<span class='error'>* Please select your gender *</span>");
                $(".error").fadeIn(500);
            }else{
                gender.parent().css("color", "black");
                gender.parent().parent().find(".error").remove();
            }
            if(lastname.val().length < 2){
                validated = false;
                lastname.css("border-color", "red");
                lastname.parent().append("<span class='error'>* Your lastname cannot be less than 2 characters *</span>");
                $(".error").fadeIn(500);
            }else{
                lastname.css("border-color", "green");
                lastname.parent().find(".error").remove();
            }
            if(firstname.val().length < 2){
                validated = false;
                firstname.css("border-color", "red");
                firstname.parent().append("<span class='error'>* Your firstname cannot be less than 2 characters *</span>");
                $(".error").fadeIn(500);
            }else{
                firstname.css("border-color", "green");
                firstname.parent().find(".error").remove();
            }


            if(age.val() <13 || age.val() >110){
                validated = false;
                age.css("border-color", "red");
                age.parent().append("<span class='error'>* Your age must be between 13 and 110 *</span>");
                $(".error").fadeIn(500);
            }else{
                age.css("border-color", "green");
                age.parent().find(".error").remove();
            }

            if($('#username').val().length < 5){
                validated = false;
                username.css("border-color", "red");
                username.parent().append("<span class='error'>* Your username cannot be less than 5 characters *</span>");
                $(".error").fadeIn(500);
            }else{
                username.css("border-color", "green");
                username.parent().find(".error").remove();
            }
            if($('#password').val().length < 6){
                validated = false;
                password.css("border-color", "red");
                password.parent().append("<span class='error'>* Your password cannot be less than 6 characters *</span>");
                $(".error").fadeIn(500);
            }else{
                password.css("border-color", "green");
                password.parent().find(".error").remove();
            }

            if($('#cPassword').val().length < 6 || $('#cPassword').val()!= $('#password').val()){
                validated = false;
                $('#cPassword').css("border-color", "red");
                $('#cPassword').parent().append("<span class='error'>* Password doesn't match *</span>");
                $(".error").fadeIn(500);
            }else{
                cPassword.css("border-color", "green");
                cPassword.parent().find(".error").remove();
            }

            if( document.getElementById("avatar").files.length == 0 ){
                validated = false;
                $('#avatar').css("border-color", "red");
                $('#avatar').parent().append("<span class='error'>* File is not chosen *</span>");
                $(".error").fadeIn(500);
            }else{
                cPassword.css("border-color", "green");
                cPassword.parent().find(".error").remove();
            }


            if(validated){
                msg = "Your information:\n";
                msg += "Gender: " +$("input[name='gender']:checked").val()+ "\n";
msg += "FirststName: " + firstname.val() + "\n";
msg += "LastName: " + lastname.val() + "\n";
msg += "Age: " + age.val() + " years old\n";
msg += "Username: " + username.val() + "\n";

var yess= confirm(msg);
if (yess){
    return true;


}
else
 return false;
}
return false;
})
});
</script>
</body>
</html>