<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Power Blog Registration</title>
    <meta name="keywords" content="power blog" />
    <meta name="description" content="Power Blog" />
    <link rel="stylesheet" href="form_style.css">

<!--     /<link href="css/style.css" rel="stylesheet" type="text/css" />
-->    <link href='http://fonts.googleapis.com/css?family=Press+Start+2P' rel='stylesheet' type='text/css'>
</head>
<body>


 <form id="myForm" class="content" action="#">
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


    <input type="submit" value="Subscribe">
    <input type="reset" value="Reset Form">
</form>


</body>
</html>