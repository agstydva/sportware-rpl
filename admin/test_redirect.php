<?php
echo "<h2>Testing Admin Access</h2>";
echo "<p>Current URL: " . $_SERVER['REQUEST_URI'] . "</p>";
echo "<p>Current file: " . __FILE__ . "</p>";

// Test redirect
header("Location: login.php");
echo "<p>If you see this, redirect didn't work.</p>";
echo '<p><a href="login.php">Click here to go to login</a></p>';
?>
