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
    <script>
        $(document).ready(function () {
            $("#passwort, #passwort2").on("input", function () {
                var passwort = $("#passwort").val();
                var passwort2 = $("#passwort2").val();

                // Überprüfung des Passworts
                if (passwort.length < 8) {
                    $("#passwortError").text("Das Passwort muss mindestens 8 Zeichen lang sein.");
                } else {
                    $("#passwortError").text("");
                }

                // Überprüfung der Passwortbestätigung
                if (passwort !== passwort2) {
                    $("#passwort2Error").text("Die Passwörter stimmen nicht überein.");
                } else {
                    $("#passwort2Error").text("");
                }
            });
        });
    </script>

</head>

<body>
    <div class="container">
        <div class="box form-box">

        <?php
    include("db_connection.php");
    session_start();

    if (isset($_POST['submit'])) {
        $benutzername = $_POST['benutzername'];
        $email = $_POST['email'];
        $passwort = $_POST['passwort'];
        $passwort2 = $_POST['passwort2'];

        // Überprüfung, ob die Passwörter übereinstimmen
        if ($passwort != $passwort2) {
            echo "<div class='message'>
                <p>Passwörter stimmen nicht überein, versuchen Sie es nochmal!</p>
            </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
        } else {
            // Überprüfung der E-Mail-Adresse
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<div class='message'>
                    <p>Ungültige E-Mail-Adresse, bitte geben Sie eine gültige E-Mail-Adresse ein!</p>
                </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
            } else {
                // Überprüfung der Passwortlänge
                if (strlen($passwort) < 8) {
                    echo "<div class='message'>
                        <p>Das Passwort muss mindestens 8 Zeichen lang sein!</p>
                    </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                } else {
                    // Überprüfung, ob die E-Mail bereits verwendet wird
                    $verify_query = mysqli_query($connection, "SELECT email FROM benutzer WHERE email='$email'");
                    if (mysqli_num_rows($verify_query) != 0) {
                        echo "<div class='message'>
                            <p>Diese E-Mail-Adresse wird bereits verwendet. Bitte verwenden Sie eine andere E-Mail-Adresse.</p>
                        </div> <br>";
                        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                    } else {
                        // Alle Überprüfungen erfolgreich, fügen Sie den Benutzer hinzu
                        mysqli_query($connection, "INSERT INTO benutzer(benutzername, passwort, email) VALUES('$benutzername', '$passwort', '$email')") or die("Error Occured");

                        echo "<div class='message_success'>
                            <p>Registrierung erfolgreich!</p>
                        </div> <br>";
                        echo "<a href='login.php'><button class='btn'>Jetzt anmelden</button>";
                    }
                }
            }
        }
    } else{
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
                        <input type="email" name="email" id="email" placeholder="Email" autocomplete="off" required>
                    </div>
                    <div class="field input">
                <label id="input-value" for="passwort">Passwort</label>
                <input type="password" name="passwort" id="passwort" placeholder="Passwort" autocomplete="off" required>
                <div id="passwortError" style="color: red;"></div>
            </div>

            <div class="field input">
                <label id="input-value" for="passwort2">Passwort Bestätigung</label>
                <input type="password" name="passwort2" id="passwort2" placeholder="Passwort Bestätigung" autocomplete="off" required>
                <div id="passwort2Error" style="color: red;"></div>
            </div>
                    <div class="field input">
                        <label>Country</label>
                        <select id="input-value" name=" user_country" required>
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