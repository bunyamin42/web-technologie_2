 
<?php
include('header.php');
include("db_connection.php");


$user_id = $_GET['user_id'];



$sql_displayValues = "SELECT * FROM benutzer where benutzer_id = '$user_id'";
$result_displayValues = mysqli_query($connection, $sql_displayValues);

 $result_assoc = mysqli_fetch_assoc($result_displayValues);
 $benutzer = $result_assoc['benutzername'];
$about = $result_assoc['profile_informationen'];
$gender = $result_assoc['user_gender'];
$profile_pic = $result_assoc['user_profil']; 

 


?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Profil</title>
</head>
<body>
    <div class="mt-5">
        <h1 class="text-center">Profil <?php echo $benutzer ?></h1>

        

        <form action="profile.php" method='post' enctype='multipart/form-data'>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="profile_pic">Profilbild hinzufügen:</label>
                        <input type="file" class='form-control' name='profile_pic'>
                    </div>
                </div>
                <div class="col-6">
                    
                        <img src="<?php echo ($profile_pic) ?>" alt="" height=300 width=300><br>
                    
                </div>
            </div>

            <div class="form-group">
                <label for="about">Profilinformationen:</label>
                <textarea  id="" cols="30" rows="3" class='form-control' name='benutzerinformationen'><?php echo (isset($about)) ? "$about" : ""?></textarea>
            </div>
            <div class="form-group">
                <label for="gender">Geschlecht auswählen:</label> 
                <input type="radio" name='geschlecht' value='m' <?php echo (isset($gender) && $gender=='m') ? "checked" : ""?>> Male
                <input type="radio" name='geschlecht' value='f' <?php echo (isset($gender) && $gender=='f') ? "checked" : ""?>> Female
            </div>
            <div class="form-group">
                <label for="gender">Geburtsdatum:</label> 
                <input type="date" name='dob' class='form-control' value='<?php echo (isset($dob)) ? "$dob" : ""?>'>
            </div>

            <div class="form-group">
                <label for="delete_image">Profilbild löschen:</label>
                <input type="submit" name="delete_image" class="btn btn-danger" value="Bild löschen">
            </div>

            <button type="submit" name='submit' class="btn btn-primary">Bestätigen</button>
        </form>
    </div>
</body>
</html>