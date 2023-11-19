<!DOCTYPE html>
<?php
session_start();
include("db_connection.php");
include("header.php");

if (!isset($_SESSION['email'])) {
    header("location: login.php");
} else { ?>
    
    <html lang="de">

    <head>
        <title>Passwort Ändern</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


</head>
<style>
  body{
    overflow-x: hidden;
  }

</style>

    <body>
        <div class="row">
        <div class="col-sm-2">
        </div>
      
        <div class="col-sm-8">
        <form action="" method="post" enctype="multipart/form-data">
        <table class="table table-bordered table-hover">
                        <tr align="center">
                            <td colspan="6" class="active">
                                <h2>Passwort Ändern</h2>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Aktuelles Passwort</td>
                            <td>
                                <input type="password" name="current_pass" id="mypass" class="form-control" required 
                                placeholder="Aktuelles Passwort" />
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Neues Passwort</td>
                            <td>
                                <input type="password" name="u_pass1"  id="mypass" class="form-control" required 
                                placeholder="Neues Passwort" />
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Passwort bestätigen</td>
                            <td>
                                <input type="password" name="u_pass2"  id="mypass" class="form-control" required 
                                placeholder="Passwort bestätigen" />
                            </td>
                        </tr>
                        <tr align="center">
                            <td colspan="8">
                                <input type="submit" name="change" value="Ändern" class="btn btn-secondary" />
                            </td>
                        </tr>
            </table>
        </form>
            <?php 
                if(isset($_POST['change'])){
                    $c_pass = $_POST['current_pass'];
                    $pass1 = $_POST['u_pass1'];
                    $pass2 = $_POST['u_pass2'];
                    
                    $user = $_SESSION['email'];
                    $get_user = "select * from benutzer where email='$user'";
                    $run_user = mysqli_query($connection, $get_user);
                    $row = mysqli_fetch_array($run_user);
            
                    $user_password= $row['passwort'];


                    if($c_pass !==$user_password){
                        echo"
                        <divclass='alert alert-danger' role='alert'>
                            <strong> Your Old password didnt match</strong>
                        </div>
                        ";
                    }
                    if($pass1 !=$pass2){
                        echo"
                        <div class='alert alert-danger' role='alert'>
                            <strong> Your New password didnt match with confirm password</strong>
                        </div>
                        ";
                    }
                    
                    if($pass1 < 9 AND $pass2 < 9){
                        echo"
                        <div class=class='alert alert-danger' role='alert'>
                            <strong> Your 9 or more than 9 characters</strong>
                        </div>
                        ";

                    }

                    if($pass1 == $pass2 AND $c_pass == $user_password){
                        $update_pass = mysqli_query($connection, "UPDATE benutzer SET passwort='$pass1' WHERE email='$user'");

                        echo"
                        <div class='alert alert-success' role='alert'>
                            <strong>Passwort wurde geändert </strong>
                        </div>
                        ";
                    }

                    
                }

            ?>
        </div>
        <div class="col-sm-2">

        </div>
    </div>
    </body>

    </html>
<?php } ?>