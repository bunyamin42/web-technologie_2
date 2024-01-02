<?php
include("db_connection.php");


$deleteAfterDays = 7;

$sql = "DELETE FROM meal_plans WHERE zeitstempel < (NOW() - INTERVAL $deleteAfterDays DAY)";
$connection->query($sql);

$connection->close();
?>
