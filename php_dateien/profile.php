 
<?php
include('header.php');
include("db_connection.php");


$user_id = 1;



$sql_displayValues = "SELECT * FROM profile where benutzer_id = '$user_id'";
$result_displayValues = mysqli_query($connection, $sql_displayValues);

 $row_displayValues = mysqli_fetch_assoc($result_displayValues);
$about = $row_displayValues['benutzerinformationen'];
$gender = $row_displayValues['geschlecht'];
$dob = $row_displayValues['dob'];
$profile_pic = $row_displayValues['profile_pic']; 

 

$error = '';
$success = '';

if(isset($_POST['delete_image'])){
    // Das Bild löschen
    $imageToDelete = 'images/' . $profile_pic;

    if(file_exists($imageToDelete)){
        unlink($imageToDelete);
    }

    // Den Datenbankeintrag für das Bild aktualisieren (falls notwendig)
    $sql_update_image = "UPDATE profile SET profile_pic=NULL WHERE benutzer_id='$user_id'";
    mysqli_query($connection, $sql_update_image);

    
}

if(isset($_REQUEST['submit'])){

    $about_fetched = $_REQUEST['benutzerinformationen'];
    $gender_fetched = $_REQUEST['geschlecht'];
    $dob_fetched = $_REQUEST['dob'];
    $dateAdded_fetched = date('Y-m-d');

  
    if(!empty($about_fetched) && !empty($gender_fetched) && !empty($dob_fetched)){


        
$sql_check_isavail = "SELECT * FROM profile where benutzer_id = '$user_id'";
$result_check_isavail = mysqli_query($connection, $sql_check_isavail);

// var_dump($_FILES['picture']); 
$fileName = $_FILES['profile_pic']['name'];
$tempLocation = $_FILES['profile_pic']['tmp_name'];
$newfileName = rand(9999,1000).date('ymdhis').$fileName;  
move_uploaded_file($tempLocation,'images_profile/'.$newfileName);



if (mysqli_num_rows($result_check_isavail) == 1) {
    // update query
    $sql_update = "UPDATE profile SET profile_pic='$newfileName',
     benutzerinformationen='$about_fetched', dob='$dob_fetched', geschlecht='$gender_fetched'
      WHERE benutzer_id='$user_id'";

if (mysqli_query($connection, $sql_update)) {
  echo "Record updated successfully";
  
$sql_displayValues = "SELECT * FROM profile where benutzer_id = '$user_id'";
$result_displayValues = mysqli_query($connection, $sql_displayValues);

 $row_displayValues = mysqli_fetch_assoc($result_displayValues);
$about = $row_displayValues['benutzerinformationen'];
$gender = $row_displayValues['geschlecht'];
$dob = $row_displayValues['dob']; 
$profile_pic = $row_displayValues['profile_pic']; 

} else {
  echo "Error updating record: " . mysqli_error($connection);
}

      
}else{


 
    $sql = "INSERT INTO profile (profile_pic, benutzer_id, benutzerinformationen, geschlecht, dob, erstellungsdatum) 
    VALUES ('$newfileName','$user_id', '$about_fetched', '$gender_fetched', '$dob_fetched', '$dateAdded_fetched')"; 
              if (mysqli_query($connection, $sql)) {
                  $success  =  "Profile erstellt";
                  
$sql_displayValues = "SELECT * FROM profile where benutzer_id = '$user_id'";
$result_displayValues = mysqli_query($connection, $sql_displayValues);

 $row_displayValues = mysqli_fetch_assoc($result_displayValues);
$about = $row_displayValues['benutzerinformationen'];
$gender = $row_displayValues['geschlecht'];
$dob = $row_displayValues['dob'];
$profile_pic = $row_displayValues['profile_pic']; 

              } else {
                  $success  =  "Error: " . $sql . "<br>" . mysqli_error($connection);
              }
  

    
}




              


 
    }
    else{
        $error = 'Alle Felder sind obligatorisch.';
    }

}


?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Edit Your Profile</title>
</head>
<body>
    <div class="mt-5">
        <h1 class="text-center">Profil bearbeiten</h1>

        <?php echo $error; ?>
        <?php echo $success; ?>

        <form action="profile.php" method='post' enctype='multipart/form-data'>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="profile_pic">Profilbild hinzufügen:</label>
                        <input type="file" class='form-control' name='profile_pic'>
                    </div>
                </div>
                <div class="col-6">
                    <?php if(isset($profile_pic)) {?>
                        <img src="<?php echo isset($profile_pic) ? "images_profile/".$profile_pic : '' ?>" alt="" height=300 width=300><br>
                    <?php } ?>
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