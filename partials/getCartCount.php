<?php
include '_dbconnect.php';
session_start();

header('Content-Type: application/json');

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $userId = $_SESSION['userId'];
    
    $countsql = "SELECT SUM(`itemQuantity`) FROM `viewcart` WHERE `userId`=$userId"; 
    $countresult = mysqli_query($conn, $countsql);
    $countrow = mysqli_fetch_assoc($countresult);      
    $count = $countrow['SUM(`itemQuantity`)'];
    
    if(!$count) {
        $count = 0;
    }
    
    echo json_encode([
        'success' => true,
        'count' => (int)$count
    ]);
} else {
    echo json_encode([
        'success' => false,
        'count' => 0
    ]);
}

mysqli_close($conn);
?>
