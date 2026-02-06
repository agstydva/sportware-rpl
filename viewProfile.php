<?php
session_start(); // Start session first, before any output
include 'partials/_dbconnect.php'; // Database connection
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="htmlcss bootstrap menu, navbar, mega menu examples" />
    <meta name="description" content="Bootstrap navbar examples for any type of project, Bootstrap 4" />  

    <title>Profile - Sportware</title>
    <link rel="icon" href="img/sportware-logo.jpeg" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <style>
        body {
            padding-top: 70px;
            padding-bottom: 60px;
            background: linear-gradient(135deg, #f8f6f0 0%, #e8e3d8 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            color: #333;
        }

        .breadcrumb-nav {
            background: white;
            padding: 15px 0;
            margin-bottom: 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .breadcrumb-nav a {
            color: #666;
            text-decoration: none;
            font-weight: 500;
        }

        .breadcrumb-nav a:hover {
            color: #d4a574;
        }

        .breadcrumb-nav .active {
            color: #d4a574;
            font-weight: 600;
        }

        .page-header {
            background: linear-gradient(135deg, #d4a574 0%, #b8956a 100%);
            color: white;
            padding: 50px 0;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><polygon fill="rgba(255,255,255,0.1)" points="1000,100 1000,0 0,100"/></svg>');
            background-size: cover;
        }

        .page-header .container {
            position: relative;
            z-index: 2;
        }

        .page-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .page-header h1 i {
            font-size: 2.2rem;
            color: rgba(255,255,255,0.9);
        }

        .page-header p {
            font-size: 1.1rem;
            margin-top: 10px;
            opacity: 0.9;
        }

        .main-content {
            display: grid;
            grid-template-columns: 350px 1fr;
            gap: 40px;
            align-items: start;
        }

        .profile-sidebar {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            position: sticky;
            top: 90px;
        }

        .profile-avatar-section {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 25px;
            border-bottom: 2px solid #f8f9fa;
        }

        .profile-avatar {
            position: relative;
            display: inline-block;
            margin-bottom: 20px;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #d4a574;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(212, 165, 116, 0.3);
        }

        .profile-picture:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 35px rgba(212, 165, 116, 0.4);
        }

        .avatar-badge {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background: #28a745;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            border: 3px solid white;
        }

        .user-info {
            text-align: center;
        }

        .username {
            font-size: 1.4rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }

        .user-fullname {
            color: #666;
            font-size: 1rem;
            margin-bottom: 12px;
        }

        .user-type-badge {
            background: linear-gradient(45deg, #d4a574, #b8956a);
            color: white;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-block;
        }

        .profile-actions {
            margin-top: 30px;
            padding-top: 25px;
            border-top: 2px solid #f8f9fa;
        }

        .image-management {
            margin-bottom: 25px;
        }

        .image-management h6 {
            color: #333;
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-remove-image {
            background: linear-gradient(45deg, #dc3545, #c82333);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            font-size: 0.85rem;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            margin-bottom: 15px;
        }

        .btn-remove-image:hover {
            background: linear-gradient(45deg, #c82333, #bd2130);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
        }

        .upload-area {
            border: 2px dashed #d4a574;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            background: #fefcf8;
            transition: all 0.3s ease;
            margin-bottom: 15px;
        }

        .upload-area:hover {
            border-color: #b8956a;
            background: #fdf9f3;
        }

        .upload-area.dragover {
            border-color: #a0845a;
            background: #fcf6ed;
        }

        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: block;
            width: 100%;
        }

        .btn-choose-file {
            background: #d4a574;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-bottom: 10px;
        }

        .btn-choose-file:hover {
            background: #b8956a;
            transform: translateY(-1px);
        }

        .upload-btn-wrapper input[type=file] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }

        .btn-upload-image {
            background: linear-gradient(45deg, #28a745, #20c997);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-upload-image:hover {
            background: linear-gradient(45deg, #20c997, #17a2b8);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        }

        .btn-logout {
            background: linear-gradient(45deg, #dc3545, #c82333);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 15px 30px;
            font-weight: 700;
            font-size: 1rem;
            text-decoration: none;
            display: block;
            text-align: center;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .btn-logout:hover {
            background: linear-gradient(45deg, #c82333, #bd2130);
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(220, 53, 69, 0.4);
        }

        .profile-form-section {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .section-title {
            color: #333;
            font-weight: 700;
            margin-bottom: 30px;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 15px;
            border-bottom: 3px solid #f8f9fa;
        }

        .section-title i {
            color: #d4a574;
            font-size: 1.6rem;
        }

        .form-group label {
            color: #333;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-group label i {
            color: #d4a574;
            width: 16px;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #fafafa;
        }

        .form-control:focus {
            border-color: #d4a574;
            box-shadow: 0 0 0 0.2rem rgba(212, 165, 116, 0.25);
            background: white;
        }

        .form-control:disabled {
            background-color: #f8f9fa;
            opacity: 0.7;
            color: #666;
        }

        .input-group-text {
            background: linear-gradient(45deg, #d4a574, #b8956a);
            color: white;
            border: 2px solid #d4a574;
            font-weight: 600;
            border-radius: 10px 0 0 10px;
        }

        .input-group .form-control {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }

        .input-group .form-control:focus {
            border-left: 2px solid #d4a574;
        }

        .btn-update-profile {
            background: linear-gradient(45deg, #d4a574, #b8956a);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 15px 40px;
            font-weight: 700;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            margin-top: 30px;
            width: 100%;
            box-shadow: 0 4px 15px rgba(212, 165, 116, 0.3);
        }

        .btn-update-profile:hover {
            background: linear-gradient(45deg, #b8956a, #a0845a);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(212, 165, 116, 0.4);
        }

        .form-text {
            color: #666;
            font-size: 0.8rem;
            font-style: italic;
        }

        .not-logged-in {
            text-align: center;
            padding: 80px 40px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: 50px auto;
        }

        .not-logged-in .error-code {
            font-size: 8rem;
            font-weight: 900;
            background: linear-gradient(45deg, #d4a574, #b8956a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
            line-height: 1;
        }

        .not-logged-in h2 {
            color: #333;
            font-weight: 700;
            margin-bottom: 15px;
            font-size: 1.8rem;
        }

        .not-logged-in p {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .not-logged-in .btn-home {
            background: linear-gradient(45deg, #d4a574, #b8956a);
            color: white;
            padding: 15px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }

        .not-logged-in .btn-home:hover {
            background: linear-gradient(45deg, #b8956a, #a0845a);
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(212, 165, 116, 0.4);
        }

        /* Stats Cards */
        .stats-row {
            margin-bottom: 30px;
        }

        .stat-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .stat-card:hover {
            border-color: #d4a574;
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(212, 165, 116, 0.2);
        }

        .stat-card .stat-icon {
            font-size: 2rem;
            color: #d4a574;
            margin-bottom: 10px;
        }

        .stat-card .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }

        .stat-card .stat-label {
            color: #666;
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .main-content {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .profile-sidebar {
                position: relative;
                top: auto;
            }
        }

        @media (max-width: 768px) {
            body {
                padding-top: 60px;
            }
            
            .page-header {
                padding: 40px 0;
            }
            
            .page-header h1 {
                font-size: 2rem;
                flex-direction: column;
                gap: 10px;
            }
            
            .profile-form-section {
                padding: 25px;
            }
            
            .profile-sidebar {
                padding: 25px;
            }
            
            .profile-picture {
                width: 120px;
                height: 120px;
            }
        }

        @media (max-width: 576px) {
            .page-header h1 {
                font-size: 1.7rem;
            }
            
            .profile-picture {
                width: 100px;
                height: 100px;
            }
            
            .not-logged-in {
                padding: 60px 30px;
                margin: 30px 15px;
            }
            
            .not-logged-in .error-code {
                font-size: 6rem;
            }
        }

        /* Animation Classes */
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .slide-up {
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Mencegah cache gambar profile */
        .profile-picture,
        img[src*="person-"] {
            cache-control: no-cache, no-store, must-revalidate;
            pragma: no-cache;
            expires: 0;
        }
    </style>

</head>
<body>
    <?php require 'partials/_nav.php' ?>
    
    <?php if($loggedin): ?>
    
    <!-- Breadcrumb Navigation -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <a href="index.php">
                <i class="fas fa-home"></i> Home
            </a>
            <span class="mx-2">/</span>
            <span class="active">My Profile</span>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1>
                <i class="fas fa-user-circle"></i>
                My Profile
            </h1>
            <p>Manage your account information and personal settings</p>
        </div>
    </div>

    <div class="container fade-in">
        <?php 
            // Get user data including profile pic update timestamp
            $sql = "SELECT * FROM users WHERE id='$userId'"; 
            $result = mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result);
            $username = $row['username'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $email = $row['email'];
            $phone = $row['phone'];
            $userType = $row['userType'];
            $profilePicUpdated = isset($row['profilePicUpdated']) ? strtotime($row['profilePicUpdated']) : time();
            
            if($userType == 0) {
                $userType = "User";
            } else {
                $userType = "Admin";
            }
        ?>
        
        <!-- Stats Row -->
        <div class="row stats-row">
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-shopping-bag stat-icon"></i>
                    <div class="stat-number">
                        <?php
                        try {
                            // Check if orders table exists and get total orders
                            $checkTable = "SHOW TABLES LIKE 'orders'";
                            $tableExists = mysqli_query($conn, $checkTable);
                            
                            if (mysqli_num_rows($tableExists) > 0) {
                                $orderSql = "SELECT COUNT(DISTINCT o.orderId) as total FROM orders o WHERE o.userId='$userId'";
                                $orderResult = mysqli_query($conn, $orderSql);
                                if ($orderResult) {
                                    $orderRow = mysqli_fetch_assoc($orderResult);
                                    echo $orderRow['total'] ?? 0;
                                } else {
                                    echo "0";
                                }
                            } else {
                                echo "0";
                            }
                        } catch (Exception $e) {
                            echo "0";
                        }
                        ?>
                    </div>
                    <div class="stat-label">Total Orders</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-heart stat-icon"></i>
                    <div class="stat-number">
                        <?php
                        try {
                            // Check if wishlist table exists and get total wishlist items
                            $checkTable = "SHOW TABLES LIKE 'wishlist'";
                            $tableExists = mysqli_query($conn, $checkTable);
                            
                            if (mysqli_num_rows($tableExists) > 0) {
                                $wishlistSql = "SELECT COUNT(*) as total FROM wishlist WHERE userId='$userId'";
                                $wishlistResult = mysqli_query($conn, $wishlistSql);
                                if ($wishlistResult) {
                                    $wishlistRow = mysqli_fetch_assoc($wishlistResult);
                                    echo $wishlistRow['total'] ?? 0;
                                } else {
                                    echo "0";
                                }
                            } else {
                                echo "0";
                            }
                        } catch (Exception $e) {
                            echo "0";
                        }
                        ?>
                    </div>
                    <div class="stat-label">Wishlist Items</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-shopping-cart stat-icon"></i>
                    <div class="stat-number">
                        <?php
                        try {
                            // Check if viewcart table exists and get total cart items
                            $checkTable = "SHOW TABLES LIKE 'viewcart'";
                            $tableExists = mysqli_query($conn, $checkTable);
                            
                            if (mysqli_num_rows($tableExists) > 0) {
                                $cartSql = "SELECT COUNT(*) as total FROM viewcart WHERE userId='$userId'";
                                $cartResult = mysqli_query($conn, $cartSql);
                                if ($cartResult) {
                                    $cartRow = mysqli_fetch_assoc($cartResult);
                                    echo $cartRow['total'] ?? 0;
                                } else {
                                    echo "0";
                                }
                            } else {
                                echo "0";
                            }
                        } catch (Exception $e) {
                            echo "0";
                        }
                        ?>
                    </div>
                    <div class="stat-label">Cart Items</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-calendar-alt stat-icon"></i>
                    <div class="stat-number">
                        <?php
                        try {
                            if (isset($row['dt']) && !empty($row['dt'])) {
                                $joinDate = new DateTime($row['dt']);
                                $now = new DateTime();
                                $diff = $now->diff($joinDate);
                                echo $diff->days;
                            } else {
                                echo "0";
                            }
                        } catch (Exception $e) {
                            echo "0";
                        }
                        ?>
                    </div>
                    <div class="stat-label">Days Member</div>
                </div>
            </div>
        </div>

        <div class="main-content">
            <!-- Profile Sidebar -->
            <div class="profile-sidebar slide-up">
                <div class="profile-avatar-section">
                    <div class="profile-avatar">
                        <?php 
                        $profileImagePath = "img/person-".$userId.".jpg";
                        $profileImageExists = file_exists($profileImagePath);
                        $fileTime = $profileImageExists ? filemtime($profileImagePath) : 0;
                        $cacheBuster = "?t=" . max($profilePicUpdated, $fileTime, time());
                        $imageSrc = $profileImageExists ? $profileImagePath . $cacheBuster : "img/profilePic.jpg";
                        ?>
                        <img class="profile-picture" src="<?php echo $imageSrc; ?>" onError="this.src = 'img/profilePic.jpg'" alt="<?php echo $firstName.' '.$lastName; ?>">
                        <div class="avatar-badge">
                            <i class="fas fa-check"></i>
                        </div>
                    </div>
                    
                    <div class="user-info">
                        <div class="username">@<?php echo $username ?></div>
                        <div class="user-fullname"><?php echo $firstName." ".$lastName; ?></div>
                        <span class="user-type-badge"><?php echo $userType ?></span>
                    </div>
                </div>
                
                <div class="profile-actions">
                    <div class="image-management">
                        <h6><i class="fas fa-image"></i> Profile Image</h6>
                        
                        <form action="partials/_manageProfile.php" method="POST">
                            <button type="submit" class="btn-remove-image" name="removeProfilePic">
                                <i class="fas fa-trash-alt"></i> Remove Current Image
                            </button>
                        </form>
                        
                        <div class="upload-area">
                            <i class="fas fa-cloud-upload-alt" style="font-size: 2rem; color: #d4a574; margin-bottom: 10px;"></i>
                            <p style="margin: 0; color: #666; font-size: 0.9rem;">Choose a new profile picture</p>
                        </div>
                        
                        <form action="partials/_manageProfile.php" method="POST" enctype="multipart/form-data" id="imageUploadForm">
                            <div class="upload-btn-wrapper">
                                <button type="button" class="btn-choose-file" id="chooseFileBtn">
                                    <i class="fas fa-camera"></i> Choose File
                                </button>
                                <input type="file" name="image" id="image" accept="image/*">
                            </div>
                            <button type="submit" name="updateProfilePic" class="btn-upload-image">
                                <i class="fas fa-upload"></i> Upload Image
                            </button>
                            <input type="hidden" name="ajax" value="0">
                        </form>
                    </div>
                    
                    <a href="partials/_logout.php" class="btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Logout Account
                    </a>
                </div>
            </div>
            
            <!-- Profile Form Section -->
            <div class="profile-form-section slide-up">
                <h2 class="section-title">
                    <i class="fas fa-user-edit"></i>
                    Personal Information
                </h2>
                
                <form action="partials/_manageProfile.php" method="post">
                    <div class="form-group">
                        <label for="username">
                            <i class="fas fa-user"></i>
                            Username
                        </label>
                        <input class="form-control" id="username" name="username" type="text" disabled value="<?php echo $username ?>">
                        <small class="form-text text-muted">
                            <i class="fas fa-info-circle"></i> Username cannot be changed for security reasons
                        </small>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName">
                                    <i class="fas fa-user-tag"></i>
                                    First Name
                                </label>
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter your first name" required value="<?php echo $firstName ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastName">
                                    <i class="fas fa-user-tag"></i>
                                    Last Name
                                </label>
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter your last name" required value="<?php echo $lastName ?>">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">
                            <i class="fas fa-envelope"></i>
                            Email Address
                        </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required value="<?php echo $email ?>">
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">
                                    <i class="fas fa-phone"></i>
                                    Phone Number
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-flag"></i> +62
                                        </span>
                                    </div>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required pattern="[0-9]{10}" maxlength="10" value="<?php echo $phone ?>">
                                </div>
                                <small class="form-text text-muted">
                                    <i class="fas fa-info-circle"></i> Enter 10 digits without country code
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">
                                    <i class="fas fa-lock"></i>
                                    Password
                                </label>    
                                <input class="form-control" id="password" name="password" placeholder="Enter your current password" type="password" required data-toggle="password">
                                <small class="form-text text-muted">
                                    <i class="fas fa-info-circle"></i> Enter your password to verify changes
                                </small>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" name="updateProfileDetail" class="btn-update-profile">
                        <i class="fas fa-save"></i> Update Profile Information
                    </button>
                </form>
            </div>
        </div>
    </div>
                                
    <?php else: ?>
        <div class="container">
            <div class="not-logged-in fade-in">
                <div class="error-code">403</div>
                <h2>Access Denied</h2>
                <p>You need to be logged in to access your profile page</p>
                <a href="index.php" class="btn-home">
                    <i class="fas fa-home"></i>
                    Go To Homepage
                </a>
            </div>
        </div>
    <?php endif; ?>
    
    <?php require 'partials/_footer.php' ?>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
        
    <script>
        $(document).ready(function() {
            // Check if page was loaded after image update
            var urlParams = new URLSearchParams(window.location.search);
            var updated = urlParams.get('updated');
            
            if(updated) {
                // Force refresh all profile images
                setTimeout(function() {
                    $('.profile-picture, img[src*="person-<?php echo $userId; ?>"]').each(function() {
                        var src = $(this).attr('src');
                        var baseSrc = src.split('?')[0];
                        $(this).attr('src', baseSrc + '?t=' + Date.now());
                    });
                    
                    // Remove the parameter from URL without reload
                    var newUrl = window.location.pathname;
                    window.history.replaceState({}, document.title, newUrl);
                }, 100);
            }
            
            // Force refresh profile image if it was just uploaded
            if(sessionStorage.getItem('profileImageUpdated')) {
                sessionStorage.removeItem('profileImageUpdated');
                
                // Update profile image in current page
                var profileImg = $('.profile-picture');
                var currentSrc = profileImg.attr('src');
                var newSrc = currentSrc.split('?')[0] + '?t=' + new Date().getTime();
                profileImg.attr('src', newSrc);
                
                // Update navbar profile image as well
                var navbarImg = $('.navbar img[src*="person-"]');
                if(navbarImg.length > 0) {
                    var navCurrentSrc = navbarImg.attr('src');
                    var navNewSrc = navCurrentSrc.split('?')[0] + '?t=' + new Date().getTime();
                    navbarImg.attr('src', navNewSrc);
                }
                
                // Force browser to reload the image completely
                profileImg.on('error', function() {
                    $(this).attr('src', 'img/profilePic.jpg');
                });
            }
            
            // Click handler for Choose File button
            $('#chooseFileBtn').click(function() {
                console.log('Choose file button clicked');
                $('#image').click();
            });
            
            // File upload functionality
            $('#image').change(function() {
                console.log('File input changed');
                var file = $('#image')[0].files[0];
                if (file) {
                    console.log('File selected:', file.name);
                    var fileName = file.name.length > 20 ? file.name.substring(0, 20) + "..." : file.name;
                    $('#chooseFileBtn').html('<i class="fas fa-check-circle"></i> ' + fileName);
                    $('#chooseFileBtn').css('background', '#28a745');
                    
                    // Show file preview if it's an image
                    if (file.type.startsWith('image/')) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('.profile-picture').attr('src', e.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                } else {
                    console.log('No file selected');
                    $('#chooseFileBtn').html('<i class="fas fa-camera"></i> Choose File');
                    $('#chooseFileBtn').css('background', '#d4a574');
                }
            });

            // Drag and drop functionality for upload area
            var uploadArea = $('.upload-area');
            
            uploadArea.on('dragover', function(e) {
                e.preventDefault();
                $(this).addClass('dragover');
            });
            
            uploadArea.on('dragleave', function(e) {
                e.preventDefault();
                $(this).removeClass('dragover');
            });
            
            uploadArea.on('drop', function(e) {
                e.preventDefault();
                $(this).removeClass('dragover');
                
                var files = e.originalEvent.dataTransfer.files;
                if (files.length > 0) {
                    $('#image')[0].files = files;
                    $('#image').trigger('change');
                }
            });

            // Form validation with better UX
            $('#imageUploadForm').on('submit', function(e) {
                var fileInput = $('#image')[0];
                if (fileInput && (!fileInput.files || fileInput.files.length === 0)) {
                    e.preventDefault();
                    alert('Please select an image file first!');
                    return false;
                }
                return true; // Allow normal form submission
            });
            
            // Handle other forms normally
            $('form:not([action="partials/_manageProfile.php"])').on('submit', function(e) {
                var submitBtn = $(this).find('button[type="submit"]');
                var originalText = submitBtn.html();
                
                // Show loading state
                submitBtn.prop('disabled', true);
                submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Processing...');
                
                // Reset after 3 seconds if form doesn't actually submit
                setTimeout(function() {
                    submitBtn.prop('disabled', false);
                    submitBtn.html(originalText);
                }, 3000);
            });

            // Real-time form validation
            $('#email').on('blur', function() {
                var email = $(this).val();
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                
                if (!emailRegex.test(email) && email !== '') {
                    $(this).addClass('is-invalid');
                    $(this).after('<div class="invalid-feedback">Please enter a valid email address</div>');
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).next('.invalid-feedback').remove();
                }
            });

            $('#phone').on('input', function() {
                var phone = $(this).val();
                // Only allow numbers
                $(this).val(phone.replace(/[^0-9]/g, ''));
                
                if (phone.length < 10 && phone.length > 0) {
                    $(this).addClass('is-invalid');
                    if (!$(this).next('.invalid-feedback').length) {
                        $(this).after('<div class="invalid-feedback">Phone number must be 10 digits</div>');
                    }
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).next('.invalid-feedback').remove();
                }
            });

            // Password strength indicator
            $('#password').on('input', function() {
                var password = $(this).val();
                var strength = 0;
                
                if (password.length >= 4) strength++;
                if (password.length >= 8) strength++;
                if (/[A-Z]/.test(password)) strength++;
                if (/[0-9]/.test(password)) strength++;
                if (/[^A-Za-z0-9]/.test(password)) strength++;
                
                // Remove existing strength indicator
                $(this).next('.password-strength').remove();
                
                if (password.length > 0) {
                    var strengthText = '';
                    var strengthClass = '';
                    
                    switch(strength) {
                        case 1:
                            strengthText = 'Weak Password';
                            strengthClass = 'text-danger';
                            break;
                        case 2:
                            strengthText = 'Fair Password';
                            strengthClass = 'text-warning';
                            break;
                        case 3:
                            strengthText = 'Good Password';
                            strengthClass = 'text-info';
                            break;
                        case 4:
                        case 5:
                            strengthText = 'Strong Password';
                            strengthClass = 'text-success';
                            break;
                        default:
                            strengthText = 'Very Weak Password';
                            strengthClass = 'text-danger';
                    }
                    
                    $(this).after('<small class="password-strength ' + strengthClass + '">' + strengthText + '</small>');
                }
            });

            // Smooth animations for stat cards
            $('.stat-card').each(function(index) {
                $(this).css('animation-delay', (index * 0.1) + 's');
                $(this).addClass('fade-in');
            });

            // Tooltip for disabled username field
            $('#username').tooltip({
                title: 'Username is permanent and cannot be changed for security reasons',
                placement: 'top'
            });

            // Auto-save draft functionality (optional)
            var autoSaveTimer;
            $('.form-control').on('input', function() {
                clearTimeout(autoSaveTimer);
                autoSaveTimer = setTimeout(function() {
                    // Save form data to localStorage as draft
                    var formData = {};
                    $('.form-control').each(function() {
                        if ($(this).attr('name') && !$(this).is(':disabled')) {
                            formData[$(this).attr('name')] = $(this).val();
                        }
                    });
                    localStorage.setItem('profileDraft', JSON.stringify(formData));
                    
                    // Show draft saved indicator
                    if (!$('.draft-indicator').length) {
                        $('.section-title').after('<small class="text-muted draft-indicator"><i class="fas fa-check-circle"></i> Draft saved</small>');
                        setTimeout(function() {
                            $('.draft-indicator').fadeOut();
                        }, 2000);
                    }
                }, 2000);
            });

            // Load draft on page load
            var savedDraft = localStorage.getItem('profileDraft');
            if (savedDraft) {
                try {
                    var draftData = JSON.parse(savedDraft);
                    Object.keys(draftData).forEach(function(key) {
                        $('[name="' + key + '"]').val(draftData[key]);
                    });
                } catch(e) {
                    // Invalid draft data, remove it
                    localStorage.removeItem('profileDraft');
                }
            }

            // Clear draft on successful form submission
            $('form').on('submit', function() {
                localStorage.removeItem('profileDraft');
            });
            
            // Auto-refresh profile image ketika ada update
            function checkForProfileImageUpdate() {
                if(sessionStorage.getItem('profileImageUpdated') === 'true') {
                    sessionStorage.removeItem('profileImageUpdated');
                    
                    // Force refresh profile image dengan timestamp baru
                    var profileImg = $('.profile-picture');
                    if(profileImg.length > 0) {
                        var src = profileImg.attr('src');
                        var baseSrc = src.split('?')[0];
                        var newSrc = baseSrc + '?t=' + Date.now();
                        profileImg.attr('src', newSrc);
                        
                        // Also update any other profile images on the page
                        $('img[src*="person-<?php echo $userId; ?>"]').each(function() {
                            var imgSrc = $(this).attr('src');
                            var imgBaseSrc = imgSrc.split('?')[0];
                            $(this).attr('src', imgBaseSrc + '?t=' + Date.now());
                        });
                    }
                }
            }
            
            // Check immediately and then periodically
            checkForProfileImageUpdate();
            setInterval(checkForProfileImageUpdate, 1000); // Check every second
            
            // Also check when page gains focus
            $(window).on('focus', function() {
                checkForProfileImageUpdate();
            });
        });
    </script>
</body>
</html>


