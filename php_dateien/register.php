<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Register</title>

</head>

<body>
    <div class="container">
        <div class="box form-box">

            <?php

            include("db_connection.php");
            if (isset($_POST['submit'])) {
                if ($_POST['passwort'] != $_POST['passwort2']) {
                    echo "<div class='message'>
                <p> Passwörte stimmen nicht überein, versuchen Sie es nochmal!</p>
                 </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                } else {
                    $benutzername = $_POST['benutzername'];
                    $email = $_POST['email'];
                    $passwort = $_POST['passwort'];
                    $_SESSION['benutzername'] = $_POST['benutzername'];
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['passwort'] = $_POST['passwort'];

                    //verifying the unique email

                    $verify_query = mysqli_query($connection, "SELECT email FROM benutzer WHERE email='$email'");

                    if (mysqli_num_rows($verify_query) != 0) {
                        echo "<div class='message'>
                      <p>This email is used, Try another One Please!</p>
                  </div> <br>";
                        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                    } else {

                        mysqli_query($connection, "INSERT INTO benutzer(benutzername,passwort,email) VALUES('$benutzername','$passwort','$email')") or die("Error Occured");

                        echo "<div class='message_success'>
                      <p>Registration successfully!</p>
                  </div> <br>";
                        echo "<a href='login.php'><button class='btn'>Login Now</button>";
                    }
                }
            } else {

            ?>
                <div class="form-header">
                <header>Sign Up</header>
                <h3 style="align-items: center; ">Fill out this form</h3><br>
                </div>
                <form action="" method="post">
                    <div class="form-header">


                    </div>
                    <div class="field input">
                        <label id="input-value" for="benutzername">Benutzername</label>
                        <input type="text" name="benutzername" id="benutzername" placeholder="Benutzername" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label id="input-value" for="email">Email</label>
                        <input type="text" name="email" id="email" placeholder="Email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label id="input-value" for="passwort">passwort</label>
                        <input type="password" name="passwort" id="passwort" placeholder="Passwort" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label id="input-value" for="passwort">Passwort Bestätigung</label>
                        <input type="password" name="passwort2" id="passwort2" placeholder="Passwort" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label>Country</label>
                        <select id="input-value"" name=" user_country" required>
                            <option disabled="">Select a Country</option>
                            <option>Germany</option>
                            <option>France</option>
                            <option>Turkey</option>
                            <option>Belgium</option>
                        </select>
                    </div>
                    <div class="field input">
                        <label>Gender</label>
                        <select id="input-value" name="user_gender" required>
                            <option disabled="">Select your Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>others</option>
                        </select>
                    </div>
                    <div class="field">
                      
                            <label class="checkbox-inline"><input type="checkbox" required>accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
                        

                        <button type="submit" style="background-color: #818181" class="btn btn-primary btn-lg" name="submit" value="submit">Sign Up</button>
                    </div>
                    <div class="text-center small" style="color: #67428B;">Already have an account? <a href="login.php">Signin here</a></div>
        </div>
        </form>
    </div>
<?php } ?>
</div>
</body>

</html>