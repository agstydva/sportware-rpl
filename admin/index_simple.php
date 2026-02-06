<?php 
// Simplified admin index for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Check if admin is logged in
$adminloggedin = false;
if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin'] == true){
    $adminloggedin = true;
    $userId = $_SESSION['adminuserId'];
}

if(!$adminloggedin) {
    // Redirect to login page
    header("Location: /sportware/admin/login.php");
    exit();
}

// If we reach here, admin is logged in - show dashboard
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Admin Dashboard</title>
    <link rel="icon" href="/sportware/img/sportware-logo.jpeg" type="image/x-icon">
</head>
<body>
    <div class="container-fluid mt-3">
        <h1>Admin Dashboard</h1>
        <p>Welcome, Admin! (User ID: <?php echo $userId; ?>)</p>
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="?page=home" class="list-group-item list-group-item-action">Home</a>
                    <a href="?page=userManage" class="list-group-item list-group-item-action">User Management</a>
                    <a href="?page=categoryManage" class="list-group-item list-group-item-action">Category Management</a>
                    <a href="?page=menuManage" class="list-group-item list-group-item-action">Menu Management</a>
                    <a href="?page=orderManage" class="list-group-item list-group-item-action">Order Management</a>
                    <a href="partials/_logout.php" class="list-group-item list-group-item-action text-danger">Logout</a>
                </div>
            </div>
            <div class="col-md-9">
                <?php 
                $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                $allowed_pages = ['home', 'userManage', 'categoryManage', 'menuManage', 'orderManage'];
                
                if(in_array($page, $allowed_pages) && file_exists($page . '.php')) {
                    include $page . '.php';
                } else {
                    echo "<h3>Welcome to Admin Panel</h3>";
                    echo "<p>Select a menu from the sidebar to get started.</p>";
                }
                ?>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
