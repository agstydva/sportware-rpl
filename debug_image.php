<?php
session_start();
include 'partials/_dbconnect.php';

if(!isset($_SESSION['userId'])) {
    die('Not logged in');
}

$userId = $_SESSION['userId'];

echo "<h2>Profile Image Debug</h2>";

// Check different possible paths
$paths = [
    'Relative Path' => 'img/person-'.$userId.'.jpg',
    'Absolute Path 1' => $_SERVER['DOCUMENT_ROOT'].'/sportware/img/person-'.$userId.'.jpg',
    'Absolute Path 2' => dirname(__FILE__).'/img/person-'.$userId.'.jpg',
    'Parent Dir Path' => dirname(__FILE__).'/../img/person-'.$userId.'.jpg'
];

foreach($paths as $name => $path) {
    echo "<p><strong>$name:</strong> $path</p>";
    echo "<p>Exists: " . (file_exists($path) ? '<span style="color:green">YES</span>' : '<span style="color:red">NO</span>') . "</p>";
    if(file_exists($path)) {
        echo "<p>Size: " . filesize($path) . " bytes</p>";
        echo "<p>Modified: " . date('Y-m-d H:i:s', filemtime($path)) . "</p>";
        echo "<img src='$path' style='width:100px;height:100px;object-fit:cover;border:1px solid #ccc;' onerror=\"this.style.display='none'\">";
    }
    echo "<hr>";
}

// Show what the viewProfile.php would use
$viewProfilePath = 'img/person-'.$userId.'.jpg';
echo "<h3>ViewProfile.php uses:</h3>";
echo "<p>Path: $viewProfilePath</p>";
echo "<p>Full URL: http://localhost/sportware/$viewProfilePath</p>";
echo "<img src='$viewProfilePath' style='width:150px;height:150px;object-fit:cover;border:2px solid #007bff;' onerror=\"this.alt='Image not found: ' + this.src\">";

echo "<h3>Default fallback:</h3>";
echo "<img src='img/profilePic.jpg' style='width:150px;height:150px;object-fit:cover;border:2px solid #ccc;'>";

// Check directory permissions
$imgDir = dirname(__FILE__).'/img/';
echo "<h3>Directory Info:</h3>";
echo "<p>Directory: $imgDir</p>";
echo "<p>Exists: " . (is_dir($imgDir) ? 'YES' : 'NO') . "</p>";
echo "<p>Writable: " . (is_writable($imgDir) ? 'YES' : 'NO') . "</p>";
echo "<p>Permissions: " . substr(sprintf('%o', fileperms($imgDir)), -4) . "</p>";

?>
