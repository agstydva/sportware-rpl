<?php
include '_dbconnect.php';
session_start();

header('Content-Type: application/json');
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

if(!isset($_SESSION['userId'])) {
    echo json_encode(['success' => false, 'message' => 'Session expired']);
    exit();
}

$userId = $_SESSION['userId'];

if(isset($_POST["action"])) {
    if($_POST["action"] === "upload" && isset($_FILES["image"])) {
        // Check if file was uploaded
        if($_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
            echo json_encode(['success' => false, 'message' => 'File upload error']);
            exit();
        }
        
        // Validate image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check === false) {
            echo json_encode(['success' => false, 'message' => 'File is not a valid image']);
            exit();
        }
        
        // Set filename and directory
        $newfilename = "person-".$userId.".jpg";
        $uploaddir = dirname(dirname(__FILE__)).'/img/';  // Go up one level from partials/ to sportware/img/
        $uploadfile = $uploaddir . $newfilename;
        
        // Debug: Log paths
        error_log("Upload directory: " . $uploaddir);
        error_log("Upload file: " . $uploadfile);
        
        // Create directory if it doesn't exist
        if (!is_dir($uploaddir)) {
            mkdir($uploaddir, 0755, true);
        }
        
        // Move uploaded file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            // Add timestamp to force browser cache refresh
            $timestamp = time();
            echo json_encode([
                'success' => true, 
                'message' => 'Profile picture updated successfully!',
                'image_url' => 'img/person-'.$userId.'.jpg?t='.$timestamp
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to upload image']);
        }
    }
    elseif($_POST["action"] === "remove") {
        $filename = dirname(dirname(__FILE__))."/img/person-".$userId.".jpg";
        
        error_log("=== PROFILE REMOVE DEBUG ===");
        error_log("User ID: " . $userId);
        error_log("Attempting to remove file: " . $filename);
        error_log("File exists: " . (file_exists($filename) ? 'YES' : 'NO'));
        error_log("Current working directory: " . getcwd());
        error_log("Script directory: " . __DIR__);
        error_log("Parent directory: " . dirname(__DIR__));
        
        if (file_exists($filename)) {
            error_log("File size before removal: " . filesize($filename));
            error_log("File permissions: " . substr(sprintf('%o', fileperms($filename)), -4));
            error_log("Is writable: " . (is_writable($filename) ? 'YES' : 'NO'));
            error_log("Directory writable: " . (is_writable(dirname($filename)) ? 'YES' : 'NO'));
            
            if(unlink($filename)) {
                error_log("SUCCESS: File removed successfully");
                error_log("File exists after removal: " . (file_exists($filename) ? 'YES' : 'NO'));
                
                // Also try to clear any cached versions
                clearstatcache(true, $filename);
                
                echo json_encode([
                    'success' => true, 
                    'message' => 'Profile picture removed successfully!',
                    'image_url' => 'img/profilePic.jpg?t='.time(),
                    'removed_user_id' => $userId  // Add this for admin cache clearing
                ]);
            } else {
                error_log("ERROR: Failed to remove file");
                echo json_encode(['success' => false, 'message' => 'Failed to remove profile picture']);
            }
        } else {
            error_log("ERROR: File does not exist");
            echo json_encode(['success' => false, 'message' => 'No profile picture found to remove']);
        }
        error_log("=== END PROFILE REMOVE DEBUG ===");
    }
}
else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>
