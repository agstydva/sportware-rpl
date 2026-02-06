<?php
    include '_dbconnect.php';
    session_start();
    
    // Check if session userId exists
    if(!isset($_SESSION['userId'])) {
        echo "<script>alert('Session expired. Please login again.');
                window.location='../index.php';
            </script>";
        exit();
    }
    
    $userId = $_SESSION['userId'];
    
    
    if(isset($_POST["updateProfilePic"])){
        // Check if file was uploaded
        if(!isset($_FILES["image"]) || $_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
            echo "<script>alert('Please select an image file to upload.');
                    window.location.href='../viewProfile.php';
                </script>";
            exit();
        }
        
        // Validate image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check === false) {
            echo '<script>alert("File is not a valid image.");
                    window.location.href="../viewProfile.php";
                </script>';
            exit();
        }
        
        // Set filename and directory
        $newfilename = "person-".$userId.".jpg";
        $uploaddir = dirname(dirname(__FILE__)).'/img/';  // Go up one level from partials/ to sportware/img/
        $uploadfile = $uploaddir . $newfilename;
        
        // Create directory if it doesn't exist
        if (!is_dir($uploaddir)) {
            mkdir($uploaddir, 0755, true);
        }
        
        // Move uploaded file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            // Set proper permissions
            chmod($uploadfile, 0644);
            
            // Clear cache to ensure new image is loaded
            clearstatcache(true, $uploadfile);
            
            // Update database to track profile picture update time
            $updateTime = date('Y-m-d H:i:s');
            $updateSql = "UPDATE users SET profilePicUpdated = '$updateTime' WHERE id = '$userId'";
            mysqli_query($conn, $updateSql);
            
            // Force browser to reload image by adding timestamp parameter
            $timestamp = time();
            echo "<script>
                    alert('Profile picture updated successfully!');
                    sessionStorage.setItem('profileImageUpdated', 'true');
                    localStorage.setItem('profileImageUpdated', 'true');
                    // Clear browser cache for this specific image
                    var img = new Image();
                    img.src = '/sportware/img/person-" . $userId . ".jpg?v=' + " . $timestamp . ";
                    // Force reload dengan parameter yang akan dideteksi JavaScript
                    window.location.href='../viewProfile.php?updated=" . $timestamp . "&v=" . $timestamp . "';
                 </script>";
        } else {
            echo "<script>alert('Failed to upload image. Please try again.');
                    window.location.href='../viewProfile.php';
                </script>";
        }
        exit();
    }

    if(isset($_POST["updateProfileDetail"])){
        $firstName = mysqli_real_escape_string($conn, $_POST["firstName"]);
        $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
        $password = $_POST["password"];
        
        // Get current user data to verify password
        $passSql = "SELECT * FROM users WHERE id='$userId'"; 
        $passResult = mysqli_query($conn, $passSql);
        
        if ($passResult && mysqli_num_rows($passResult) > 0) {
            $passRow = mysqli_fetch_assoc($passResult);
            
            if (password_verify($password, $passRow['password'])){ 
                $sql = "UPDATE `users` SET `firstName` = '$firstName', `lastName` = '$lastName', `email` = '$email', `phone` = '$phone' WHERE `id` = '$userId'";   
                $result = mysqli_query($conn, $sql);
                
                if($result){
                    // Update session variables to reflect changes
                    $_SESSION['firstName'] = $firstName;
                    $_SESSION['lastName'] = $lastName;
                    
                    echo '<script>alert("Profile updated successfully!");
                            window.location.href = "../viewProfile.php";
                        </script>';
                } else {
                    echo '<script>alert("Update failed: ' . mysqli_error($conn) . '");
                            window.history.back();
                        </script>';
                } 
            } else {
                echo '<script>alert("Current password is incorrect.");
                            window.history.back();
                        </script>';
            }
        } else {
            echo '<script>alert("User not found.");
                    window.history.back();
                </script>';
        }
    }
    
    if(isset($_POST["removeProfilePic"])){
        $filename = dirname(dirname(__FILE__))."/img/person-".$userId.".jpg";
        
        if (file_exists($filename)) {
            if(unlink($filename)) {
                // Clear cache to ensure removed image is recognized
                clearstatcache(true, $filename);
                
                echo "<script>
                        alert('Profile picture removed successfully!');
                        sessionStorage.setItem('profileImageUpdated', 'true');
                        // Force reload to clear browser cache
                        window.location.href='../viewProfile.php?v=" . time() . "';
                    </script>";
            } else {
                echo "<script>alert('Failed to remove profile picture.');
                        window.location.href='../viewProfile.php';
                    </script>";
            }
        } else {
            echo "<script>alert('No profile picture found to remove.');
                    window.location.href='../viewProfile.php';
                </script>";
        }
        exit();
    }


    include '_footer.php';
    
?>