<?php
include('header.php');
include("db_connection.php");

$user_id = $_GET['user_id'];

$sql_displayValues = "SELECT * FROM benutzer WHERE benutzer_id = '$user_id'";
$result_displayValues = mysqli_query($connection, $sql_displayValues);

$result_assoc = mysqli_fetch_assoc($result_displayValues);
$benutzername = $result_assoc['benutzername'];
$profilbild = $result_assoc['user_profil'];
$profilinformationen = $result_assoc['profile_informationen'];
$geschlecht = $result_assoc['user_gender'];
$nationalitaet = $result_assoc['user_country'];

?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Profil von <?php echo $benutzername; ?></title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .profile-card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 600px;
            margin: auto;
        }

        .profile-img {
            width: 100%;
            height: auto;
            border-bottom: 2px solid #ddd;
        }

        .profile-info {
            padding: 20px;
            text-align: center;
        }

        h2 {
            font-size: 2.5em;
            margin-bottom: 10px;
            color: #333;
        }

        p {
            font-size: 1.3em;
            color: #555;
            margin-bottom: 20px;
        }

        .profile-details {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            background-color: #f8f9fa;
            border-top: 2px solid #ddd;
        }

        .detail-item {
            text-align: center;
        }

        .detail-label {
            font-size: 1.2em;
            color: #777;
        }

        .detail-value {
            font-size: 1.3em;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="profile-card">
            <div class="profile-img">
                <img src="<?php echo $profilbild; ?>" alt="Profilbild" style="width: 100%; height: auto;">
            </div>
            <div class="profile-info">
                <h2><?php echo $benutzername; ?></h2>
                <p><?php echo $profilinformationen; ?></p>
            </div>
            <div class="profile-details">
                <div class="detail-item">
                    <div class="detail-label">Geschlecht</div>
                    <div class="detail-value"><?php echo $geschlecht; ?></div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Nationalität</div>
                    <div class="detail-value"><?php echo $nationalitaet; ?></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
