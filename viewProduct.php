<?php
session_start(); // Start session first, before any output
include 'partials/_dbconnect.php'; // Database connection
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title id=title>Product</title>
    <link rel = "icon" href ="img/sportware-logo.jpeg" type = "image/x-icon">
    <style>
        /* Simple E-commerce Product View */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding-top: 70px;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Simple Breadcrumb */
        .breadcrumb-nav {
            background: white;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            font-size: 14px;
        }

        .breadcrumb-nav a {
            color: #666;
            text-decoration: none;
        }

        .breadcrumb-nav a:hover {
            color: #007bff;
        }

        .breadcrumb-nav .active {
            color: #007bff;
            font-weight: 500;
        }

        /* Main Product Container */
        .product-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-bottom: 30px;
        }

        /* Product Image Section */
        .product-image-section {
            background: #f8f9fa;
            padding: 40px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }

        .product-image {
            max-width: 100%;
            max-height: 400px;
            width: auto;
            height: auto;
            border-radius: 8px;
            transition: transform 0.3s ease;
            cursor: zoom-in;
        }

        .product-image:hover {
            transform: scale(1.03);
        }

        /* Product Details Section */
        .product-info {
            padding: 30px;
        }

        .product-name {
            font-size: 28px;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        /* Simple Star Rating */
        .rating-section {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }

        .stars {
            display: flex;
            gap: 2px;
        }

        .star {
            color: #ffc107;
            font-size: 18px;
        }

        .star.empty {
            color: #ddd;
        }

        .rating-info {
            color: #666;
            font-size: 14px;
        }

        /* Price Section */
        .price-section {
            margin-bottom: 25px;
        }

        .current-price {
            font-size: 32px;
            font-weight: 700;
            color: #e74c3c;
            margin-bottom: 5px;
        }

        .price-note {
            background: #e8f5e8;
            color: #28a745;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
            text-transform: uppercase;
        }

        /* Product Description */
        .description-section {
            margin-bottom: 30px;
        }

        .description-title {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .description-text {
            color: #666;
            line-height: 1.6;
            font-size: 15px;
        }

        /* Action Buttons */
        .action-section {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .btn-simple {
            padding: 12px 24px;
            border-radius: 6px;
            border: none;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            justify-content: center;
        }

        .btn-primary {
            background: #007bff;
            color: white;
            flex: 1;
            min-width: 200px;
        }

        .btn-primary:hover {
            background: #0056b3;
            transform: translateY(-1px);
            color: white;
            text-decoration: none;
        }

        .btn-outline {
            background: white;
            color: #dc3545;
            border: 2px solid #dc3545;
            padding: 10px 20px;
        }

        .btn-outline:hover {
            background: #dc3545;
            color: white;
        }

        /* Features Section */
        .features-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .feature-item {
            text-align: center;
            padding: 15px;
        }

        .feature-icon {
            font-size: 24px;
            color: #007bff;
            margin-bottom: 10px;
        }

        .feature-title {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .feature-desc {
            font-size: 12px;
            color: #666;
        }

        /* Reviews Section */
        .reviews-section {
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid #eee;
        }

        .reviews-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .reviews-title {
            font-size: 20px;
            font-weight: 600;
            color: #333;
        }

        .reviews-summary {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #666;
            font-size: 14px;
        }

        .review-item {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            border-left: 3px solid #007bff;
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
        }

        .reviewer-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .reviewer-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(45deg, #007bff, #0056b3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 16px;
        }

        .reviewer-details h6 {
            margin: 0;
            font-size: 14px;
            font-weight: 600;
            color: #333;
        }

        .reviewer-details small {
            color: #666;
            font-size: 12px;
        }

        .review-rating {
            display: flex;
            gap: 2px;
        }

        .review-rating .star {
            color: #ffc107;
            font-size: 14px;
        }

        .review-rating .star.empty {
            color: #ddd;
        }

        .review-text {
            color: #555;
            line-height: 1.6;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .review-helpful {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 12px;
            color: #666;
        }

        .helpful-btn {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            padding: 0;
            text-decoration: none;
        }

        .helpful-btn:hover {
            text-decoration: underline;
        }

        .show-more-reviews {
            text-align: center;
            margin-top: 20px;
        }

        .show-more-btn {
            background: white;
            border: 2px solid #007bff;
            color: #007bff;
            padding: 10px 24px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .show-more-btn:hover {
            background: #007bff;
            color: white;
        }

        /* Related Products Section */
        .related-products-section {
            margin: 40px 0;
        }

        .section-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 30px;
            color: #333;
            text-align: center;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, #d4a574, #b8956a);
            border-radius: 2px;
        }

        .related-products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 35px;
        }

        .related-product-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            position: relative;
            border: 1px solid #e9ecef;
        }

        .related-product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(212, 165, 116, 0.2);
            border-color: #d4a574;
        }

        .related-product-image {
            position: relative;
            height: 220px;
            overflow: hidden;
            background: #f8f9fa;
        }

        .related-product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .related-product-card:hover .related-product-image img {
            transform: scale(1.05);
        }

        .related-product-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .related-product-card:hover .related-product-overlay {
            opacity: 1;
        }

        .quick-view-btn {
            background: #d4a574;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            transform: translateY(10px);
        }

        .related-product-card:hover .quick-view-btn {
            transform: translateY(0);
            background: #b8956a;
        }

        .quick-view-btn:hover {
            background: #a0845a;
            transform: translateY(-2px);
        }

        .related-product-info {
            padding: 20px;
        }

        .related-product-name {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .related-product-rating {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
        }

        .related-product-rating i {
            color: #f39c12;
            font-size: 14px;
        }

        .related-product-rating .rating-text {
            font-size: 12px;
            color: #666;
            margin-left: 4px;
        }

        .related-product-price {
            font-size: 18px;
            font-weight: 700;
            color: #d4a574;
            margin-bottom: 15px;
        }

        .related-product-actions {
            display: flex;
            gap: 10px;
        }

        .view-product-btn {
            flex: 1;
            background: #d4a574;
            color: white;
            border: none;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .view-product-btn:hover {
            background: #b8956a;
            color: white;
            text-decoration: none;
            transform: translateY(-1px);
        }

        .related-product-name {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .related-product-price {
            font-size: 18px;
            font-weight: 700;
            color: #d4a574;
            margin-bottom: 15px;
        }

        .related-product-rating {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 15px;
        }

        .related-product-rating .stars {
            display: flex;
            gap: 2px;
        }

        .related-product-rating .rating-text {
            font-size: 12px;
            color: #666;
        }

        .related-product-actions {
            display: flex;
            gap: 10px;
        }

        .add-to-cart-btn-small {
            flex: 1;
            background: #d4a574;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .add-to-cart-btn-small:hover {
            background: #b8956a;
            transform: translateY(-1px);
        }

        .add-to-wishlist-btn {
            background: white;
            border: 2px solid #d4a574;
            color: #d4a574;
            width: 44px;
            height: 44px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .add-to-wishlist-btn:hover {
            background: #d4a574;
            color: white;
        }

        /* Quick View Modal */
        .quick-view-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.8);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            padding: 20px;
        }

        .quick-view-content {
            background: white;
            border-radius: 12px;
            max-width: 900px;
            max-height: 90vh;
            width: 90%;
            overflow-y: auto;
            position: relative;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .quick-view-close {
            position: absolute;
            top: 15px;
            right: 20px;
            background: none;
            border: none;
            font-size: 28px;
            cursor: pointer;
            color: #666;
            z-index: 1;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.2s ease;
        }

        .quick-view-close:hover {
            background: #f8f9fa;
            color: #333;
        }

        .quick-view-body {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            padding: 30px;
        }

        .quick-view-image {
            text-align: center;
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
        }

        .quick-view-image img {
            max-width: 100%;
            max-height: 300px;
            border-radius: 8px;
        }

        .quick-view-details h3 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #333;
        }

        .quick-view-rating {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 15px;
        }

        .quick-view-rating i {
            color: #f39c12;
            font-size: 16px;
        }

        .quick-view-rating .rating-text {
            color: #666;
            font-size: 14px;
        }

        .quick-view-price {
            font-size: 28px;
            font-weight: 700;
            color: #d4a574;
            margin-bottom: 20px;
        }

        .quick-view-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .quick-view-actions {
            display: flex;
            gap: 15px;
        }

        .quick-view-actions .add-to-cart-btn {
            flex: 1;
            background: #d4a574;
            color: white;
            border: none;
            padding: 15px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .quick-view-actions .add-to-cart-btn:hover {
            background: #b8956a;
            transform: translateY(-1px);
        }

        .quick-view-actions .view-details-btn {
            background: white;
            border: 2px solid #d4a574;
            color: #d4a574;
            padding: 15px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .quick-view-actions .view-details-btn:hover {
            background: #d4a574;
            color: white;
            text-decoration: none;
        };
            max-height: 90vh;
            width: 90%;
            overflow-y: auto;
            position: relative;
        }

        .quick-view-close {
            position: absolute;
            top: 15px;
            right: 20px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #666;
            z-index: 1;
        }

        .quick-view-body {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            padding: 30px;
        }

        .quick-view-image {
            text-align: center;
        }

        .quick-view-image img {
            max-width: 100%;
            border-radius: 8px;
        }

        .quick-view-details h3 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #333;
        }

        .quick-view-price {
            font-size: 28px;
            font-weight: 700;
            color: #007bff;
            margin-bottom: 20px;
        }

        .quick-view-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .quick-view-actions {
            display: flex;
            gap: 15px;
        }

        .quick-view-actions .add-to-cart-btn {
            flex: 1;
            background: #007bff;
            color: white;
            border: none;
            padding: 15px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .quick-view-actions .view-details-btn {
            background: white;
            border: 2px solid #007bff;
            color: #007bff;
            padding: 15px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .quick-view-actions .view-details-btn:hover {
            background: #007bff;
            color: white;
            text-decoration: none;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .product-image-section {
                padding: 20px;
            }

            .product-info {
                padding: 20px;
            }

            .product-name {
                font-size: 24px;
            }

            .current-price {
                font-size: 28px;
            }

            .action-section {
                flex-direction: column;
            }

            .btn-simple {
                width: 100%;
                min-width: auto;
            }

            .features-grid {
                grid-template-columns: 1fr 1fr;
                gap: 15px;
            }

            /* Related Products Mobile */
            .related-products-section {
                margin: 30px 0;
            }

            .section-title {
                font-size: 24px;
                margin-bottom: 25px;
            }

            .related-products-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 20px;
                margin-top: 25px;
            }

            .related-product-image {
                height: 180px;
            }

            .quick-view-btn {
                padding: 10px 16px;
                font-size: 13px;
            }

            /* Quick View Modal Mobile */
            .quick-view-content {
                width: 95%;
                max-width: 500px;
                margin: 20px;
            }

            .quick-view-body {
                grid-template-columns: 1fr;
                gap: 20px;
                padding: 20px;
            }

            .quick-view-image {
                padding: 15px;
            }

            .quick-view-details h3 {
                font-size: 20px;
            }

            .quick-view-price {
                font-size: 24px;
            }

            .quick-view-actions {
                flex-direction: column;
                gap: 12px;
            }

            .quick-view-actions .add-to-cart-btn,
            .quick-view-actions .view-details-btn {
                width: 100%;
                padding: 12px 20px;
            }
        }

        @media (max-width: 480px) {
            .related-products-grid {
                grid-template-columns: 1fr;
            }

            .related-product-card {
                max-width: 100%;
            }
        }

        /* Loading state */
        .btn-loading {
            opacity: 0.7;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <?php require 'partials/_nav.php' ?>

    <div class="container my-4" id="cont">
        <!-- Breadcrumb Navigation -->
        <nav class="breadcrumb-nav">
            <a href="index.php"><i class="fas fa-home"></i> Home</a>
            <span class="mx-2">/</span>
            <a href="about.php">Products</a>
            <span class="mx-2">/</span>
            <span class="active" id="breadcrumb-product">Product Details</span>
        </nav>

        <div class="product-container">
        <?php
            $productId = $_GET['prodid'];
            $sql = "SELECT * FROM `product` WHERE productId = $productId";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $productName = $row['productName'];
            $productPrice = $row['productPrice'];
            $productDesc = $row['productDesc'];
            $productCategorieId = $row['productCategorieId'];
            
            // Generate random rating between 4.0-5.0
            $rating = number_format(rand(40, 50) / 10, 1);
            $fullStars = floor($rating);
            $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;
            $emptyStars = 5 - $fullStars - $halfStar;
        ?>
        <script> 
            document.getElementById("title").innerHTML = "<?php echo $productName; ?>"; 
            document.getElementById("breadcrumb-product").innerHTML = "<?php echo $productName; ?>";
        </script> 
        
        <!-- Product Image Section -->
        <div class="product-image-section">
            <img src="img/product-<?php echo $productId; ?>.jpg" class="product-image" alt="<?php echo $productName; ?>">
        </div>
        
        <!-- Product Info Section -->
        <div class="product-info">
            <h1 class="product-name"><?php echo $productName; ?></h1>
            
            <!-- Rating -->
            <div class="rating-section">
                <div class="stars">
                    <?php
                    // Display full stars
                    for($i = 0; $i < $fullStars; $i++) {
                        echo '<i class="fas fa-star star"></i>';
                    }
                    // Display half star
                    if($halfStar) {
                        echo '<i class="fas fa-star-half-alt star"></i>';
                    }
                    // Display empty stars
                    for($i = 0; $i < $emptyStars; $i++) {
                        echo '<i class="far fa-star star empty"></i>';
                    }
                    ?>
                </div>
                <span class="rating-info"><?php echo $rating; ?>/5.0 • <?php echo rand(50, 200); ?> reviews</span>
            </div>
            
            <!-- Price -->
            <div class="price-section">
                <div class="current-price">Rp<?php echo number_format($productPrice * 1000, 0, ',', '.'); ?></div>
                <span class="price-note">Best Price Guarantee</span>
            </div>
            
            <!-- Description -->
            <div class="description-section">
                <div class="description-title">About this product</div>
                <div class="description-text"><?php echo $productDesc; ?></div>
            </div>

            <!-- Action Buttons -->
            <div class="action-section">
                <?php
                if($loggedin){
                    $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE productId = '$productId' AND `userId`='$userId'";
                    $quaresult = mysqli_query($conn, $quaSql);
                    $quaExistRows = mysqli_num_rows($quaresult);
                    
                    if($quaExistRows == 0) {
                        echo '<form action="partials/_manageCart.php" method="POST" style="flex: 1;">
                              <input type="hidden" name="itemId" value="'.$productId. '">
                              <button type="submit" name="addToCart" class="btn-simple btn-primary">
                                  <i class="fas fa-shopping-cart"></i> Add to Cart
                              </button>
                              </form>';
                    } else {
                        echo '<a href="viewCart.php" style="flex: 1;">
                              <button class="btn-simple btn-primary" style="width: 100%;">
                                  <i class="fas fa-shopping-bag"></i> Go to Cart
                              </button>
                              </a>';
                    }
                    
                    // Add to Wishlist button
                    echo '<form action="partials/_manageWishlist.php" method="POST">
                          <input type="hidden" name="itemId" value="'.$productId. '">
                          <button type="submit" name="addToWishlist" class="btn-simple btn-outline">
                              <i class="fas fa-heart"></i>
                          </button>
                          </form>';
                } else {
                    echo '<button class="btn-simple btn-primary" data-toggle="modal" data-target="#loginModal">
                          <i class="fas fa-shopping-cart"></i> Add to Cart
                          </button>
                          <button class="btn-simple btn-outline" data-toggle="modal" data-target="#loginModal">
                              <i class="fas fa-heart"></i>
                          </button>';
                }
                ?>
            </div>
            
            <!-- Features Section -->
            <div class="features-section">
                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="feature-title">Fast Delivery</div>
                        <div class="feature-desc">2-3 business days</div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="feature-title">Secure Payment</div>
                        <div class="feature-desc">100% Protected</div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-undo-alt"></i>
                        </div>
                        <div class="feature-title">Easy Returns</div>
                        <div class="feature-desc">30-day return policy</div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-medal"></i>
                        </div>
                        <div class="feature-title">Quality Assured</div>
                        <div class="feature-desc">Premium quality</div>
                    </div>
                </div>
            </div>

            <!-- Reviews Section -->
            <div class="reviews-section">
                <div class="reviews-header">
                    <h3 class="reviews-title">Customer Reviews</h3>
                    <div class="reviews-summary">
                        <div class="stars">
                            <?php
                            // Display the same rating as above
                            for($i = 0; $i < $fullStars; $i++) {
                                echo '<i class="fas fa-star star"></i>';
                            }
                            if($halfStar) {
                                echo '<i class="fas fa-star-half-alt star"></i>';
                            }
                            for($i = 0; $i < $emptyStars; $i++) {
                                echo '<i class="far fa-star star empty"></i>';
                            }
                            ?>
                        </div>
                        <span><?php echo $rating; ?> out of 5 • <?php echo rand(50, 200); ?> reviews</span>
                    </div>
                </div>

                <!-- Review Items -->
                <div class="review-item">
                    <div class="review-header">
                        <div class="reviewer-info">
                            <div class="reviewer-avatar">B</div>
                            <div class="reviewer-details">
                                <h6>Basgong Basmah Gong Xi Fa Cai</h6>
                                <small>Verified Purchase • 2 weeks ago</small>
                            </div>
                        </div>
                        <div class="review-rating">
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                        </div>
                    </div>
                    <div class="review-text">
                        Produk sangat berkualitas! Kualitas bahan sangat bagus dan sesuai dengan deskripsi. Pengiriman juga cepat, hanya 2 hari sampai. Highly recommended!
                    </div>
                    <div class="review-helpful">
                        <button class="helpful-btn">👍 Helpful (12)</button>
                        <span>|</span>
                        <button class="helpful-btn">Reply</button>
                    </div>
                </div>

                <div class="review-item">
                    <div class="review-header">
                        <div class="reviewer-info">
                            <div class="reviewer-avatar">R</div>
                            <div class="reviewer-details">
                                <h6>Ryan Tsany Jamed Kuproy</h6>
                                <small>Verified Purchase • 1 month ago</small>
                            </div>
                        </div>
                        <div class="review-rating">
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                            <i class="far fa-star star empty"></i>
                        </div>
                    </div>
                    <div class="review-text">
                        Overall bagus, tapi ada sedikit cacat pada packaging. Untungnya produknya sendiri tidak ada masalah. Untuk harga segini cukup worth it.
                    </div>
                    <div class="review-helpful">
                        <button class="helpful-btn">👍 Helpful (8)</button>
                        <span>|</span>
                        <button class="helpful-btn">Reply</button>
                    </div>
                </div>

                <div class="review-item">
                    <div class="review-header">
                        <div class="reviewer-info">
                            <div class="reviewer-avatar">H</div>
                            <div class="reviewer-details">
                                <h6>Hqhqhqhq</h6>
                                <small>Verified Purchase • 3 weeks ago</small>
                            </div>
                        </div>
                        <div class="review-rating">
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                        </div>
                    </div>
                    <div class="review-text">
                        Excellent quality! Sudah order 3x dari toko ini, kualitas selalu konsisten. Customer service juga responsif. Pasti akan order lagi!
                    </div>
                    <div class="review-helpful">
                        <button class="helpful-btn">👍 Helpful (15)</button>
                        <span>|</span>
                        <button class="helpful-btn">Reply</button>
                    </div>
                </div>

                <!-- Show More Reviews Button -->
                <div class="show-more-reviews">
                    <button class="show-more-btn" onclick="showMoreReviews()">
                        <i class="fas fa-chevron-down"></i> Show More Reviews
                    </button>
                </div>
            </div>
        </div>
        </div>

        <!-- Related Products Section -->
        <div class="related-products-section">
            <h3 class="section-title">Related Products</h3>
            <div class="related-products-grid">
                <?php
                // Get related products from the same category
                $relatedSql = "SELECT * FROM `product` WHERE productCategorieId = '$productCategorieId' AND productId != '$productId' ORDER BY RAND() LIMIT 4";
                $relatedResult = mysqli_query($conn, $relatedSql);
                
                if(mysqli_num_rows($relatedResult) > 0) {
                    while($relatedRow = mysqli_fetch_assoc($relatedResult)) {
                        $relatedId = $relatedRow['productId'];
                        $relatedName = $relatedRow['productName'];
                        $relatedPrice = $relatedRow['productPrice'];
                        $relatedDesc = $relatedRow['productDesc'];
                        
                        // Generate random rating for related products
                        $relatedRating = number_format(rand(35, 50) / 10, 1);
                        $relatedFullStars = floor($relatedRating);
                        $relatedHalfStar = ($relatedRating - $relatedFullStars) >= 0.5 ? 1 : 0;
                        $relatedEmptyStars = 5 - $relatedFullStars - $relatedHalfStar;
                        ?>
                        <div class="related-product-card">
                            <div class="related-product-image">
                                <img src="img/product-<?php echo $relatedId; ?>.jpg" alt="<?php echo $relatedName; ?>">
                                <div class="related-product-overlay">
                                    <button class="quick-view-btn" onclick="openQuickView(<?php echo $relatedId; ?>, '<?php echo addslashes($relatedName); ?>', <?php echo $relatedPrice; ?>, '<?php echo addslashes($relatedDesc); ?>', <?php echo $relatedRating; ?>)">
                                        <i class="fas fa-eye"></i> Quick View
                                    </button>
                                </div>
                            </div>
                            <div class="related-product-info">
                                <h4 class="related-product-name"><?php echo $relatedName; ?></h4>
                                <div class="related-product-rating">
                                    <?php
                                    for($i = 0; $i < $relatedFullStars; $i++) {
                                        echo '<i class="fas fa-star"></i>';
                                    }
                                    if($relatedHalfStar) {
                                        echo '<i class="fas fa-star-half-alt"></i>';
                                    }
                                    for($i = 0; $i < $relatedEmptyStars; $i++) {
                                        echo '<i class="far fa-star"></i>';
                                    }
                                    ?>
                                    <span class="rating-text">(<?php echo $relatedRating; ?>)</span>
                                </div>
                                <div class="related-product-price">Rp<?php echo number_format($relatedPrice * 1000, 0, ',', '.'); ?></div>
                                <div class="related-product-actions">
                                    <a href="viewProduct.php?prodid=<?php echo $relatedId; ?>" class="view-product-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    // If no related products from same category, show random products
                    $randomSql = "SELECT * FROM `product` WHERE productId != '$productId' ORDER BY RAND() LIMIT 4";
                    $randomResult = mysqli_query($conn, $randomSql);
                    
                    while($randomRow = mysqli_fetch_assoc($randomResult)) {
                        $randomId = $randomRow['productId'];
                        $randomName = $randomRow['productName'];
                        $randomPrice = $randomRow['productPrice'];
                        $randomDesc = $randomRow['productDesc'];
                        
                        // Generate random rating for random products
                        $randomRating = number_format(rand(35, 50) / 10, 1);
                        $randomFullStars = floor($randomRating);
                        $randomHalfStar = ($randomRating - $randomFullStars) >= 0.5 ? 1 : 0;
                        $randomEmptyStars = 5 - $randomFullStars - $randomHalfStar;
                        ?>
                        <div class="related-product-card">
                            <div class="related-product-image">
                                <img src="img/product-<?php echo $randomId; ?>.jpg" alt="<?php echo $randomName; ?>">
                                <div class="related-product-overlay">
                                    <button class="quick-view-btn" onclick="openQuickView(<?php echo $randomId; ?>, '<?php echo addslashes($randomName); ?>', <?php echo $randomPrice; ?>, '<?php echo addslashes($randomDesc); ?>', <?php echo $randomRating; ?>)">
                                        <i class="fas fa-eye"></i> Quick View
                                    </button>
                                </div>
                            </div>
                            <div class="related-product-info">
                                <h4 class="related-product-name"><?php echo $randomName; ?></h4>
                                <div class="related-product-rating">
                                    <?php
                                    for($i = 0; $i < $randomFullStars; $i++) {
                                        echo '<i class="fas fa-star"></i>';
                                    }
                                    if($randomHalfStar) {
                                        echo '<i class="fas fa-star-half-alt"></i>';
                                    }
                                    for($i = 0; $i < $randomEmptyStars; $i++) {
                                        echo '<i class="far fa-star"></i>';
                                    }
                                    ?>
                                    <span class="rating-text">(<?php echo $randomRating; ?>)</span>
                                </div>
                                <div class="related-product-price">Rp<?php echo number_format($randomPrice * 1000, 0, ',', '.'); ?></div>
                                <div class="related-product-actions">
                                    <a href="viewProduct.php?prodid=<?php echo $randomId; ?>" class="view-product-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Quick View Modal -->
    <div class="quick-view-modal" id="quickViewModal">
        <div class="quick-view-content">
            <button class="quick-view-close" onclick="closeQuickView()">&times;</button>
            <div class="quick-view-body">
                <div class="quick-view-image">
                    <img id="quickViewImage" src="" alt="">
                </div>
                <div class="quick-view-details">
                    <h3 id="quickViewName"></h3>
                    <div class="quick-view-rating" id="quickViewRating"></div>
                    <div class="quick-view-price" id="quickViewPrice"></div>
                    <div class="quick-view-description" id="quickViewDescription"></div>
                    <div class="quick-view-actions">
                        <?php if($loggedin): ?>
                        <button class="add-to-cart-btn" id="quickViewAddToCart" onclick="addToCartQuickView()">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </button>
                        <?php else: ?>
                        <button class="add-to-cart-btn" data-toggle="modal" data-target="#loginModal">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </button>
                        <?php endif; ?>
                        <a href="#" class="view-details-btn" id="quickViewDetailsLink">View Full Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require 'partials/_footer.php' ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    
    <!-- Cart management script -->
    <script src="assets/js/cart.js"></script>
    
    <script>
        $(document).ready(function() {
            // Simple image zoom functionality
            $('.product-image').click(function() {
                const imgSrc = $(this).attr('src');
                const productName = $('.product-name').text();
                
                // Create simple modal for image zoom
                const modal = `
                    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content border-0" style="background: rgba(0,0,0,0.9);">
                                <div class="modal-body p-0 text-center">
                                    <button type="button" class="close text-white" data-dismiss="modal" style="position: absolute; top: 15px; right: 20px; z-index: 1000; font-size: 24px;">
                                        <span>&times;</span>
                                    </button>
                                    <img src="${imgSrc}" class="img-fluid" alt="${productName}" style="border-radius: 8px; max-height: 85vh;">
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                
                // Remove existing modal if any
                $('#imageModal').remove();
                
                // Add modal to body and show
                $('body').append(modal);
                $('#imageModal').modal('show');
                
                // Remove modal when hidden
                $('#imageModal').on('hidden.bs.modal', function() {
                    $(this).remove();
                });
            });

            // Simple button loading effect
            $('.btn-simple').click(function() {
                const $btn = $(this);
                const originalText = $btn.html();
                
                if (!$btn.hasClass('btn-loading')) {
                    $btn.addClass('btn-loading');
                    $btn.html('<i class="fas fa-spinner fa-spin"></i> Processing...');
                    
                    // Reset after 1.5 seconds
                    setTimeout(function() {
                        $btn.removeClass('btn-loading');
                        $btn.html(originalText);
                    }, 1500);
                }
            });

            // Helpful button interaction
            $('.helpful-btn').click(function(e) {
                e.preventDefault();
                const $btn = $(this);
                if ($btn.text().includes('Helpful')) {
                    const currentCount = parseInt($btn.text().match(/\d+/)[0]);
                    const newCount = currentCount + 1;
                    $btn.html(`👍 Helpful (${newCount})`);
                    $btn.css('color', '#28a745');
                }
            });

            // Smooth scroll to top
            $('html, body').animate({ scrollTop: 0 }, 200);
        });

        // Show More Reviews functionality
        function showMoreReviews() {
            const additionalReviews = `
                <div class="review-item" style="display: none;">
                    <div class="review-header">
                        <div class="reviewer-info">
                            <div class="reviewer-avatar">D</div>
                            <div class="reviewer-details">
                                <h6>Dava Ganteng</h6>
                                <small>Verified Purchase • 1 week ago</small>
                            </div>
                        </div>
                        <div class="review-rating">
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star-half-alt star"></i>
                        </div>
                    </div>
                    <div class="review-text">
                        Produk bagus dan sesuai ekspektasi. Packaging rapi dan aman. Akan recommend ke teman-teman.
                    </div>
                    <div class="review-helpful">
                        <button class="helpful-btn">👍 Helpful (5)</button>
                        <span>|</span>
                        <button class="helpful-btn">Reply</button>
                    </div>
                </div>

                <div class="review-item" style="display: none;">
                    <div class="review-header">
                        <div class="reviewer-info">
                            <div class="reviewer-avatar">A</div>
                            <div class="reviewer-details">
                                <h6>Andris Love Ryan</h6>
                                <small>Verified Purchase • 4 days ago</small>
                            </div>
                        </div>
                        <div class="review-rating">
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                        </div>
                    </div>
                    <div class="review-text">
                        Top quality! Sudah 2 minggu pakai, masih bagus seperti baru. Worth every penny!
                    </div>
                    <div class="review-helpful">
                        <button class="helpful-btn">👍 Helpful (9)</button>
                        <span>|</span>
                        <button class="helpful-btn">Reply</button>
                    </div>
                </div>
            `;
            
            // Add additional reviews before the show more button
            $('.show-more-reviews').before(additionalReviews);
            
            // Animate the new reviews
            $('.review-item:hidden').slideDown(300);
            
            // Hide the show more button and show a "show less" option
            $('.show-more-btn').html('<i class="fas fa-chevron-up"></i> Show Less Reviews').attr('onclick', 'showLessReviews()');
        }

        function showLessReviews() {
            // Hide the additional reviews
            $('.review-item').slice(3).slideUp(300, function() {
                $(this).remove();
            });
            
            // Reset the button
            $('.show-more-btn').html('<i class="fas fa-chevron-down"></i> Show More Reviews').attr('onclick', 'showMoreReviews()');
        }

        // Quick View functionality
        let currentQuickViewProductId = null;

        function openQuickView(productId, productName, productPrice, productDesc, rating) {
            currentQuickViewProductId = productId;
            
            // Set product image
            document.getElementById('quickViewImage').src = `img/product-${productId}.jpg`;
            document.getElementById('quickViewImage').alt = productName;
            
            // Set product details
            document.getElementById('quickViewName').textContent = productName;
            document.getElementById('quickViewPrice').textContent = `Rp${(productPrice * 1000).toLocaleString('id-ID')}`;
            document.getElementById('quickViewDescription').textContent = productDesc;
            
            // Set rating stars
            const fullStars = Math.floor(rating);
            const halfStar = (rating - fullStars) >= 0.5 ? 1 : 0;
            const emptyStars = 5 - fullStars - halfStar;
            
            let starsHtml = '';
            for(let i = 0; i < fullStars; i++) {
                starsHtml += '<i class="fas fa-star"></i>';
            }
            if(halfStar) {
                starsHtml += '<i class="fas fa-star-half-alt"></i>';
            }
            for(let i = 0; i < emptyStars; i++) {
                starsHtml += '<i class="far fa-star"></i>';
            }
            starsHtml += `<span class="rating-text">(${rating})</span>`;
            
            document.getElementById('quickViewRating').innerHTML = starsHtml;
            
            // Set view details link
            document.getElementById('quickViewDetailsLink').href = `viewProduct.php?prodid=${productId}`;
            
            // Show modal
            document.getElementById('quickViewModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeQuickView() {
            document.getElementById('quickViewModal').style.display = 'none';
            document.body.style.overflow = 'auto';
            currentQuickViewProductId = null;
        }

        function addToCartQuickView() {
            if (!currentQuickViewProductId) return;
            
            // Show loading state
            const button = document.getElementById('quickViewAddToCart');
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Adding...';
            button.disabled = true;
            
            // Use AJAX to add to cart
            $.ajax({
                url: 'partials/_manageCart.php',
                method: 'POST',
                data: {
                    addToCart: true,
                    itemId: currentQuickViewProductId
                },
                dataType: 'json',
                success: function(response) {
                    if(response.success) {
                        // Update cart count
                        updateCartCount();
                        
                        // Show success message
                        button.innerHTML = '<i class="fas fa-check"></i> Added!';
                        button.style.backgroundColor = '#28a745';
                        
                        // Reset button after 2 seconds
                        setTimeout(function() {
                            button.innerHTML = originalText;
                            button.disabled = false;
                            button.style.backgroundColor = '';
                        }, 2000);
                        
                        // Trigger localStorage event for other tabs
                        localStorage.setItem('cartUpdated', Date.now());
                    } else {
                        alert(response.message || 'Item already in cart');
                        button.innerHTML = originalText;
                        button.disabled = false;
                    }
                },
                error: function() {
                    // Fallback to regular form submission
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = 'partials/_manageCart.php';
                    
                    const itemIdInput = document.createElement('input');
                    itemIdInput.type = 'hidden';
                    itemIdInput.name = 'itemId';
                    itemIdInput.value = currentQuickViewProductId;
                    
                    const addToCartInput = document.createElement('input');
                    addToCartInput.type = 'hidden';
                    addToCartInput.name = 'addToCart';
                    addToCartInput.value = '1';
                    
                    form.appendChild(itemIdInput);
                    form.appendChild(addToCartInput);
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }

        // Close quick view when clicking outside
        document.getElementById('quickViewModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeQuickView();
            }
        });

        // Close quick view with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && document.getElementById('quickViewModal').style.display === 'flex') {
                closeQuickView();
            }
        });
    </script>
</body>
</html>