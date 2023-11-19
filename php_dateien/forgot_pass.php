<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passwort ändern</title>
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

    if (isset($_POST['submit'])) {
        $email = htmlentities(mysqli_real_escape_string($connection, $_POST['email']));
        $recovery_account = htmlentities(mysqli_real_escape_string($connection, $_POST['bf']));

        $select_user = "select * from benutzer where email='$email' AND forgotten_answer='$recovery_account'";

        $query = mysqli_query($connection, $select_user);
        $check_user = mysqli_num_rows($query);

        if ($check_user == 1) {
            $_SESSION['user_email'] = $email;

            echo "<script>window.open('create_password.php', '_self')</script>";
        } else {
            echo "<div class='message'>
            <p>Email oder Bester Freund stimmen nicht!</p>
          </div> <br>";
            echo "<a href='forgot_pass.php'><button class='btn'>Go Back</button>";
        }
    }
    else {
    ?>


        <div class="form-header">
                <header>FitBook</header>
                <p>Passwort vergessen - Sicherheitsabfrage</p>
            </div>

    <div class="signin-form">
        <form action="" method="post">
           
            <div class="field input">
                <label>Email</label>
                <input type="email"id="input-value" name="email" placeholder="someone@site.com" autocomplete="off" required>
            </div>
            <div class="field input">
                <label>Besterfreund Name</label>
                <input type="text" id="input-value" name="bf" placeholder="someone.." autocomplete="off" required>
            </div>
            <div class="field">
                <button type="submit" style="background-color: #818181" class="btn" name="submit">Submit</button>
            </div>
        </form>
        <div class="text-center small" style="color: #67428B;">zurück zum Login <a href="login.php">Click Hier</a></div>
    </div>
        </div>
        <?php } ?>
</div>
    
</body>

</html>