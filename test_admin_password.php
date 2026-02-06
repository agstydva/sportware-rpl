<?php
// Script untuk test password admin
$stored_password_hash = '$2y$10$AAfxRFOYbl7FdN17rN3fgeiPu/xQrx6MnvRGzqjVHlGqHAM4d9T1i';

// Possible passwords to test
$test_passwords = ['admin', 'password', '123456', 'admin123'];

echo "<h3>Testing Admin Password:</h3>";
echo "<ul>";
foreach($test_passwords as $password) {
    if (password_verify($password, $stored_password_hash)) {
        echo "<li><strong>CORRECT PASSWORD:</strong> $password</li>";
    } else {
        echo "<li>Wrong password: $password</li>";
    }
}
echo "</ul>";

// Test database connection
echo "<h3>Testing Database Connection:</h3>";
$server = "localhost";
$username = "root";
$password = "";
$database = "sportware";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
    echo "<p style='color: red;'>ERROR: Database connection failed - " . mysqli_connect_error() . "</p>";
} else {
    echo "<p style='color: green;'>SUCCESS: Database connection established</p>";
    
    // Test if admin user exists
    $sql = "SELECT * FROM users WHERE username='admin' AND userType='1'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<p style='color: green;'>SUCCESS: Admin user found in database</p>";
        $row = mysqli_fetch_assoc($result);
        echo "<p>Admin details: ID=" . $row['id'] . ", Username=" . $row['username'] . ", Email=" . $row['email'] . "</p>";
    } else {
        echo "<p style='color: red;'>ERROR: Admin user not found in database</p>";
    }
    
    mysqli_close($conn);
}
?>
