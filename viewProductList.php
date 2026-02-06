<?php
session_start(); // Start session first, before any output
include 'partials/_dbconnect.php'; // Database connection

// Get category info
$id = $_GET['catid'];
$sql = "SELECT * FROM `categories` WHERE categorieId = $id";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $catname = $row['categorieName'];
    $catdesc = $row['categorieDesc'];
}
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
    <title id="title">Category</title>
    <link rel = "icon" href ="img/sportware-logo.jpeg" type = "image/x-icon">
    <style>
        body {
            padding-top: 60px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
        }

        .page-title p {
            font-size: 1.1rem;
            margin-top: 12px;
            opacity: 0.9;
            position: relative;
            z-index: 2;
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
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        .product-card .card-img-top {
            height: 180px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover .card-img-top {
            transform: scale(1.05);
        }

        .product-card .card-body {
            padding: 18px;
        }

        .product-card .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: #2c3e50;
        }

        .product-price {
            font-size: 1.2rem;
            font-weight: 700;
            color: #e74c3c;
            margin-bottom: 12px;
        }

        .product-rating {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
            gap: 8px;
        }

        .stars {
            display: flex;
            gap: 2px;
        }

        .star {
            color: #ffd700;
            font-size: 1rem;
        }

        .star.empty {
            color: #ddd;
        }

        .star.half {
            position: relative;
            color: #ddd;
        }

        .star.half::before {
            content: '\f005';
            position: absolute;
            left: 0;
            color: #ffd700;
            width: 50%;
            overflow: hidden;
        }

        .rating-text {
            font-size: 0.85rem;
            color: #7f8c8d;
            font-weight: 500;
        }

        .product-card .card-text {
            color: #7f8c8d;
            font-size: 0.85rem;
            line-height: 1.4;
            margin-bottom: 15px;
        }

        .btn-group-custom {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: center;
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
        }

        .btn-cart {
            background: linear-gradient(45deg, #3498db, #2980b9);
            color: white;
        }

        .btn-cart:hover {
            background: linear-gradient(45deg, #2980b9, #1f6391);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
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
        }

        .no-products {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .no-products i {
            font-size: 4rem;
            color: #bdc3c7;
            margin-bottom: 20px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .filter-bar {
            background: white;
            padding: 20px 0;
            margin-bottom: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .filter-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .filter-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-label {
            font-weight: 600;
            color: #2c3e50;
            white-space: nowrap;
        }

        .filter-group .form-control {
            border: 2px solid #e0e6ed;
            border-radius: 8px;
            padding: 8px 15px;
            font-weight: 500;
            min-width: 200px;
            transition: all 0.3s ease;
        }

        .filter-group .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        @media (max-width: 768px) {
            .page-title h1 {
                font-size: 2.5rem;
            }
            
            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
                gap: 15px;
            }
            
            .btn-group-custom {
                flex-direction: column;
            }

            .filter-section {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-group {
                justify-content: space-between;
            }

            .filter-group .form-control {
                min-width: auto;
                flex: 1;
            }
        }
    </style>
</head>
<body>
    <?php require 'partials/_nav.php' ?>
  
    <!-- Hero Section -->
    <section class="page-title">
        <div class="container">
            <h1><i class="fas fa-tags"></i> <span id="catTitle"><?php echo $catname; ?></span></h1>
            <p><?php echo $catdesc; ?></p>
        </div>
    </section>

    <!-- Products Section -->
    <div class="container">
        <!-- Simple Sort Filter (only show if there are products) -->
        <?php
            $id = $_GET['catid'];
            $countSql = "SELECT COUNT(*) as product_count FROM `product` WHERE productCategorieId = $id";
            $countResult = mysqli_query($conn, $countSql);
            $countRow = mysqli_fetch_assoc($countResult);
            $productCount = $countRow['product_count'];
            
            if($productCount > 1) {
                echo '
                <div class="filter-bar">
                    <div class="container">
                        <div class="filter-section">
                            <div class="filter-group">
                                <span class="filter-label"><i class="fas fa-sort"></i> Sort By:</span>
                                <select id="sortSelect" class="form-control" style="width: auto; display: inline-block;">
                                    <option value="default">Default</option>
                                    <option value="name-asc">Name (A-Z)</option>
                                    <option value="name-desc">Name (Z-A)</option>
                                    <option value="price-asc">Price (Low to High)</option>
                                    <option value="price-desc">Price (High to Low)</option>
                                    <option value="rating-desc">Rating (High to Low)</option>
                                    <option value="rating-asc">Rating (Low to High)</option>
                                </select>
                            </div>
                            <div class="filter-group">
                                <span class="text-muted"><i class="fas fa-box"></i> ' . $productCount . ' Products Found</span>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        ?>

        <div class="product-grid">
        <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `product` WHERE productCategorieId = $id";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $productId = $row['productId'];
                $productName = $row['productName'];
                $productPrice = $row['productPrice'];
                $productDesc = $row['productDesc'];
            
                echo '<div class="product-card">
                        <img src="img/product-'.$productId. '.jpg" class="card-img-top" alt="'.htmlspecialchars($productName).'">
                        <div class="card-body">
                            <h5 class="card-title">' . htmlspecialchars($productName) . '</h5>
                            <div class="product-price">
                                <i class="fas fa-tag"></i> Rp ' . number_format($productPrice) . '.000
                            </div>
                            <p class="card-text">' . htmlspecialchars(substr($productDesc, 0, 80)) . '...</p>   
                            <div class="btn-group-custom">';
                            
                            if (isset($_SESSION['userId'])) {
                                $userId = $_SESSION['userId'];
                                
                                // Add to Cart Button
                                echo '<form action="partials/_manageCart.php" method="POST" style="display: inline;">
                                        <input type="hidden" name="itemId" value="'.$productId.'">
                                        <button type="submit" name="addToCart" class="btn btn-custom btn-cart">
                                            <i class="fas fa-shopping-cart"></i> Add to Cart
                                        </button>
                                      </form>';

                                // Add to Wishlist Button
                                echo '<form action="partials/_manageWishlist.php" method="POST" style="display: inline;">
                                        <input type="hidden" name="itemId" value="'.$productId.'">
                                        <button type="submit" name="addToWishlist" class="btn btn-custom btn-wishlist">';
        
                                        // Cek jika produk sudah ada di wishlist
                                        $checkSql = "SELECT * FROM `wishlist` WHERE `userId` = '$userId' AND `productId` = '$productId'";
                                        $checkResult = mysqli_query($conn, $checkSql);
                                        if (mysqli_num_rows($checkResult) > 0) {
                                            echo '<i class="fas fa-heart-broken"></i> Remove from Wishlist';
                                        } else {
                                            echo '<i class="fas fa-heart"></i> Add to Wishlist';
                                        }
                                echo '</button>
                                      </form>';
                            }
                            
                            // Quick View Button
                            echo '<a href="viewProduct.php?prodid=' . $productId . '" class="btn btn-custom btn-view">
                                    <i class="fas fa-eye"></i> Quick View
                                  </a>';  

                        echo '</div>
                        </div>
                    </div>';
            }
            if($noResult) {
                echo '<div class="no-products col-12">
                        <i class="fas fa-box-open"></i>
                        <h3>No Products Available</h3>
                        <p>Sorry, no products are available in this category. We will update soon!</p>
                      </div>';
            }
            ?>
        </div>
    </div>

    <?php require 'partials/_footer.php' ?>
    
    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    
    <!-- Cart management script -->
    <script src="assets/js/cart.js"></script>
    
    <script>
        // Function untuk menghasilkan rating bintang dengan support half star
        function generateStarRating(rating) {
            let stars = '';
            for (let i = 1; i <= 5; i++) {
                if (i <= Math.floor(rating)) {
                    // Bintang penuh
                    stars += '<i class="fas fa-star star"></i>';
                } else if (i === Math.ceil(rating) && rating % 1 !== 0) {
                    // Bintang setengah
                    stars += '<i class="fas fa-star star half"></i>';
                } else {
                    // Bintang kosong
                    stars += '<i class="fas fa-star star empty"></i>';
                }
            }
            return stars;
        }

        // Function untuk menghasilkan rating random untuk setiap produk
        function addRandomRatings() {
            $('.product-card').each(function() {
                // Generate rating random antara 4.0 - 5.0
                const ratingValue = (Math.random() * 1.0 + 4.0); // 4.0 - 5.0
                const ratingText = ratingValue.toFixed(1); // Format ke 1 desimal
                const reviewCount = Math.floor(Math.random() * 200 + 50); // 50 - 250 reviews (simulasi penjualan)
                
                const starHtml = generateStarRating(ratingValue);
                const ratingHtml = `
                    <div class="product-rating">
                        <div class="stars">${starHtml}</div>
                        <span class="rating-text">${ratingText} (${reviewCount} reviews)</span>
                    </div>
                `;
                
                // Insert rating setelah price
                $(this).find('.product-price').after(ratingHtml);
                
                // Store data untuk sorting (jika diperlukan nanti)
                $(this).attr('data-rating', ratingValue.toFixed(1));
                $(this).attr('data-reviews', reviewCount);
                
                // Extract price value
                const priceText = $(this).find('.product-price').text();
                const priceNumber = priceText.replace(/[^\d]/g, '');
                $(this).attr('data-price', parseInt(priceNumber));
                
                // Extract product name
                const productName = $(this).find('.card-title').text().toLowerCase().trim();
                $(this).attr('data-name', productName);
            });
        }

        // Function untuk mengurutkan produk berdasarkan pilihan
        function sortProducts(criteria) {
            const container = $('.product-grid');
            const products = container.find('.product-card');

            // Add fade effect
            products.fadeOut(200, function() {
                // Sort produk berdasarkan kriteria
                products.sort(function(a, b) {
                    let valueA, valueB;

                    // Ambil nilai yang akan dibandingkan berdasarkan kriteria
                    switch(criteria) {
                        case 'name-asc':
                            valueA = $(a).find('.card-title').text().toLowerCase();
                            valueB = $(b).find('.card-title').text().toLowerCase();
                            return valueA.localeCompare(valueB);
                        case 'name-desc':
                            valueA = $(a).find('.card-title').text().toLowerCase();
                            valueB = $(b).find('.card-title').text().toLowerCase();
                            return valueB.localeCompare(valueA);
                        case 'price-asc':
                            valueA = parseInt($(a).attr('data-price')) || 0;
                            valueB = parseInt($(b).attr('data-price')) || 0;
                            return valueA - valueB;
                        case 'price-desc':
                            valueA = parseInt($(a).attr('data-price')) || 0;
                            valueB = parseInt($(b).attr('data-price')) || 0;
                            return valueB - valueA;
                        case 'rating-desc':
                            valueA = parseFloat($(a).attr('data-rating')) || 0;
                            valueB = parseFloat($(b).attr('data-rating')) || 0;
                            return valueB - valueA;
                        case 'rating-asc':
                            valueA = parseFloat($(a).attr('data-rating')) || 0;
                            valueB = parseFloat($(b).attr('data-rating')) || 0;
                            return valueA - valueB;
                        default:
                            return 0;
                    }
                });

                // Append produk yang sudah diurutkan ke container dan fade in
                container.append(products);
                products.fadeIn(300);
            });
        }

        // Jalankan setelah dokumen ready
        $(document).ready(function() {
            // Add ratings to all products
            addRandomRatings();

            // Event listener for sort select change
            $('#sortSelect').on('change', function() {
                const selectedValue = $(this).val();
                sortProducts(selectedValue);
            });
        });
    </script>
</body>
</html>
