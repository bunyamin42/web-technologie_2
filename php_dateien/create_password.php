<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neues Password erstellen</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div class="container">
        <div class="box form-box">
<?php
    session_start();
    include("db_connection.php");

    if (isset($_POST['change'])) {
        $user = $_SESSION['user_email'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];


        if ($pass1 != $pass2) {
            echo "<div class='message'>
                                <p>Passwort 1 und Passwort 2 stimmen nicht überein!</p>
                              </div> <br>";
            echo "<a href='create_password.php'><button class='btn'>Go Back</button>";
        }

        if ($pass1 < 8 and $pass2 < 8) {
            echo "<div class='message'>
                                <p>Dein Passwort muss eine Länge von 8 Buchstaben oder mehr sein</p>
                              </div> <br>";
            echo "<a href='create_password.php'><button class='btn'>Go Back</button>";
        }

        if ($pass1 == $pass2) {
            $update_pass = mysqli_query($connection, "UPDATE benutzer SET passwort='$pass1' WHERE email='$user'");
            session_destroy();

           
            echo "<div class='message_success'>
            <p>Passwort Änderung erfolgreich!</p>
        </div> <br>";
              echo "<a href='login.php'><button class='btn'>Login Now</button>";
        }
    }
else{


    ?>


        <div class="form-header">
                <header>FitBook</header>
                <h2>Neues Password erstellen</h2>
            </div>

    <div class="signin-form">
        <form action="" method="post">
            <div class="form-header">
               
            </div>
            <div class="field input">
                <label>Passwort</label>
                <input type="password"  id="input-value" name="pass1" placeholder="Passwort" autocomplete="off" required>
            </div>
            <div class="field input">
                <label>Passwort bestätigen</label>
                <input type="password"  id="input-value" name="pass2" placeholder="Passwort bestätigen" autocomplete="off" required>
            </div>

            <div class="field input">
            <button type="submit" style="background-color: #818181" class="btn" name="change">Submit</button>
            </div>
        </form>
    </div>
        </div>
        <?php } ?>
</div>

 
</body>

</html>