<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 </head>
 <body>

 <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Fitbook</a>

  <!-- Links -->
  <ul class="navbar-nav ml-auto">
<?php 

if(isset($_SESSION['user_id'])){

?>


    <li class="nav-item">
      <a class="nav-link" href="startseite.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Timeline</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="profile.php">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="chat.php">Message</a>
    </li>
      <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>

    <?php } else {?>

        <li class="nav-item">
      <a class="nav-link" href="register.php">Register</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="login.php">Login</a>
    </li>
        <?php }  ?>



  </ul>
</nav>

 <div class="container">
 