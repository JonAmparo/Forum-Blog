<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change asswordP</title>
    <link rel="stylesheet" href="css/form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {

    });


    $(function() {
        $("#chagePass").submit(function(e) {
            var validated = true;

            old_password = $("input[name='old_password']"),
                new_password = $("input[name='new_password']"),
                cPassword = $("input[name='cPassword']"),

                $(this).find(".error").remove();



            if ($('#old_password').val().length < 6) {
                validated = false;
                old_password.css("border-color", "red");
                old_password.parent().append(
                    "<span class='error'>Your password cannot be less than 6 characters</span>");
                $(".error").fadeIn(500);
            } else {
                old_password.css("border-color", "green");
                old_password.parent().find(".error").remove();
            }
            if ($('#new_password').val().length < 6) {
                validated = false;
                new_password.css("border-color", "red");
                new_password.parent().append(
                    "<span class='error'>Your password cannot be less than 6 characters</span>");
                $(".error").fadeIn(500);
            } else {
                new_password.css("border-color", "green");
                new_password.parent().find(".error").remove();
            }
            if ($('#cPassword').val().length < 6 || $('#cPassword').val() != $('#new_password').val()) {
                validated = false;
                $('#cPassword').css("border-color", "red");
                $('#cPassword').parent().append("<span class='error'>Password doesn't match</span>");
                $(".error").fadeIn(500);
            } else {
                cPassword.css("border-color", "green");
                cPassword.parent().find(".error").remove();
            }




            if (validated) {



                alert("Please wait.....");
                return true;
            }
            return false;
        })
    });
    </script>
</head>

<body>


    <form id="chagePass" class="content" action="password_validation.php" method="POST" enctype="multipart/form-data">
        <h1>Change Password</h1>

        <div>
            <label class="align" for="old_password">Old Password:</label>
            <input type="password" id="old_password" name="old_password">
        </div>
        <div>
            <label class="align" for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password">
        </div>
        <div>
            <label class="align" for="cPassword">Password(confirmation):</label>
            <input type="password" id="cPassword" name="cPassword">
        </div>



        <input type="submit" name="changepassword_submit" value="Submit">
    </form>



</body>

</html>