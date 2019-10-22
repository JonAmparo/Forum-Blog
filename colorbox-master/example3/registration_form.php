<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration form</title>
	<link rel="stylesheet" href="css/form_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<?php $a;?>
	<form id="myForm" class="content" action="form.php" method="_POST">
                    <h1>Registration Form </h1>

                    <div>
                        <label   class="forAlign">Gender:</label>
                        <label><input type="radio" name="gender" value="Male" > Male

                        </label>
                        <label>             
                            <input type="radio" name="gender" value="Female"> Female
                        </label>
                    </div>


                    <div>
                        <label class="forAlign" for="name">Lastname:</label>
                        <input type="text" id="lastname" name="lastname">
                    </div>

                    <div>
                        <label  class="forAlign" for="name">Firstname:</label>
                        <input type="text" id="firstname" name="firstname">
                    </div>
                    <div>
                        <label class="forAlign" for="age">Age:</label>
                        <input type="number" id="age" name="age">
                    </div>
                    <div>
                        <label class="forAlign" for="username">Username:</label>
                        <input type="text" id="username" name="username">
                    </div>
                    <div>
                        <label class="forAlign" for="password">Password:</label>
                        <input type="password" id="password" name="password">
                    </div>
                    <div>
                        <label class="forAlign" for="cPassword">Password(confirmation):</label>
                        <input type="password" id="cPassword" name="cPassword">
                    </div>

                    <div>
                        <label class="forAlign" for="country">Avatar:</label>
                        <input type="file" name="this_file" id="file">
                    </div>


                    <input type="submit" name="regiter_submit" value="Subscribe">
                    <input type="reset" value="Reset Form">
                </form>
                

<script>
            $(document).ready(function(){
                                $(".inline").colorbox({inline:true, width:"60%"});
                                });


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
                    gender.parent().css("color", "red");
                    gender.parent().parent().append("<span class='error'>Please select your gender</span>");
                    $(".error").fadeIn(500);
                }else{
                    gender.parent().css("color", "black");
                    gender.parent().parent().find(".error").remove();
                }
                if(lastname.val().length < 2){
                    validated = false;
                    lastname.css("border-color", "red");
                    lastname.parent().append("<span class='error'>Your lastname cannot be less than 2 characters</span>");
                    $(".error").fadeIn(500);
                }else{
                    lastname.css("border-color", "green");
                    lastname.parent().find(".error").remove();
                }
                if(firstname.val().length < 2){
                    validated = false;
                    firstname.css("border-color", "red");
                    firstname.parent().append("<span class='error'>Your firstname cannot be less than 2 characters</span>");
                    $(".error").fadeIn(500);
                }else{
                    firstname.css("border-color", "green");
                    firstname.parent().find(".error").remove();
                }


                if(age.val() <5 || age.val() >150){
                    validated = false;
                    age.css("border-color", "red");
                    age.parent().append("<span class='error'> Your age must be between 5 and 150</span>");
                    $(".error").fadeIn(500);
                }else{
                    age.css("border-color", "green");
                    age.parent().find(".error").remove();
                }

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

                if($('#cPassword').val().length < 6 || $('#cPassword').val()!= $('#password').val()){
                    validated = false;
                    $('#cPassword').css("border-color", "red");
                    $('#cPassword').parent().append("<span class='error'>Password doesn't match</span>");
                    $(".error").fadeIn(500);
                }else{
                    cPassword.css("border-color", "green");
                    cPassword.parent().find(".error").remove();
                }

                 
                

                if(validated){
                    msg = "Form submitted\n\n";
                    msg += "Gender: " + gender.val() + "\n";

                    msg += "FirststName: " + firstname.val() + "\n";
                    msg += "LastName: " + lastname.val() + "\n";
                    msg += "Age: " + age.val() + " years old\n";
                    msg += "Username: " + username.val() + "\n";
                     

                    alert(msg);
                    return true;
                }
                return false;
        })
});
        </script>
</body>
</html>