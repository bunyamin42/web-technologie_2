<?php
include('header.php');
include('db_connection.php');

// Annahme: Der eingeloggte Benutzer hat die ID 1
$loggedUserId = $_SESSION['benutzer_id'];

// SQL-Abfrage für Freunde des eingeloggten Benutzers
$sql = "
SELECT *
FROM benutzer b
LEFT JOIN freundschaft f ON (b.benutzer_id = f.fk_benutzer_id1 OR b.benutzer_id = f.fk_benutzer_id2)
AND ({$loggedUserId} = f.fk_benutzer_id1 OR {$loggedUserId} = f.fk_benutzer_id2)
WHERE f.freundschaft_id IS NULL AND b.benutzer_id != {$loggedUserId}
";



$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freundesliste</title>
    <!-- Bootstrap CSS einbinden -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Freunde Hinzufügen</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <style>
        
        body{
            overflow: auto;
        }
        .friendItem {
            border-top: 1px solid rgba(204, 204, 204, 0.5);
            border-bottom: 1px solid rgba(204, 204, 204, 0.5);
            padding: 10px;
            padding-bottom: 25px;
            padding-top: 25px;
        }

        .friendItem img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        .friendItem .col {
            display: flex;
            align-items: center;
            justify-content: space-between; /* Hier wird der Platz zwischen den Elementen maximiert */
            margin-top: 10px;
        }

        .friendItem .col div {
            margin-left: 15px;
        }
        .fa-comment, .fa-ellipsis-vertical, .fa-user {
            font-size: 20px;
        color: black !important;
    }
    .fa-user-xmark{
        font-size: 20px;
        color: red;
        cursor: pointer;
    }   
    </style>
</head>
<body>
<nav class="nav nav-pills flex-column flex-sm-row">
  <a class="flex-sm-fill text-sm-center nav-link " href="freunde.php">Freundeliste</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="#">Freundschaftsanfragen</a>
  <a class="flex-sm-fill text-sm-center nav-link active" href="freunde_hinzufuegen.php">Freunde hinzufügen</a>
  <a class="flex-sm-fill text-sm-center nav-link " href="Freundeempfehlung.php">Freundeempfehlung</a>
</nav>
<h2 style="margin-top: 5%;margin-bottom: 20px; text-align: center;">Alle FitBook User</h2>
    <div class="container">
        <div id="friendList" class="row"></div>
    </div>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $friendId = $row['benutzer_id'];
            $friendUsername = $row['benutzername'];
            $friendProfilePic = $row['user_profil'];

            if ($friendId != $loggedUserId) {
                $friendData = json_encode([
                    'friendProfilePic' => $friendProfilePic,
                    'friendUsername' => $friendUsername,
                ]);

                echo "<script>
                var friendList = document.getElementById('friendList');
                var friendItem = document.createElement('div');
                friendItem.classList.add('friendItem', 'col-12', 'mb-0'); 
                var friendId = $friendId; // Benutze die Variable $friendId
                var friendData = $friendData;
                friendItem.innerHTML = '<div class=\"row\"><div class=\"col-1\" style=\"margin-right: 4%;\"><img src=\"' + friendData.friendProfilePic + '\" alt=\"' + friendData.friendUsername + '\'s Profilbild\" class=\"rounded-circle\"></div><div  class=\"col d-flex align-items-center justify-content-between\"><div><b>' + friendData.friendUsername + '<b></div> <a href=\"/Projekt%20FitBook/Web-Technologie-Projektarbeit%20-%20Kopie%20(2)/php_dateien/profile.php?user_id=' + encodeURIComponent(friendId) + '\" title=\"Userprofil\" style=\"margin-right: 10px;\" class=\"fa-solid fa-user\"></a>  </div></div>';
                friendList.appendChild(friendItem);
            </script>";
            
            }
        }
    }

    mysqli_close($connection);
    ?>
 

</body>
</html>