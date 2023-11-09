<?php

include('db_connection.php');


$query = "SELECT * FROM benutzer WHERE benutzer_id != '".$_SESSION['user_id']."' ";

$result = mysqli_query($connection, $query);

$output = '
<table class="table table-bordered table-striped">
 <tr>
  <td>Benutzername</td>
  <td>Status</td>
  <td>Aktion</td>
 </tr>
';

while($row = mysqli_fetch_assoc($result))
{
 $output .= '
 <tr>
  <td>'.$row['benutzername'].'</td>
  <td></td>
  <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['benutzer_id'].'" data-tousername="'.$row['benutzername'].'">Start Chat</button></td>
 </tr>
 ';
}

$output .= '</table>';

echo $output;

?>
