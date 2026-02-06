<?php
session_start();
include 'partials/_dbconnect.php';

if(!isset($_SESSION['userId'])) {
    die('Please login first');
}

$userId = $_SESSION['userId'];

echo "<h2>Profile Picture Debug</h2>";
echo "<p>User ID: " . $userId . "</p>";

// Check different possible paths where the file might be
$paths = [
    'Current working directory' => getcwd(),
    'Script directory' => __DIR__,
    'Document root' => $_SERVER['DOCUMENT_ROOT'],
];

echo "<h3>Path Information:</h3>";
foreach($paths as $name => $path) {
    echo "<p><strong>$name:</strong> $path</p>";
}

// Check profile image files
$possiblePaths = [
    'Relative from script' => __DIR__ . '/img/person-' . $userId . '.jpg',
    'Relative from parent' => dirname(__DIR__) . '/img/person-' . $userId . '.jpg',
    'Absolute path' => $_SERVER['DOCUMENT_ROOT'] . '/sportware/img/person-' . $userId . '.jpg',
    'Admin path' => $_SERVER['DOCUMENT_ROOT'] . '/sportware/img/person-' . $userId . '.jpg',
];

echo "<h3>Profile Image Files:</h3>";
foreach($possiblePaths as $name => $path) {
    echo "<p><strong>$name:</strong> $path</p>";
    echo "<p>Exists: " . (file_exists($path) ? '<span style="color:green">YES</span>' : '<span style="color:red">NO</span>') . "</p>";
    if(file_exists($path)) {
        echo "<p>Size: " . filesize($path) . " bytes</p>";
        echo "<p>Last modified: " . date('Y-m-d H:i:s', filemtime($path)) . "</p>";
        echo "<p>Permissions: " . substr(sprintf('%o', fileperms($path)), -4) . "</p>";
        echo "<p>Is writable: " . (is_writable($path) ? 'YES' : 'NO') . "</p>";
    }
    echo "<hr>";
}

// Test removal
if(isset($_POST['test_remove'])) {
    echo "<h3>Test Removal:</h3>";
    $testPath = dirname(__DIR__) . '/img/person-' . $userId . '.jpg';
    echo "<p>Attempting to remove: $testPath</p>";
    
    if(file_exists($testPath)) {
        if(unlink($testPath)) {
            echo "<p style='color:green'>SUCCESS: File removed</p>";
        } else {
            echo "<p style='color:red'>ERROR: Failed to remove file</p>";
        }
    } else {
        echo "<p style='color:orange'>File does not exist</p>";
    }
}

// List all person-*.jpg files
echo "<h3>All Profile Images in img directory:</h3>";
$imgDir = dirname(__DIR__) . '/img/';
if(is_dir($imgDir)) {
    $files = glob($imgDir . 'person-*.jpg');
    if($files) {
        foreach($files as $file) {
            $filename = basename($file);
            $filesize = filesize($file);
            $modified = date('Y-m-d H:i:s', filemtime($file));
            echo "<p>$filename - Size: $filesize bytes - Modified: $modified</p>";
        }
    } else {
        echo "<p>No profile images found</p>";
    }
} else {
    echo "<p>Image directory does not exist: $imgDir</p>";
}
?>

<form method="POST">
    <button type="submit" name="test_remove" style="background:red;color:white;padding:10px;border:none;border-radius:5px;">
        Test Remove My Profile Picture
    </button>
</form>

<p><a href="viewProfile.php">Back to Profile</a></p>
<p><a href="admin/index.php?page=userManage">Check Admin User Management</a></p>
