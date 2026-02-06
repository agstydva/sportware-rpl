<?php
session_start();
include 'partials/_dbconnect.php';

echo "<h2>Debug Information</h2>";

// Check session
echo "<h3>Session Info:</h3>";
echo "Session ID: " . session_id() . "<br>";
echo "User ID: " . ($_SESSION['userId'] ?? 'Not set') . "<br>";
echo "Username: " . ($_SESSION['username'] ?? 'Not set') . "<br>";

// Check POST data
echo "<h3>POST Data:</h3>";
echo "<pre>" . print_r($_POST, true) . "</pre>";

// Check FILES data
echo "<h3>FILES Data:</h3>";
echo "<pre>" . print_r($_FILES, true) . "</pre>";

// Check directory permissions
echo "<h3>Directory Info:</h3>";
$uploaddir1 = $_SERVER['DOCUMENT_ROOT'].'/sportware/img/';
$uploaddir2 = dirname(__DIR__).'/img/';
$uploaddir3 = __DIR__ . '/../img/';

echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
echo "Current Dir: " . __DIR__ . "<br>";
echo "Upload Dir 1: " . $uploaddir1 . " - Exists: " . (is_dir($uploaddir1) ? 'YES' : 'NO') . " - Writable: " . (is_writable($uploaddir1) ? 'YES' : 'NO') . "<br>";
echo "Upload Dir 2: " . $uploaddir2 . " - Exists: " . (is_dir($uploaddir2) ? 'YES' : 'NO') . " - Writable: " . (is_writable($uploaddir2) ? 'YES' : 'NO') . "<br>";
echo "Upload Dir 3: " . $uploaddir3 . " - Exists: " . (is_dir($uploaddir3) ? 'YES' : 'NO') . " - Writable: " . (is_writable($uploaddir3) ? 'YES' : 'NO') . "<br>";

// Check if user has profile picture
if(isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    $filename1 = $_SERVER['DOCUMENT_ROOT']."/sportware/img/person-".$userId.".jpg";
    $filename2 = dirname(__DIR__)."/img/person-".$userId.".jpg";
    $filename3 = __DIR__ . "/../img/person-".$userId.".jpg";
    
    echo "<h3>Profile Picture Check:</h3>";
    echo "File 1: " . $filename1 . " - Exists: " . (file_exists($filename1) ? 'YES' : 'NO') . "<br>";
    echo "File 2: " . $filename2 . " - Exists: " . (file_exists($filename2) ? 'YES' : 'NO') . "<br>";
    echo "File 3: " . $filename3 . " - Exists: " . (file_exists($filename3) ? 'YES' : 'NO') . "<br>";
}

// Process form if submitted
if(isset($_POST["updateProfilePic"])){
    echo "<h3>Processing Upload...</h3>";
    
    if(!isset($_FILES["image"]) || $_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
        echo "Error: No file uploaded or upload error. Error code: " . ($_FILES["image"]["error"] ?? "N/A") . "<br>";
    } else {
        echo "File uploaded successfully. Processing...<br>";
        $userId = $_SESSION['userId'];
        $newfilename = "person-".$userId.".jpg";
        $uploaddir = dirname(__DIR__).'/img/';
        $uploadfile = $uploaddir . $newfilename;
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            echo "SUCCESS: File moved to " . $uploadfile . "<br>";
        } else {
            echo "ERROR: Failed to move file to " . $uploadfile . "<br>";
        }
    }
}

if(isset($_POST["removeProfilePic"])){
    echo "<h3>Processing Remove...</h3>";
    $userId = $_SESSION['userId'];
    $filename = dirname(__DIR__)."/img/person-".$userId.".jpg";
    
    if (file_exists($filename)) {
        if(unlink($filename)) {
            echo "SUCCESS: File removed from " . $filename . "<br>";
        } else {
            echo "ERROR: Failed to remove file from " . $filename . "<br>";
        }
    } else {
        echo "ERROR: File does not exist at " . $filename . "<br>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile Debug Test</title>
</head>
<body>
    <h2>Test Upload</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*" required>
        <button type="submit" name="updateProfilePic">Test Upload</button>
    </form>
    
    <h2>Test Remove</h2>
    <form method="POST">
        <button type="submit" name="removeProfilePic">Test Remove</button>
    </form>
    
    <p><a href="viewProfile.php">Back to Profile</a></p>
</body>
</html>
