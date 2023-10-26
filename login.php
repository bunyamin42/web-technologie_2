<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
            <?php 
             
              include("db_connection.php");
              if(isset($_POST['submit'])){
                
                $email = mysqli_real_escape_string($connection,$_POST['email']);
                $password = mysqli_real_escape_string($connection,$_POST['password']);

                $result = mysqli_query($connection,"SELECT * FROM benutzer WHERE email='$email' AND Password='$password' ") or die("Error, not correct");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['user_id'] = $row['user_id'];
                    
                    header("Location: startseite.php");
                }else{
                    echo "<div class='message'>
                      <p>Falscher Username oder Passwort, versuche es nochmal!</p>
                       </div> <br>";
                   echo "<a href='login.php'><button class='btn'>Go Back</button>";
         
                }
                
                   
                
              }else{

            
            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label id="input-value" for="email">Email</label>
                    <input  type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label id="input-value" for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have an account? <a href="register.php"> Sign Up Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>