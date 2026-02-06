<?php
session_start(); // Mulai session terlebih dahulu
include 'partials/_dbconnect.php'; // Koneksi database

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>All Products</title>
    <link rel="icon" href="img/sportware-logo.jpeg" type="image/x-icon">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
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

        .category-header {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
            color: white;
            padding: 20px 0;
            margin: 40px 0 30px 0;
            text-align: center;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(255, 107, 107, 0.3);
            position: relative;
            overflow: hidden;
        }

        .category-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><polygon fill="rgba(255,255,255,0.1)" points="0,100 1000,0 1000,100"/></svg>');
            background-size: cover;
        }

        .category-header:first-of-type {
            margin-top: 0;
        }

        .category-header h2 {
            font-size: 2.2rem;
            font-weight: 700;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            position: relative;
            z-index: 2;
        }

        .category-header p {
            font-size: 1rem;
            margin: 10px 0 0 0;
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        /* Filter Bar Styling */
        .filter-bar {
            background: white;
            padding: 20px 0;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-top: 3px solid #2c3e50;
        }

        .filter-section {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 20px;
            justify-content: space-between;
        }

        .filter-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-label {
            font-weight: 600;
            color: #2c3e50;
            font-size: 0.9rem;
            margin-right: 5px;
        }

        .filter-select {
            padding: 8px 12px;
            border: 2px solid #e0e0e0;
            border-radius: 6px;
            background: white;
            color: #2c3e50;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
            min-width: 180px;
        }

        .filter-select:focus {
            outline: none;
            border-color: #2c3e50;
            box-shadow: 0 0 0 3px rgba(44, 62, 80, 0.1);
        }

        .category-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .category-pill {
            padding: 6px 14px;
            background: #f8f9fa;
            color: #2c3e50;
            border: 2px solid #e0e0e0;
            border-radius: 20px;
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .category-pill:hover, .category-pill.active {
            background: #2c3e50;
            color: white;
            text-decoration: none;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(44, 62, 80, 0.3);
        }

        .reset-filters {
            padding: 8px 16px;
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .reset-filters:hover {
            background: linear-gradient(45deg, #c0392b, #a93226);
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(231, 76, 60, 0.3);
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
                gap: 15px;
            }

            .filter-group {
                justify-content: space-between;
            }

            .category-pills {
                justify-content: center;
            }

            .filter-select {
                min-width: 100%;
            }
        }
    </style>
</head>
<body>
    <?php require 'partials/_nav.php'; ?>

    <!-- Hero Section -->
    <section class="page-title">
        <div class="container">
            <h1><i class="fas fa-store"></i> All Products</h1>
            <p>Discover our amazing collection of sports equipment and gear</p>
        </div>
    </section>

    <!-- Filter Bar -->
    <div class="container">
        <div class="filter-bar">
            <div class="filter-section">
                <div class="filter-group">
                    <span class="filter-label"><i class="fas fa-sort"></i>Sort By:</span>
                    <select class="filter-select" id="sortFilter">
                        <option value="default">Default</option>
                        <option value="rating-high">Rating Tertinggi</option>
                        <option value="rating-low">Rating Terendah</option>
                        <option value="price-high">Harga Tertinggi</option>
                        <option value="price-low">Harga Terendah</option>
                        <option value="popular">Paling Populer</option>
                        <option value="name-az">Nama A-Z</option>
                        <option value="name-za">Nama Z-A</option>
                    </select>
                </div>

                <div class="filter-group">
                    <span class="filter-label"><i class="fas fa-tags"></i> Categories:</span>
                    <div class="category-pills">
                        <span class="category-pill active" data-category="all">All Products</span>
                        <span class="category-pill" data-category="Basket">Basket</span>
                        <span class="category-pill" data-category="Running">Running</span>
                        <span class="category-pill" data-category="Golf">Golf</span>
                        <span class="category-pill" data-category="Badminton">Badminton</span>
                        <span class="category-pill" data-category="Fitness">Fitness</span>
                        <span class="category-pill" data-category="Swimming">Swimming</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <?php
            // Query untuk mengambil produk beserta kategori, diurutkan berdasarkan kategori
            $sql = "SELECT p.*, c.categorieName, c.categorieDesc 
                    FROM `product` p 
                    LEFT JOIN `categories` c ON p.productCategorieId = c.categorieId 
                    ORDER BY c.categorieName ASC, p.productName ASC";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            
            $currentCategory = "";
            $categoryProducts = [];
            $allCategories = [];
            
            // Kelompokkan produk berdasarkan kategori dan kumpulkan semua kategori
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $categoryName = $row['categorieName'] ? $row['categorieName'] : 'Uncategorized';
                $categoryDesc = $row['categorieDesc'] ? $row['categorieDesc'] : 'Products without category';
                
                // Tambahkan ke array kategori jika belum ada
                if (!in_array($categoryName, $allCategories)) {
                    $allCategories[] = $categoryName;
                }
                
                if (!isset($categoryProducts[$categoryName])) {
                    $categoryProducts[$categoryName] = [
                        'description' => $categoryDesc,
                        'products' => []
                    ];
                }
                
                $categoryProducts[$categoryName]['products'][] = $row;
            }
        ?>
        
        <!-- Update Filter Bar dengan kategori dari database -->
        <script>
            // Update category pills dengan data dari PHP
            $(document).ready(function() {
                const categories = <?php echo json_encode($allCategories); ?>;
                let categoryPillsHtml = '<span class="category-pill active" data-category="all">All Products</span>';
                
                categories.forEach(function(category) {
                    if (category && category !== 'Uncategorized') {
                        categoryPillsHtml += `<span class="category-pill" data-category="${category}">${category}</span>`;
                    }
                });
                
                $('.category-pills').html(categoryPillsHtml);
                
                // Re-bind events after updating HTML
                $('.category-pill').on('click', function() {
                    $('.category-pill').removeClass('active');
                    $(this).addClass('active');
                    filterByCategory($(this).attr('data-category'));
                });
            });
        </script>
        
        <?php
            // Tampilkan produk berdasarkan kategori
            foreach ($categoryProducts as $categoryName => $categoryData) {
                echo '<div class="category-header">
                        <h2><i class="fas fa-tags"></i> ' . htmlspecialchars($categoryName) . '</h2>
                        <p>' . htmlspecialchars($categoryData['description']) . '</p>
                      </div>';
                
                echo '<div class="product-grid">';
                
                foreach ($categoryData['products'] as $row) {
                    $productId = $row['productId'];
                    $productName = $row['productName'];
                    $productPrice = $row['productPrice'];
                    $productDesc = $row['productDesc'];

                    // Tampilkan produk dengan design baru
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
                
                echo '</div>'; // Close product-grid
            }

            if ($noResult) {
                echo '<div class="no-products col-12">
                        <i class="fas fa-box-open"></i>
                        <h3>No Products Available</h3>
                        <p>Sorry, we currently have no products to display. Please check back later!</p>
                      </div>';
            }
        ?>
    </div>

    <?php require 'partials/_footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
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
                
                // Store data untuk sorting dengan benar
                $(this).attr('data-rating', ratingValue.toFixed(1)); // Simpan rating sebagai string dengan 1 desimal
                $(this).attr('data-reviews', reviewCount);
                
                // Extract price value dengan lebih akurat
                const priceText = $(this).find('.product-price').text();
                const priceNumber = priceText.replace(/[^\d]/g, ''); // Ambil hanya angka
                $(this).attr('data-price', parseInt(priceNumber));
                
                // Extract product name
                const productName = $(this).find('.card-title').text().toLowerCase().trim();
                $(this).attr('data-name', productName);
                
                // Debug log untuk memastikan data tersimpan dengan benar
                console.log('Product:', productName, 'Rating:', ratingValue.toFixed(1), 'Price:', priceNumber, 'Reviews:', reviewCount);
            });
        }

        // Function untuk sorting produk
        function sortProducts(sortBy) {
            console.log('Sorting by:', sortBy); // Debug log
            
            const containers = $('.product-grid');
            
            containers.each(function() {
                const container = $(this);
                const products = container.find('.product-card').toArray();
                
                console.log('Found', products.length, 'products to sort'); // Debug log
                
                products.sort(function(a, b) {
                    const $a = $(a);
                    const $b = $(b);
                    
                    switch(sortBy) {
                        case 'rating-high':
                            const ratingA = parseFloat($a.attr('data-rating'));
                            const ratingB = parseFloat($b.attr('data-rating'));
                            console.log('Comparing ratings:', ratingA, 'vs', ratingB); // Debug log
                            return ratingB - ratingA; // Rating tinggi ke rendah
                            
                        case 'rating-low':
                            const ratingA_low = parseFloat($a.attr('data-rating'));
                            const ratingB_low = parseFloat($b.attr('data-rating'));
                            console.log('Comparing ratings (low):', ratingA_low, 'vs', ratingB_low); // Debug log
                            return ratingA_low - ratingB_low; // Rating rendah ke tinggi
                            
                        case 'price-high':
                            const priceA_high = parseInt($a.attr('data-price'));
                            const priceB_high = parseInt($b.attr('data-price'));
                            return priceB_high - priceA_high; // Harga tinggi ke rendah
                            
                        case 'price-low':
                            const priceA_low = parseInt($a.attr('data-price'));
                            const priceB_low = parseInt($b.attr('data-price'));
                            return priceA_low - priceB_low; // Harga rendah ke tinggi
                            
                        case 'popular':
                            const reviewsA = parseInt($a.attr('data-reviews'));
                            const reviewsB = parseInt($b.attr('data-reviews'));
                            return reviewsB - reviewsA; // Reviews banyak ke sedikit
                            
                        case 'name-az':
                            const nameA = $a.attr('data-name') || '';
                            const nameB = $b.attr('data-name') || '';
                            return nameA.localeCompare(nameB); // A ke Z
                            
                        case 'name-za':
                            const nameA_za = $a.attr('data-name') || '';
                            const nameB_za = $b.attr('data-name') || '';
                            return nameB_za.localeCompare(nameA_za); // Z ke A
                            
                        case 'default':
                        default:
                            return 0; // Keep original order
                    }
                });
                
                // Re-append sorted products dengan animasi
                container.fadeOut(200, function() {
                    container.empty();
                    products.forEach(product => container.append(product));
                    container.fadeIn(200);
                    console.log('Sorting completed for container'); // Debug log
                });
            });
        }

        // Function untuk filter kategori
        function filterByCategory(category) {
            if (category === 'all') {
                $('.category-header, .product-grid').fadeIn(300);
            } else {
                $('.category-header').each(function() {
                    const categoryName = $(this).find('h2').text().replace('🏷️ ', '').trim();
                    if (categoryName === category) {
                        $(this).fadeIn(300);
                        $(this).next('.product-grid').fadeIn(300);
                    } else {
                        $(this).fadeOut(300);
                        $(this).next('.product-grid').fadeOut(300);
                    }
                });
            }
        }

        // Event handlers
        $(document).ready(function() {
            // Add ratings first
            addRandomRatings();
            
            // Sort filter change
            $('#sortFilter').on('change', function() {
                const sortValue = $(this).val();
                console.log('Sort dropdown changed to:', sortValue); // Debug log
                
                if (sortValue !== 'default') {
                    sortProducts(sortValue);
                    
                    // Visual feedback
                    $('.filter-bar').addClass('sorting');
                    setTimeout(() => $('.filter-bar').removeClass('sorting'), 400);
                } else {
                    // Reset to original order
                    location.reload();
                }
            });
            
            // Category filter
            $('.category-pill').on('click', function() {
                $('.category-pill').removeClass('active');
                $(this).addClass('active');
                filterByCategory($(this).attr('data-category'));
            });
        });

        // Add some CSS for sorting animation
        $('<style>').html(`
            .filter-bar.sorting {
                background: linear-gradient(45deg, #f8f9fa, #e9ecef);
                transition: all 0.3s ease;
            }
            .product-card {
                transition: all 0.3s ease;
            }
        `).appendTo('head');
    </script>
</body>
</html>
