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
        <title>Profilbild ändern</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


    </head>
    <style>
        .card{
            box-shadow: 0 4px 8px 0 rgb(0, 0, 0, 0.2);
            max-width: 400px;
            margin: auto;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }
        .card img{
            height: 200px;
        }

        .title{
            color: grey;
            font-size: 18px;
        }
        button{
            border: none;
            outline: 0;
            display: inline-block;
            padding: 9px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }
        #update_profile{
            position: absolute;
            cursor: pointer;
            padding: 10px;
            border-radius: 4px;
            color: white;
            background-color: #000;
        }
        label{
            padding: 7px;
            display: table;
            color: #fff;
        }
        input[type="file"]{
            display: none;
        }
    </style>

    <body>
        <?php
        $user = $_SESSION['email'];
        $get_user = "select * from benutzer where email='$user'";
        $run_user = mysqli_query($connection, $get_user);
        $row = mysqli_fetch_array($run_user);

        $user_name = $row['benutzername'];
        $user_profile = $row['user_profil'];

        echo "
        <div class='card'> 
        <img src='$user_profile'>
        <h1>$user_name</h1>
        <form method='post' enctype='multipart/form-data'>
            <label id='update_profile'><i class='fa fa-circle-o' aria-hidden='true'></i> <b> Profilbild auswählen</b>
            <input type='file' name='u_image' size='60'>
            </label>
            <button id='button_profile' name='update'>&nbsp&nbsp&nbsp<i class='fa fa' aria-hidden='true'></i>Profile updaten</button>
        </form>
    </div><br><br>
    
        ";

        if(isset($_POST['update'])){
            $u_image = $_FILES['u_image']['name'];
            $image_tmp = $_FILES['u_image']['tmp_name'];
            $random_number =rand(1,100);

            if($u_image==''){
                echo "<script>alert('Bitte Profilbild auswählen')</script>";
                echo "<script>window.open('upload.php', '_self')</script>";
                exit();
            }else{

                move_uploaded_file($image_tmp, "images_profile/$u_image.$random_number");
                $update = "update benutzer set user_profil='images_profile/$u_image.$random_number' where email= '$user'";

                $run = mysqli_query($connection, $update);
                if($run){
                    echo "<script>alert('Dein Profilbild wurde aktualisiert!')</script>";
                    echo "<script>window.open('upload.php', '_self')</script>";
                }
            }
        }
        ?>
        

    </body>

    </html>
<?php } ?>