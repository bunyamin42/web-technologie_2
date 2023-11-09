<?php
include('db_connection.php');

session_start();

$message = '';

if(isset($_SESSION['user_id']))
{
    header('location:index_chat-application.php');
}

if(isset($_POST["submit"]))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM benutzer WHERE email = '$email'";
    $result = mysqli_query($connection, $query);

    if($result)
    {
        $row = mysqli_fetch_assoc($result);

        if($row && $password == $row["passwort"])
        {
            $_SESSION['user_id'] = $row['benutzer_id'];
            $_SESSION['username'] = $row['benutzername'];

            $sub_query = "INSERT INTO login_details (fk_login_benutzer_id) VALUES ('".$row['benutzer_id']."')";
            $sub_result = mysqli_query($connection, $sub_query);

            if($sub_result)
            {
                $_SESSION['login_details_id'] = mysqli_insert_id($connection);
                header("location:index_chat-application.php");
            }
        }
        else
        {
            $message = "<label>Falsches Passwort</label>";
        }
    }
    else
    {
        $message = "<label>Falsche E-Mail-Adresse</label>";
    }
}
?>

<html>  
    <head>  
        <title>Chat Application using PHP Ajax Jquery</title>  
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
            <br />
            <h3 align="center">Chat Application using PHP Ajax Jquery</h3><br />
            <br />
            <div class="panel panel-default">
                <div class="panel-heading">Chat Application Anmeldung</div>
                <div class="panel-body">
                    <form method="post">
                        <p class="text-danger"><?php echo $message; ?></p>
                        <div class="form-group">
                            <label>Email eingeben</label>
                            <input type="text" name="email" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Passwort eingeben</label>
                            <input type="password" name="password" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info" value="Anmelden" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="table-responsive">
            <h4 align="center">Online User</h4>
            <p align="right">Hi - <?php echo $_SESSION['username'];  ?> - <a href="logout.php">Logout</a></p>
            <div id="user_details"></div>
        </div>
    </body>  
</html>

<script>  
$(document).ready(function(){
    fetch_user();

    function fetch_user()
    {
        $.ajax({
            url:"fetch_user.php",
            method:"POST",
            success:function(data){
                $('#user_details').html(data);
            }
        })
    }
});  
</script>
