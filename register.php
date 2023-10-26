<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("db_connection.php");
         if(isset($_POST['submit'])){
            if($_POST['password'] != $_POST['password2']) {
                echo "<div class='message'>
                <p> Passwörte stimmen nicht überein, versuchen Sie es nochmal!</p>
                 </div> <br>";
                 echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
            }
            else {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

         //verifying the unique email

         $verify_query = mysqli_query($connection,"SELECT email FROM benutzer WHERE email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This email is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            mysqli_query($connection,"INSERT INTO benutzer(username,password,email) VALUES('$username','$password','$email')") or die("Error Occured");

            echo "<div class='message_success'>
                      <p>Registration successfully!</p>
                  </div> <br>";
            echo "<a href='login.php'><button class='btn'>Login Now</button>";
         

         } }

         }else{
         
        ?>

            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label id="input-value" for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label id="input-value" for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label id="input-value" for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label id="input-value" for="password">Password</label>
                    <input type="password" name="password2" id="password2" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    You have an Account? <a href="login.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>