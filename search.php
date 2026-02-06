<?php
// Start session and include database connection at the very beginning
session_start();
include 'partials/_dbconnect.php';
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
    <title>Search Results</title>
    <link rel = "icon" href ="img/sportware-logo.jpeg" type = "image/x-icon">
    <style>
    body {
          padding-top: 60px; /* Sesuaikan dengan tinggi navbar */
    }

    #cont {
        min-height : 515px;
    }
    
    .search-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 30px 0;
        margin-bottom: 30px;
        border-radius: 0 0 20px 20px;
    }
    
    .search-header h2 {
        font-weight: 600;
        margin-bottom: 10px;
    }
    
    .search-header .search-term {
        background: rgba(255,255,255,0.2);
        padding: 5px 15px;
        border-radius: 20px;
        font-style: normal;
        font-weight: 500;
    }
    
    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 20px;
        color: #333;
        border-bottom: 3px solid #007bff;
        padding-bottom: 10px;
        display: inline-block;
    }
    
    .product-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        overflow: hidden;
        margin-bottom: 20px;
        background: white;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    
    .product-card img {
        transition: transform 0.3s ease;
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    
    .product-card:hover img {
        transform: scale(1.05);
    }
    
    .product-card .card-body {
        padding: 20px;
    }
    
    .product-card .card-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: #2c3e50;
    }
    
    .product-price {
        font-size: 1.2rem;
        font-weight: bold;
        color: #e74c3c;
    }
    
    .btn-modern {
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

    .btn-group-custom {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        justify-content: center;
        margin-top: 15px;
    }
    
    .btn-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }
    
    .no-results {
        text-align: center;
        padding: 60px 20px;
        background: #f8f9fa;
        border-radius: 15px;
        margin-top: 30px;
    }
    
    .no-results h3 {
        color: #6c757d;
        margin-bottom: 20px;
    }
    
    .no-results .suggestions {
        text-align: left;
        max-width: 500px;
        margin: 0 auto;
    }
    
    /* Mobile Responsive */
    @media (max-width: 768px) {
        .btn-group-custom {
            flex-direction: column;
            gap: 5px;
        }
        
        .btn-modern {
            font-size: 0.7rem;
            padding: 8px 12px;
        }
        
        .product-card .card-body {
            padding: 15px;
        }
        
        .search-header h2 {
            font-size: 1.8rem;
        }
        
        .section-title {
            font-size: 1.3rem;
        }
    }
    
    @media (max-width: 576px) {
        .btn-group-custom {
            gap: 3px;
        }
        
        .btn-modern {
            font-size: 0.65rem;
            padding: 6px 10px;
        }
    }
    </style>
</head>
<body>
    <?php require 'partials/_nav.php' ?>

    <!-- Search Header -->
    <div class="search-header">
        <div class="container">
            <h2 class="text-center">Search Results</h2>
            <p class="text-center mb-0">
                Found results for: <span class="search-term">"<?php echo htmlspecialchars($_GET['search']); ?>"</span>
            </p>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="container my-4">
        <div class="row">
        <?php 
            $noResult = true;
            $query = $_GET["search"];
            // Perbaiki query untuk pencarian kategori yang lebih fleksibel
            $searchTerm = mysqli_real_escape_string($conn, $query);
            $sql = "SELECT * FROM `categories` WHERE 
                    categorieName LIKE '%$searchTerm%' OR 
                    categorieDesc LIKE '%$searchTerm%' OR
                    MATCH(categorieName, categorieDesc) against('$searchTerm')
                    ORDER BY 
                    CASE 
                        WHEN categorieName LIKE '$searchTerm%' THEN 1
                        WHEN categorieName LIKE '%$searchTerm%' THEN 2
                        ELSE 3
                    END";
 
            $result = mysqli_query($conn, $sql);
            $categoryFound = false;
            while($row = mysqli_fetch_assoc($result)){
                if(!$categoryFound) {
                    echo '<div class="col-12"><h3 class="section-title">Categories</h3></div>';
                    $categoryFound = true;
                }
                $noResult = false;
                $catId = $row['categorieId'];
                $catname = $row['categorieName'];
                $catdesc = $row['categorieDesc'];
                
                echo '<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card product-card">
                        <img src="img/card-'.$catId. '.jpg" class="card-img-top" alt="'.htmlspecialchars($catname).'" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">' . htmlspecialchars($catname) . '</h5>
                            <p class="card-text text-muted">' . htmlspecialchars(substr($catdesc, 0, 60)) . '...</p>
                            <div class="btn-group-custom">
                                <a href="viewProductList.php?catid=' . $catId . '" class="btn btn-modern btn-view">
                                    <i class="fas fa-th-large"></i> View Products
                                </a>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        ?>
        </div>
    </div>

    <!-- Products Section -->
    <div class="container my-4" id="cont">
        <div class="row">
        <?php 
            $query = $_GET["search"];
            // Perbaiki query untuk pencarian yang lebih fleksibel dengan nama produk
            $searchTerm = mysqli_real_escape_string($conn, $query);
            $sql = "SELECT * FROM `product` WHERE 
                    productName LIKE '%$searchTerm%' OR 
                    productDesc LIKE '%$searchTerm%' OR
                    MATCH(productName, productDesc) against('$searchTerm')
                    ORDER BY 
                    CASE 
                        WHEN productName LIKE '$searchTerm%' THEN 1
                        WHEN productName LIKE '%$searchTerm%' THEN 2
                        ELSE 3
                    END"; 
            $result = mysqli_query($conn, $sql);
            $productFound = false;
            while($row = mysqli_fetch_assoc($result)){
                if(!$productFound) {
                    echo '<div class="col-12"><h3 class="section-title">Products</h3></div>';
                    $productFound = true;
                }
                $noResult = false;
                $productId = $row['productId'];
                $productName = $row['productName'];
                $productPrice = $row['productPrice'];
                $productDesc = $row['productDesc'];
                $productCategorieId = $row['productCategorieId'];
                
                echo '<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card product-card">
                        <img src="img/product-'.$productId. '.jpg" class="card-img-top" alt="'.htmlspecialchars($productName).'" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">' . htmlspecialchars(substr($productName, 0, 30)) . '...</h5>
                            <p class="product-price">Rp ' . number_format($productPrice * 1000, 0, ',', '.') . '</p>
                            <p class="card-text text-muted">' . htmlspecialchars(substr($productDesc, 0, 60)) . '...</p>
                            <div class="btn-group-custom">';
                                if($loggedin){
                                    $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE productId = '$productId' AND `userId`='$userId'";
                                    $quaresult = mysqli_query($conn, $quaSql);
                                    $quaExistRows = mysqli_num_rows($quaresult);
                                    if($quaExistRows == 0) {
                                        echo '<form action="partials/_manageCart.php" method="POST" style="display: inline;">
                                              <input type="hidden" name="itemId" value="'.$productId. '">
                                              <button type="submit" name="addToCart" class="btn btn-modern btn-cart">
                                                  <i class="fas fa-shopping-cart"></i> Add to Cart
                                              </button>
                                              </form>';
                                    }else {
                                        echo '<a href="viewCart.php" class="btn btn-modern btn-cart">
                                                <i class="fas fa-shopping-bag"></i> Go to Cart
                                              </a>';
                                    }
                                    
                                    // Add to Wishlist Button
                                    echo '<form action="partials/_manageWishlist.php" method="POST" style="display: inline;">
                                            <input type="hidden" name="itemId" value="'.$productId.'">
                                            <button type="submit" name="addToWishlist" class="btn btn-modern btn-wishlist">';
                                            
                                            // Cek jika produk sudah ada di wishlist
                                            $checkSql = "SELECT * FROM `wishlist` WHERE `userId` = '$userId' AND `productId` = '$productId'";
                                            $checkResult = mysqli_query($conn, $checkSql);
                                            if (mysqli_num_rows($checkResult) > 0) {
                                                echo '<i class="fas fa-heart-broken"></i> Remove';
                                            } else {
                                                echo '<i class="fas fa-heart"></i> Wishlist';
                                            }
                                    echo '</button>
                                          </form>';
                                }
                                // Tidak ada tombol Add to Cart/Wishlist jika belum login, sama seperti about.php
                                
                                // Quick View Button - selalu tampil
                                echo '<a href="viewProduct.php?prodid=' . $productId . '" class="btn btn-modern btn-view">
                                        <i class="fas fa-eye"></i> Quick View
                                      </a>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            
            // Tampilkan pesan jika tidak ada hasil
            if($noResult) {
                echo '<div class="col-12">
                    <div class="no-results">
                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                        <h3>Barang Tidak Ada Awowkokos</h3>
                        <p class="text-muted mb-4">We couldn\'t find any products or categories matching <strong>"' . htmlspecialchars($_GET['search']) . '"</strong></p>
                        <div class="suggestions">
        
                            
                        </div>
                        <a href="index.php" class="btn btn-primary btn-modern mt-3">
                            <i class="fas fa-home"></i> Back to Home
                        </a>
                    </div>
                </div>';
            }
        ?>
        </div>
    </div>

    <?php require 'partials/_footer.php' ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    
    <!-- Cart Management Script -->
    <script src="assets/js/cart.js"></script>
</body>
</html>