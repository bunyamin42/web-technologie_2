<!DOCTYPE html>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("db_connection.php");
include("header.php");

if (!isset($_SESSION['email'])) {
    header("location: login.php");
} else { ?>

    <html lang="de">

    <head>
        <title>Account Settings</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>



    </head>

    <body>
        <div class="row">
            <div class="col-sm-2">

            </div>
            <?php
            $user = $_SESSION['email'];
            $get_user = "select * from benutzer where email='$user'";
            $run_user = mysqli_query($connection, $get_user);
            $row = mysqli_fetch_array($run_user);

            $user_name = $row['benutzername'];
            $user_pass = $row['passwort'];
            $user_email = $row['email'];
            $user_profile = $row['user_profil'];
            $user_country = $row['user_country'];
            $user_gender = $row['user_gender'];
            $user_id = $row['benutzer_id'];
            $profil_pic = $row['user_profil'];
            ?>

            <div class="col-sm-8">
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="table table-bordered table-hover">
                        <tr align="center">
                            <td colspan="6" class="active">
                                <h2>Change Profil Einstellungen</h2>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Ändere deinen Benutzernamen</td>
                            <td>
                                <input type="text" name="u_name" class="form-control" required value="<?php
                                                                                                        echo $user_name; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a class="btn btn-default" style="text-decoration: none;font-size:15px;" href="upload.php"><i class="fa fa-user" aria-hidden="true"></i> Profilbild ändern</a></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Profilbild entfernen</td>
                            <td><input type="submit" name="delete_image" class="btn btn-secondary" value="Bild löschen" onclick="zeigeErfolgsmeldung()"></td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold;">Email ändern</td>
                            <td>
                                <input type="email" name="u_email" class="form-control" required value="<?php
                                                                                                        echo $user_email; ?>" />
                            </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold;">Land</td>
                            <td>
                                <select class="form-control" name="u_country">
                                    <option><?php echo $user_country ?></option>
                                    <option>Deutschland</option>
                                    <option>Frankreich</option>
                                    <option>Türkei</option>
                                    <option>Belgien</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold;">Geschlecht</td>
                            <td>
                                <select class="form-control" name="u_gender">
                                    <option><?php echo $user_gender ?></option>
                                    <option>Männlich</option>
                                    <option>Weiblich</option>
                                    <option>DIvers</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold;">Passwort vergessen</td>
                            <td>
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"> Passwort vergessen</button>
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="recovery.php?id=<?php echo $user_id ?>" method="post" id="f">
                                                    <strong>Sicherheitsfrage: Wer ist dein bester Freund/Freundin??</strong>
                                                    <textarea class="form-control" cols="83" rows="4" name="content" placeholder="Someone"></textarea><br>
                                                    <input class="btn btn-default" type="submit" name="sub" value="submit" style="width: 100px;"><br><br>
                                                    <pre>Beantworte die Frage, da es gebraucht wird, falls mein seinen <br>Passwort vergisst.</pre>
                                                    <br><br>
                                                </form>
                                                <?php
                                                if (isset($_POST['sub'])) {
                                                    $bfn = htmlentities($_POST['content']);

                                                    if ($bfn == '') {
                                                        echo "<script>alert('Please Enter Something.')</script>";
                                                        echo "<script>window.open('account_settings.php', '_self')</script>";
                                                        exit();
                                                    } else {
                                                        $update = "update benutzer set forgotten_answer='$bfn' where email='$user'";
                                                        $run = mysqli_query($connection, $update);

                                                        if ($run) {
                                                            echo "<script>alert('Working...')</script>";
                                                            echo "<script>window.open('account_settings.php', '_self')</script>";
                                                        } else {
                                                            echo "<script>alert('Error while Updating iinformation')</script>";
                                                            echo "<script>window.open('account_settings.php', '_self')</script>";
                                                        }
                                                    }
                                                }

                                                ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                        </tr>

                        <tr>
                            <td>
                            </td>
                            <td> <a class="btn btn-default" style="text-decoration: none;font-size:15px;" href="change_password.php"><i class="fa fa-key fa-fw" aria-hidden="true"></i> Passwort ändern</a>
                            </td>
                        </tr>

                        <tr>

                            <td style="font-weight: bold;">FitBook Account löschen</td>

                            <td> <a id="deleteAccountButton" class="btn btn-danger" style="text-decoration: none;font-size:15px; color:white " data-useremail="<?php echo $_SESSION['email']; ?>"><i class="fa-solid fa-trash" aria-hidden="true"></i> Account löschen</a>
                            </td>
                        </tr>

                        <tr align="center">
                            <td colspan="6">
                                <input type="submit" value="Update" name="update" class="btn btn-dark">
                            </td>
                        </tr>
                    </table>
                </form>
                <?php


                if (isset($_POST['delete_image'])) {
                    // Das Bild löschen
                    $imageToDelete = 'images_profile/' . $profil_pic;

                    if (@file_exists($imageToDelete)) {
                        @unlink($imageToDelete);
                        $sql_update_image = "UPDATE benutzer SET user_profil=NULL WHERE benutzer_id='$user_id'";
                        mysqli_query($connection, $sql_update_image);
                    }
                }

                if (isset($_POST['update'])) {
                    $user_name = htmlentities($_POST['u_name']);
                    $email = htmlentities($_POST['u_email']);
                    $u_country = htmlentities($_POST['u_country']);
                    $u_gender = htmlentities($_POST['u_gender']);

                    $update = "update benutzer set benutzername ='$user_name', email='$email', user_country='$u_country', user_gender ='$u_gender' where email='$user'";

                    $run = mysqli_query($connection, $update);

                    if ($run) {
                        echo "<script>window.open('account_settings.php', '_self')</script>";
                    }
                }
                ?>
            </div>
            <div class="col-sm-2">
            </div>
        </div>

        <script>
            document.getElementById('deleteAccountButton').addEventListener('click', function() {
                const benutzer_email = this.getAttribute('data-useremail');
                deleteAccount(benutzer_email);
            });

            function deleteAccount(benutzer_email) {
                var xhr = new XMLHttpRequest();
                xhr.open('DELETE', 'deleteAccount.php?userEmail=' + benutzer_email, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        console.log(xhr.responseText);
                        window.location.href = 'login.php';


                    } else if (xhr.readyState == 4 && xhr.status != 200) {
                        console.error('Fehler beim Löschen des Accounts:', xhr.status);
                        window.location.href = 'account_settings.php';

                    }
                };
                xhr.send();


            }

            function zeigeErfolgsmeldung() {
                alert("Profilbild erfolgreich gelöscht");
            }
        </script>
    </body>

    </html>
<?php } ?>