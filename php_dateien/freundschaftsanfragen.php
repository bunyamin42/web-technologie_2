<?php
include('header.php');
include('db_connection.php');

// Annahme: Der eingeloggte Benutzer hat die ID 1
$loggedUserId = $_SESSION['benutzer_id'];

// SQL-Abfrage für Freundschaftsanfragen des eingeloggten Benutzers
$sql = "
SELECT b.benutzer_id, b.benutzername, b.user_profil
FROM freundschaft f
JOIN benutzer b ON f.fk_benutzer_id1 = b.benutzer_id
WHERE f.fk_benutzer_id2 = {$loggedUserId} AND f.status = 0
";

$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freundschaftsanfragen</title>
    <!-- Bootstrap CSS einbinden -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <style>
        body{
            overflow: auto;
        }
        .friendRequestItem {
            border-top: 1px solid rgba(204, 204, 204, 0.5);
            border-bottom: 1px solid rgba(204, 204, 204, 0.5);
            padding: 10px;
            padding-bottom: 25px;
            padding-top: 25px;
        }

        .friendRequestItem img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        .friendRequestItem .col {
            display: flex;
            align-items: center;
            justify-content: space-between; /* Hier wird der Platz zwischen den Elementen maximiert */
            margin-top: 10px;
        }

        .friendRequestItem .col div {
            margin-left: 2px; /* Minimale Änderung des linken Abstands */
        }

        .friendRequestItem .icons {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            width: 100%;
        }

        .friendRequestItem .icons i {
            font-size: 20px;
            margin-left: 10px;
            color: black !important;
        }

        .fa-comment, .fa-ellipsis-vertical, .fa-user, .fa-user-circle {
            font-size: 20px;
            color: black !important;
        }

        .fa-user-check, .fa-user-times {
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <nav class="nav nav-pills flex-column flex-sm-row">
        <a class="flex-sm-fill text-sm-center nav-link " href="freunde.php">Freundeliste</a>
        <a class="flex-sm-fill text-sm-center nav-link active" href="#">Freundschaftsanfragen</a>
        <a class="flex-sm-fill text-sm-center nav-link" href="freunde_hinzufuegen.php">Freunde hinzufügen</a>
        <a class="flex-sm-fill text-sm-center nav-link " href="Freundeempfehlung.php">Freundeempfehlung</a>
    </nav>
    <h2 style="margin-top: 5%;margin-bottom: 20px; text-align: center;">Freundschaftsanfragen</h2>
    <div class="container">
        <div id="friendRequestList" class="row"></div>
    </div>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $friendId = $row['benutzer_id'];
            $friendUsername = $row['benutzername'];
            $friendProfilePic = $row['user_profil'];

            $friendData = json_encode([
                'friendProfilePic' => $friendProfilePic,
                'friendUsername' => $friendUsername,
            ]);

            echo "<script>
                var friendRequestList = document.getElementById('friendRequestList');
                var friendRequestItem = document.createElement('div');
                friendRequestItem.classList.add('friendRequestItem', 'col-12', 'mb-0'); 
                var friendId = $friendId;
                var friendData = $friendData;
                friendRequestItem.innerHTML = '<div class=\"row\"><div class=\"col-1\" style=\"margin-right: 4%;\"><img src=\"' + friendData.friendProfilePic + '\" alt=\"' + friendData.friendUsername + '\'s Profilbild\" class=\"rounded-circle\"></div><div  class=\"col d-flex align-items-center\"><div class=\"icons\"><b>' + friendData.friendUsername + '</b></div><div class=\"icons\"><i class=\"fa-solid fa-user-check\" style=\"margin-left: 10px; cursor: pointer;\" onclick=\"onAcceptRequest(' + friendId + ')\"></i><i class=\"fa-solid fa-user-times\" style=\"margin-left: 10px; cursor: pointer;\" onclick=\"onRejectRequest(' + friendId + ')\"></i></div></div></div>';
                friendRequestList.appendChild(friendRequestItem);
            </script>";
        }
    }

    mysqli_close($connection);
    ?>

<script>
    function onAcceptRequest(friendId) {
        console.log('Freundschaftsanfrage annehmen: ', friendId);

        var xhr = new XMLHttpRequest();

        xhr.open('POST', 'freundschaftsanfrage_akzeptieren.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                console.log('Server-Antwort: ', xhr.responseText);
                
                location.reload();
                var friendRequestItem = document.getElementById('friendRequestItem_' + friendId);
                if (friendRequestItem) {
                    friendRequestItem.remove();
                }
            } else {
                console.error('Fehler bei der AJAX-Anfrage Freundschaftsanfrage akzeptieren: ', xhr.statusText);
            }
        };

        xhr.onerror = function() {
            console.error('Fehler bei der AJAX-Anfrage.');
        };

        xhr.send('friendId=' + encodeURIComponent(friendId));
    }

    function onRejectRequest(friendId) {
        console.log('Freundschaftsanfrage ablehnen: ', friendId);

        var xhr = new XMLHttpRequest();

        xhr.open('POST', 'freundschaftsanfrage_ablehnen.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                console.log('Server-Antwort: ', xhr.responseText);
                location.reload();
                var friendRequestItem = document.getElementById('friendRequestItem_' + friendId);
                if (friendRequestItem) {
                    friendRequestItem.remove();
                }
            } else {
                console.error('Fehler bei der AJAX-Anfrage Freundschaftsanfrage ablehnen: ', xhr.statusText);
            }
        };

        xhr.onerror = function() {
            console.error('Fehler bei der AJAX-Anfrage.');
        };

        xhr.send('friendId=' + encodeURIComponent(friendId));
    }
</script>
</body>
</html>
