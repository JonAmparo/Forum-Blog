<?php 
session_start();
  $x_fname="";
  $x_lname="";
  $x_age="";
  $x_gender=false;
  $_GET['user_Name'];

  if (isset( $_SESSION['users'])) { 
    $users =  $_SESSION['users'];

    if(array_key_exists($_GET['user_Name'], $users)){
      $user_info = $users[$_GET['user_Name']]  ;
    }
  }

  if (isset($user_info)) {

    $x_gender = $user_info['gender'];
    $x_fname = $user_info['first_name'];

    $x_lname = $user_info['last_name'];
    $x_username = $user_info['username'];

    $x_age = $user_info['age'];
    $x_avatar = $user_info['avatar'];

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Power Blog</title>
	<link rel="stylesheet" href="css/form.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

   <h1>User Card</h1>

   <div style="display: inline-block;">


    <div style="padding-left: 35px;">

      <?php 
      if (isset($_SESSION['user'])) {  ?>
      <img class="image_wrapper" src="<?php echo $x_avatar ?>" alt="img" height="150" width="175">
      <?php }?>



    </div>
  </div>

<div style="display: inline-block;">

    <div>
        <label class="align"><b>USERNAME: </b></label>
        <label for="username"> <?php echo $x_username ?> </label>
    </div>
    <div>
        <br>
        <label class="align"><b>FIRST NAME: </b></label>
        <label for="first_name"> <?php echo $x_fname ?> </label>
    </div>
    <div>
        <br>
        <label class="align"><b>LAST NAME: </b></label>
        <label for="last_name"> <?php echo $x_lname ?> </label>
    </div>
    <div>
        <br>
        <label class="align"><b>AGE: </b></label>
        <label for="age"> <?php echo $x_age ?> years old  </label>
    </div>
    <div>
        <br>
        <label class="align"><b>GENDER: </b></label>
        <label for="gender"> <?php echo $x_gender ?> </label>
        <br>
    </div>
</div>
</body>
</html>