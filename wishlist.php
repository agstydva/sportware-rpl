<?php
session_start(); // Start session first, before any output
include 'partials/_dbconnect.php'; // Database connection
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Your Wishlist - Sportware</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="icon" href="img/sportware-logo.jpeg" type="image/x-icon">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    
    <style>
        body {
            padding-top: 60px;
            padding-bottom: 60px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .page-title {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 40px 0;
            margin-bottom: 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .page-title::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><polygon fill="rgba(255,255,255,0.1)" points="1000,100 1000,0 0,100"/></svg>');
            background-size: cover;
        }

        .page-title h1 {
            font-size: 2.8rem;
            font-weight: 700;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .page-title h1 i {
            font-size: 2.5rem;
            color: #e74c3c;
        }

        .page-title p {
            font-size: 1.1rem;
            margin-top: 12px;
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }

        .wishlist-stats {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            text-align: center;
        }

        .wishlist-stats h4 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .wishlist-stats p {
            color: #7f8c8d;
            margin: 0;
        }

        .product-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            overflow: hidden;
            margin-bottom: 20px;
            border: none;
            position: relative;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        .product-card .card-img-top {
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover .card-img-top {
            transform: scale(1.05);
        }

        .product-card .card-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            height: calc(100% - 200px);
        }

        .product-card .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: #2c3e50;
            line-height: 1.3;
        }

        .product-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: #e74c3c;
            margin-bottom: 12px;
        }

        .product-card .card-text {
            color: #7f8c8d;
            font-size: 0.9rem;
            line-height: 1.4;
            margin-bottom: 15px;
            flex-grow: 1;
        }

        .btn-group-custom {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: center;
            margin-top: auto;
        }

        .btn-custom {
            border-radius: 20px;
            padding: 6px 12px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border: none;
            position: relative;
            overflow: hidden;
            flex: 1;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            min-width: 80px;
        }

        .btn-cart {
            background: linear-gradient(45deg, #d4a574, #b8956a);
            color: white;
        }

        .btn-cart:hover {
            background: linear-gradient(45deg, #b8956a, #a0845a);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
            text-decoration: none;
        }

        .btn-wishlist {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
        }

        .btn-wishlist:hover {
            background: linear-gradient(45deg, #c0392b, #a93226);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }

        .btn-view {
            background: linear-gradient(45deg, #f39c12, #e67e22);
            color: white;
        }

        .btn-view:hover {
            background: linear-gradient(45deg, #e67e22, #d35400);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(243, 156, 18, 0.4);
            text-decoration: none;
        }

        .btn-remove-wishlist {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            border: none;
            border-radius: 20px;
            padding: 6px 12px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            width: 100%;
            margin-top: 8px;
        }

        .btn-remove-wishlist:hover {
            background: linear-gradient(45deg, #c0392b, #a93226);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }

        .btn-remove-wishlist i {
            margin-right: 8px;
        }

        .empty-wishlist {
            text-align: center;
            padding: 80px 20px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .empty-wishlist i {
            font-size: 5rem;
            color: #bdc3c7;
            margin-bottom: 30px;
        }

        .empty-wishlist h3 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .empty-wishlist p {
            color: #7f8c8d;
            margin-bottom: 30px;
            font-size: 1.1rem;
        }

        .btn-shop-now {
            background: linear-gradient(45deg, #d4a574, #b8956a);
            color: white;
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-shop-now:hover {
            background: linear-gradient(45deg, #b8956a, #a0845a);
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }

        .wishlist-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .page-title h1 {
                font-size: 2.2rem;
            }
            
            .page-title h1 i {
                font-size: 2rem;
            }
            
            .wishlist-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
            }
            
            .product-card .card-img-top {
                height: 180px;
            }

            .btn-custom {
                padding: 5px 8px;
                font-size: 0.7rem;
                min-width: 70px;
            }

            .btn-remove-wishlist {
                padding: 5px 10px;
                font-size: 0.7rem;
            }
        }

        @media (max-width: 576px) {
            .page-title h1 {
                font-size: 1.8rem;
                flex-direction: column;
                gap: 10px;
            }
            
            .wishlist-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .btn-group-custom {
                flex-direction: column;
                gap: 6px;
            }

            .btn-custom {
                padding: 8px 12px;
                font-size: 0.75rem;
                min-width: auto;
            }

            .btn-remove-wishlist {
                padding: 8px 12px;
                font-size: 0.75rem;
            }
        }

        /* Animation for wishlist removal */
        .removing {
            animation: fadeOut 0.5s ease-in-out;
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: scale(1);
            }
            to {
                opacity: 0;
                transform: scale(0.8);
            }
        }
    </style>
</head>
<body>
    <?php require 'partials/_nav.php' ?>
    
    <?php
    if (isset($_SESSION['userId'])) {
      $userId = $_SESSION['userId']; // Ambil userId dari session
    } else {
      echo '<div class="container mt-5">
              <div class="alert alert-danger text-center">
                <h4><i class="fas fa-exclamation-triangle"></i> Access Denied</h4>
                <p>Please log in to view your wishlist.</p>
              </div>
            </div>';
     exit;
    }

    $sql = "SELECT p.productId, p.productName, p.productPrice, p.productDesc FROM `wishlist` w JOIN `product` p ON w.productId = p.productId WHERE w.userId = '$userId'";
    $result = mysqli_query($conn, $sql);
    $itemCount = mysqli_num_rows($result);
    ?>

    <!-- Page Title Section -->
    <div class="page-title">
        <div class="container">
            <h1><i class="fas fa-heart"></i> Your Wishlist</h1>
            <p>Save your favorite items for later purchase</p>
        </div>
    </div>

    <div class="container">
        <!-- Wishlist Stats -->
        <div class="wishlist-stats">
            <h4><i class="fas fa-list"></i> Wishlist Summary</h4>
            <p>You have <strong><?php echo $itemCount; ?></strong> item<?php echo $itemCount != 1 ? 's' : ''; ?> in your wishlist</p>
        </div>

        <?php if ($itemCount > 0): ?>
            <!-- Products Grid -->
            <div class="wishlist-grid">
                <?php
                mysqli_data_seek($result, 0); // Reset result pointer
                while($row = mysqli_fetch_assoc($result)){
                    $productId = $row['productId'];
                    $productName = $row['productName'];
                    $productPrice = $row['productPrice'];
                    $productDesc = $row['productDesc'];

                    echo '<div class="product-card" id="wishlist-item-'.$productId.'">
                            <img src="img/product-'.$productId. '.jpg" class="card-img-top" alt="'.$productName.'" />
                            <div class="card-body">
                                <h5 class="card-title">' . htmlspecialchars($productName) . '</h5>
                                <div class="product-price">Rp ' . number_format($productPrice) . '.000</div>
                                <p class="card-text">' . htmlspecialchars(substr($productDesc, 0, 100)) . '...</p>   
                                <div class="btn-group-custom">
                                    <form action="partials/_manageCart.php" method="POST" style="flex: 1; margin: 0;">
                                        <input type="hidden" name="itemId" value="'.$productId.'">
                                        <button type="submit" name="addToCart" class="btn-custom btn-cart">
                                            Cart
                                        </button>
                                    </form>
                                    <a href="viewProduct.php?prodid='.$productId.'" class="btn-custom btn-view">
                                        View
                                    </a>
                                </div>
                                <form action="partials/_manageWishlist.php" method="POST" class="remove-form">
                                    <input type="hidden" name="itemId" value="'.$productId.'">
                                    <button type="submit" name="addToWishlist" class="btn-remove-wishlist">
                                        <i class="fas fa-heart-broken"></i>
                                        Remove from Wishlist
                                    </button>
                                </form>
                            </div>
                          </div>';
                }
                ?>
            </div>
        <?php else: ?>
            <!-- Empty Wishlist -->
            <div class="empty-wishlist">
                <i class="fas fa-heart-broken"></i>
                <h3>Your Wishlist is Empty</h3>
                <p>Looks like you haven't added anything to your wishlist yet. Start exploring our amazing products!</p>
                <a href="index.php" class="btn-shop-now">
                    <i class="fas fa-shopping-bag"></i> Start Shopping
                </a>
            </div>
        <?php endif; ?>
    </div>

    <?php require 'partials/_footer.php'; ?>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- Cart management script -->
    <script src="assets/js/cart.js"></script>

    <script>
        // Add smooth animation when removing items
        $(document).ready(function() {
            $('.remove-form').on('submit', function(e) {
                const form = $(this);
                const card = form.closest('.product-card');
                
                // Add removing animation
                card.addClass('removing');
                
                // Small delay to show animation before form submission
                setTimeout(function() {
                    // Form will submit normally after animation
                }, 300);
            });
        });
    </script>

</body>
</html>
