<?php
include '_dbconnect.php';
session_start();

if (!isset($_SESSION['userId'])) {
    echo "Anda harus login untuk menghapus wishlist.";
    exit;
}

$userId = $_SESSION['userId'];
$productId = $_POST['productId'];

$sql = "DELETE FROM wishlist WHERE userId = '$userId' AND productId = '$productId'";
if (mysqli_query($conn, $sql)) {
    header("Location: ../wishlist.php");
    exit;
} else {
    echo "Gagal menghapus produk dari wishlist. Error: " . mysqli_error($conn);
}
?>
