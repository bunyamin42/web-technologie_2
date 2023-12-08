<!DOCTYPE html>
<?php
session_start();
include("db_connection.php");

if (!isset($_SESSION['email'])) {
    header("location: login.php");
} else {
?>
    <html lang="de">

    <head>
        <title>FitChat - Chat </title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="../chat.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
    .main-section {
        height: 100vh; /* 100% der Bildschirmhöhe */
        overflow-y: hidden; /* Verhindert vertikales Scrollen */
    }
</style>
    </head>

    <body>
        <div class="container main-section">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
                    <div class="input-group searchbox">
                        <div class="input-group-btn">
                            <center><a href="include/find_friends.php"><button class="btn btn-default search-icon" name="search_user" type="submit">Neuen Benutzer hinzufügen</button></a></center>
                        </div>
                    </div>
                    <div class="left-chat">
                        <ul>
                            <?php include("get_users_data.php"); ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
                    <div class="row">
                        <!-- getting the user informationen who is logged in -->
                        <?php
                        $user = $_SESSION['email'];
                        $get_user = "select * from benutzer where email='$user'";
                        $run_user = mysqli_query($connection, $get_user);
                        $row = mysqli_fetch_array($run_user);
                        $user_id = $row['benutzer_id'];
                        $user_name = $row['benutzername'];
                        $user_profile_image = isset($row['user_profil']) ? $row['user_profil'] : 'images_profile\avatar-1295399_640.png.70.jpg';
                        ?>
                        <!--- getting the user data on which user click -->
                        <?php
                        if (isset($_GET['user_name'])) {
                            global $connection;
                            $get_username = $_GET['user_name'];
                            $get_user = "select * from benutzer where benutzername='$get_username'";
                            $run_user = mysqli_query($connection, $get_user);
                            $row_user = mysqli_fetch_array($run_user);
                            $username = $row_user['benutzername'];
                            $user_profile_image = isset($row_user['user_profil']) ? $row_user['user_profil'] : 'images_profile\avatar-1295399_640.png.70.jpg';
                        }
                        $total_messages = "select * from users_chat where (sender_username='$user_name' AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username='$username')";

                        $run_messages = mysqli_query($connection, $total_messages);
                        $total = mysqli_num_rows($run_messages);

                        ?>

                        <div class="col-md-12 right-header">
                            <div class="right-header-img">
                                <img src=<?php echo "$user_profile_image"; ?>>
                            </div>
                            <div class="right-header-detail">
                                <form method="post">
                                    <p><?php echo "$user_name"; ?></p>
                                    <span style="color: white;"><?php echo $total; ?> Nachrichten</span>
                                    <div style="float: right; padding-right: 10px;">
                                        <button name="chat_verlassen" class="btn btn-danger">Chat verlassen</button>
                                        <button name="logout" class="btn btn-danger">Logout</button>
                                    </div>
                                </form>


                                <?php
                                if (isset($_POST['logout'])) {
                                    $update_msg = mysqli_query($connection, "UPDATE benutzer SET log_in='Offline'
                                    WHERE benutzername='$user_name'");
                                    header("Location: startseite.php");
                                    exit();
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">
                            <?php
                            $update_msg = mysqli_query($connection, "UPDATE users_chat SET msg_status='read'
                                WHERE sender_username='$username' AND receiver_username='$user_name'");

                            $sel_msg = "select * from users_chat where (sender_username='$user_name'
                                AND receiver_username='$username') OR (receiver_username='$user_name'
                                AND sender_username='$username') ORDER by 1 ASC";

                            $run_msg = mysqli_query($connection, $sel_msg);

                            while ($row = mysqli_fetch_array($run_msg)) {
                                $sender_username = $row['sender_username'];
                                $receiver_username = $row['receiver_username'];
                                $msg_content = $row['msg_content'];
                                $msg_date = $row['msg_date'];





                            ?>
                                <ul>
                                    <?php
                                    if ($user_name == $sender_username && $username == $receiver_username) {
                                        echo "
                                            <li>
                                                <div class='rightside-right-chat'>
                                                    <span> $sender_username <small> $msg_date</small></span><br><br>
                                                    <p>$msg_content</p>
                                                </div>
                                            </li>
                                        ";
                                    } else if ($user_name == $receiver_username && $username == $sender_username) {
                                        echo "
                                            <li>
                                                <div class='rightside-left-chat'>
                                                    <span> $sender_username <small> $msg_date</small></span><br><br>
                                                    <p>$msg_content</p>
                                                </div>
                                            </li>
                                        ";
                                    }
                                    ?>

                                </ul>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 right-chat-textbox">
                            <div id="charCount" style="color: white; text-align: left;"></div>

                            <form id="messageForm">
                                <input autocomplete="off" type="text" name="msg_content" id="msg_content" placeholder="Schreib deine Nachricht..">
                                <button class="btn" type="button" onclick="sendMessage()"><i class="fa fa-telegram" aria-hidden="true"></i></button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <script>
            function sendMessage() {
                var messageContent = $('#msg_content').val();
                var sender = '<?php echo $user_name; ?>'; // Benutzer, der die Nachricht sendet
                var receiver = '<?php echo $username; ?>'; // Benutzer, der die Nachricht empfängt

                // Überprüfen, ob die Nachricht nicht leer ist
                if (messageContent.trim() !== "") {
                    $.ajax({
                        type: "POST",
                        url: "send_message.php", // Ersetzen Sie dies durch den tatsächlichen Pfad zum PHP-Skript
                        data: {
                            msg_content: messageContent,
                            sender: sender,
                            receiver: receiver
                        },
                        success: function(response) {
                            // Hier können Sie weitere Aktionen nach dem Senden durchführen, falls erforderlich
                            console.log(response);

                            // Beispiel: Nachrichtenbereich aktualisieren
                            $('#scrolling_to_bottom').load(location.href + ' #scrolling_to_bottom');

                            // Oder nur das Textfeld löschen
                            $('#msg_content').val('');
                        },
                        error: function(error) {
                            console.error("Fehler beim Senden der Nachricht:", error);
                        }
                    });
                } else {
                    // Warnung, wenn das Nachrichtenfeld leer ist
                    alert("Bitte geben Sie eine Nachricht ein!");
                }
            }

            $(document).ready(function() {
                var maxChars = 150; // Maximale Anzahl erlaubter Zeichen

                $('#msg_content').on('input', function() {
                    var currentChars = $(this).val().length;
                    var remainingChars = maxChars - currentChars;

                    if (remainingChars >= 0) {
                        $('#charCount').text(remainingChars + ' Zeichen übrig');
                    } else {
                        var truncatedMsg = $(this).val().slice(0, maxChars);
                        $(this).val(truncatedMsg);
                    }
                });
            });

            $('#scrolling_to_bottom').animate({
                scrollTop: $('#scrolling_to_bottom').get(0).scrollHeight
            }, 1000);
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                var height = $(window).height();
                $('.left-chat').css('height', (height - 92) + 'px');
                $('.right-header-contentChat').css('height', (height - 163) + 'px');
            });
        </script>

    </body>

    </html>
<?php } ?>