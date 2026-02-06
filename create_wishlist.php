<?php
// Script untuk membuat tabel wishlist
include 'partials/_dbconnect.php';

$sql = "CREATE TABLE IF NOT EXISTS `wishlist` (
  `wishlistId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`wishlistId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

if (mysqli_query($conn, $sql)) {
    echo "Tabel wishlist berhasil dibuat!";
} else {
    echo "Error membuat tabel: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
