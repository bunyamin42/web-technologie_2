<?php 

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // 1. Überprüfen Sie, ob das Cookie vorhanden ist.
    date_default_timezone_set('Europe/Berlin'); // Setzen Sie die entsprechende Zeitzone


if (isset($_COOKIE['user_cookie']) && time() < $_COOKIE['user_cookie']) {
    // Cookie ist noch gültig, leiten Sie den Benutzer zur Startseite weiter.
    header("Location: startseite.php");
    die();
}


?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <title>Login</title>

    <style>
        body {
            background-image: url('hintergrund/<?php echo rand(1, 7); ?>.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
                include("db_connection.php");
                if (isset($_POST['submit'])) {
                    $email = mysqli_real_escape_string($connection, $_POST['email']);
                    $passwort = mysqli_real_escape_string($connection, $_POST['passwort']);
                
                    $result = mysqli_query($connection, "SELECT * FROM benutzer WHERE email='$email'") or die("Error, not correct");
                
                    if ($row = mysqli_fetch_assoc($result)) {
                      
                       
                        if (password_verify($passwort, $row['passwort'])) {
                           
                            $update_last_activity = "UPDATE benutzer SET last_activity = NOW(), log_in = 'Online' WHERE benutzer_id = {$row['benutzer_id']}";
                            mysqli_query($connection, $update_last_activity);
                
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['benutzername'] = $row['benutzername'];
                            $_SESSION['user_id'] = $row['benutzer_id'];
                
                            // Cookie-Wert auf die Benutzer-ID setzen
                            $cookie_name = "user_cookie";
                            $cookie_value = $row['benutzer_id'];
                            $expiration_time = time() + (20 * 60); // Aktuelle Zeit + 20 Minuten
                            setcookie($cookie_name, $cookie_value, $expiration_time, "/", "", true, true);
                
                            header("Location: startseite.php");
                            exit();
                        } else {
                            echo "<div class='message'>
                                    <p>Falscher Benutzername oder Passwort, versuche es nochmal!</p>
                                  </div> <br>";
                            echo "<a href='login.php'><button class='btn'>Go Back</button>";
                        }
                    } else {
                        echo "<div class='message'>
                                <p>Falscher Benutzername oder Passwort, versuche es nochmal!</p>
                              </div> <br>";
                        echo "<a href='login.php'><button class='btn'>Go Back</button>";
                    }
                } else {
            ?>
             <div class="form-header">
             <header>FitBook</header>
            <h3>Login</h3>
            </div>
            <form action="login.php" method="post">
                <div class="field input">
                    <label id="input-value" for="email" >Email</label>
                    <input  type="email" name="email" id="email" placeholder="someone@hotmail.de" autocomplete="on"  required>
                </div>

                <div class="field input">
                    <label id="input-value" for="passwort">Passwort</label>
                    <input type="password" name="passwort" id="passwort"  placeholder="Passwort" autocomplete="current-password" required>
                </div>
                <div class="small">Forgot password? <a href="forgot_pass.php"> Click Here</a></div><br>
                <div class="field"> 
                    <input type="submit" style="background-color: #818181" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                <div class="text-center small" style="color: #67428B;">Don't have an account? <a href="register.php">Create one</a></div>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
