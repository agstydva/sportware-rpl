<?php
// File untuk autocomplete search
include '_dbconnect.php';

if(isset($_GET['query']) && !empty($_GET['query'])) {
    $query = mysqli_real_escape_string($conn, $_GET['query']);
    
    // Ambil produk yang match dengan query
    $sql = "SELECT DISTINCT productName FROM `product` 
            WHERE productName LIKE '%$query%' 
            ORDER BY productName 
            LIMIT 10";
    
    $result = mysqli_query($conn, $sql);
    $suggestions = array();
    
    while($row = mysqli_fetch_assoc($result)) {
        $suggestions[] = $row['productName'];
    }
    
    // Ambil kategori yang match dengan query
    $sqlCat = "SELECT DISTINCT categorieName FROM `categories` 
               WHERE categorieName LIKE '%$query%' 
               ORDER BY categorieName 
               LIMIT 5";
    
    $resultCat = mysqli_query($conn, $sqlCat);
    
    while($row = mysqli_fetch_assoc($resultCat)) {
        $suggestions[] = $row['categorieName'];
    }
    
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($suggestions);
} else {
    header('Content-Type: application/json');
    echo json_encode([]);
}
?>
