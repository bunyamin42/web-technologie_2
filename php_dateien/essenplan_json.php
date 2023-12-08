<?php 

session_start();

if (!isset($_SESSION['email'])) {
    header("location: login.php");
} else {

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    header('Content-Type: application/json');
    
    if(isset($_SESSION['mealplan'])) {
        echo json_encode($_SESSION['mealplan']);
    } else {
        echo json_encode(["error" => "Session mealplan not found"]);
    }
    
    exit;
}
}
?>