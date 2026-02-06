<?php
// Test file untuk debug admin access
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Admin Debug Test</h2>";

session_start();
echo "<p>Session started successfully</p>";

// Check session
if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin']==true){
    echo "<p style='color: green;'>Admin is logged in. UserID: " . $_SESSION['adminuserId'] . "</p>";
    $adminloggedin = true;
    $userId = $_SESSION['adminuserId'];
} else {
    echo "<p style='color: red;'>Admin is NOT logged in</p>";
    $adminloggedin = false;
    $userId = 0;
}

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
    mysqli_close($conn);
}

echo "<h3>What should happen:</h3>";
if($adminloggedin) {
    echo "<p>Should show admin dashboard</p>";
    echo "<p><a href='index.php'>Go to Admin Dashboard</a></p>";
} else {
    echo "<p>Should redirect to login page</p>";
    echo "<p><a href='login.php'>Go to Login Page</a></p>";
    echo "<p>Redirecting to login in 3 seconds...</p>";
    header("refresh:3;url=login.php");
}
?>
