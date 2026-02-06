<?php
// Script untuk menambahkan kolom profilePicUpdated ke tabel users
include '../partials/_dbconnect.php';

// Check if column already exists
$checkColumn = "SHOW COLUMNS FROM users LIKE 'profilePicUpdated'";
$result = mysqli_query($conn, $checkColumn);

if(mysqli_num_rows($result) == 0) {
    // Add the column
    $sql = "ALTER TABLE users ADD COLUMN profilePicUpdated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";
    
    if(mysqli_query($conn, $sql)) {
        echo "Column 'profilePicUpdated' added successfully to users table.";
    } else {
        echo "Error adding column: " . mysqli_error($conn);
    }
} else {
    echo "Column 'profilePicUpdated' already exists.";
}

mysqli_close($conn);
?>
