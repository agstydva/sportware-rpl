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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    
    <title>Shopping Cart - Sportware</title>
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
            color: #d4af37;
        }

        .page-title p {
            font-size: 1.1rem;
            margin-top: 12px;
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }

        .info-alert {
            background: linear-gradient(45deg, #d4af37, #b8860b);
            color: white;
            border: none;
            border-radius: 15px;
            padding: 15px 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }

        .info-alert strong {
            font-weight: 700;
        }

        .cart-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            border: none;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .cart-table {
            margin: 0;
        }

        .cart-table thead {
            background: linear-gradient(45deg, #d4af37, #b8860b);
            color: white;
        }

        .cart-table thead th {
            border: none;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 15px 10px;
            vertical-align: middle;
        }

        .cart-table tbody td {
            padding: 15px 10px;
            vertical-align: middle;
            border-color: #f8f9fa;
        }

        .cart-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .quantity-input {
            width: 70px;
            text-align: center;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 8px 5px;
            font-weight: 600;
            color: #2c3e50;
        }

        .quantity-input:focus {
            border-color: #d4af37;
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
        }

        .btn-remove {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            border: none;
            border-radius: 20px;
            padding: 6px 12px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-remove:hover {
            background: linear-gradient(45deg, #c0392b, #a93226);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }

        .btn-remove-all {
            background: linear-gradient(45deg, #dc3545, #c82333);
            color: white;
            border: none;
            border-radius: 20px;
            padding: 8px 16px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-remove-all:hover {
            background: linear-gradient(45deg, #c82333, #bd2130);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
        }

        .order-summary {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            padding: 25px;
            border: none;
        }

        .order-summary h5 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 25px;
            text-align: center;
            font-size: 1.3rem;
        }

        .summary-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f8f9fa;
        }

        .summary-item:last-child {
            border-bottom: 2px solid #d4af37;
            font-weight: 700;
            font-size: 1.1rem;
            color: #2c3e50;
        }

        .summary-item span {
            font-weight: 600;
            color: #e74c3c;
        }

        .payment-options {
            margin: 20px 0;
        }

        .form-check {
            margin: 10px 0;
            padding: 12px 15px;
            background: #f8f9fa;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .form-check:hover {
            background: #e9ecef;
        }

        .form-check-input:checked + .form-check-label {
            color: #d4af37;
            font-weight: 600;
        }

        .btn-checkout {
            background: linear-gradient(45deg, #d4af37, #b8860b);
            color: white;
            border: none;
            border-radius: 25px;
            padding: 15px 30px;
            font-weight: 700;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            width: 100%;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .btn-checkout:hover {
            background: linear-gradient(45deg, #b8860b, #8b6914);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.4);
        }

        .discount-section {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .discount-toggle {
            color: #2c3e50;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .discount-toggle:hover {
            color: #d4af37;
            text-decoration: none;
        }

        .discount-input {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 12px 15px;
            width: 100%;
            transition: all 0.3s ease;
        }

        .discount-input:focus {
            border-color: #d4af37;
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
        }

        .empty-cart {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .empty-cart img {
            margin-bottom: 30px;
            opacity: 0.8;
        }

        .empty-cart h3 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .empty-cart h4 {
            color: #7f8c8d;
            font-weight: 400;
            margin-bottom: 30px;
        }

        .btn-continue-shopping {
            background: linear-gradient(45deg, #d4af37, #b8860b);
            color: white;
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-continue-shopping:hover {
            background: linear-gradient(45deg, #b8860b, #8b6914);
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.4);
        }

        .login-alert {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            padding: 40px;
            text-align: center;
            margin: 40px 0;
        }

        .login-alert-link {
            color: #d4af37;
            font-weight: 700;
            text-decoration: none;
        }

        .login-alert-link:hover {
            color: #b8860b;
            text-decoration: underline;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .page-title h1 {
                font-size: 2.2rem;
                flex-direction: column;
                gap: 10px;
            }
            
            .cart-table {
                font-size: 0.85rem;
            }
            
            .cart-table thead th,
            .cart-table tbody td {
                padding: 10px 5px;
            }
            
            .quantity-input {
                width: 60px;
            }
        }

        @media (max-width: 576px) {
            .page-title h1 {
                font-size: 1.8rem;
            }
            
            .cart-table {
                font-size: 0.8rem;
            }
            
            .order-summary {
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
    <?php require 'partials/_nav.php' ?>
    
    <?php if($loggedin): ?>
    
    <!-- Page Title Section -->
    <div class="page-title">
        <div class="container">
            <h1><i class="fas fa-shopping-cart"></i> Shopping Cart</h1>
            <p>Review your items and proceed to checkout</p>
        </div>
    </div>

    <div class="container">
        <!-- Info Alert -->
        <div class="alert info-alert">
            <i class="fas fa-info-circle"></i> <strong>Info!</strong> Online payment belum ada Adminya masih bingung cik, COD aja Yach.
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="cart-card">
                    <table class="table cart-table text-center mb-0">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Item Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">
                                    <form action="partials/_manageCart.php" method="POST" style="margin: 0;">
                                        <button name="removeAllItem" class="btn-remove-all">
                                            <i class="fas fa-trash"></i> Remove All
                                        </button>
                                        <input type="hidden" name="userId" value="<?php $userId = $_SESSION['userId']; echo $userId ?>">
                                    </form>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM `viewcart` WHERE `userId`= $userId";
                                $result = mysqli_query($conn, $sql);
                                $counter = 0;
                                $totalPrice = 0;
                                while($row = mysqli_fetch_assoc($result)){
                                    $productId = $row['productId'];
                                    $Quantity = $row['itemQuantity'];
                                    $mysql = "SELECT * FROM `product` WHERE productId = $productId";
                                    $myresult = mysqli_query($conn, $mysql);
                                    $myrow = mysqli_fetch_assoc($myresult);
                                    $productName = $myrow['productName'];
                                    $productPrice = $myrow['productPrice'];
                                    $total = $productPrice * $Quantity;
                                    $counter++;
                                    $totalPrice = $totalPrice + $total;

                                    echo '<tr>
                                            <td><strong>' . $counter . '</strong></td>
                                            <td><strong>' . htmlspecialchars($productName) . '</strong></td>
                                            <td><strong>Rp' . number_format($productPrice) . '.000</strong></td>
                                            <td>
                                                <form id="frm' . $productId . '">
                                                    <input type="hidden" name="productId" value="' . $productId . '">
                                                    <input type="number" name="quantity" value="' . $Quantity . '" class="quantity-input" onchange="updateCart(' . $productId . ')" onkeyup="return false" min=1 oninput="check(this)" onClick="this.select();">
                                                </form>
                                            </td>
                                            <td><strong style="color: #e74c3c;">Rp' . number_format($total) . '.000</strong></td>
                                            <td>
                                                <form action="partials/_manageCart.php" method="POST" style="margin: 0;">
                                                    <button name="removeItem" class="btn-remove">
                                                        <i class="fas fa-times"></i> Remove
                                                    </button>
                                                    <input type="hidden" name="itemId" value="'.$productId. '">
                                                </form>
                                            </td>
                                        </tr>';
                                }
                                if($counter==0) {
                                    echo '<script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            document.querySelector(".container").innerHTML = `
                                                <div class="empty-cart">
                                                    <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4">
                                                    <h3><strong>Your Cart is Empty</strong></h3>
                                                    <h4>Add something to make me happy :)</h4>
                                                    <a href="index.php" class="btn-continue-shopping">
                                                        <i class="fas fa-shopping-bag"></i> Continue Shopping
                                                    </a>
                                                </div>
                                            `;
                                        });
                                    </script>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="order-summary">
                    <h5><i class="fas fa-receipt"></i> Order Summary</h5>
                    <ul class="summary-list">
                        <li class="summary-item">
                            <span>Total Price</span>
                            <span><strong>Rp<?php echo number_format($totalPrice) ?>.000</strong></span>
                        </li>
                        <li class="summary-item">
                            <span>Shipping</span>
                            <span><strong>Rp0</strong></span>
                        </li>
                        <li class="summary-item">
                            <div>
                                <strong>Total Amount</strong><br>
                                <small>(including Tax & Charge)</small>
                            </div>
                            <span><strong>Rp<?php echo number_format($totalPrice) ?>.000</strong></span>
                        </li>
                    </ul>
                    
                    <div class="payment-options">
                        <h6><i class="fas fa-credit-card"></i> Payment Options</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                <i class="fas fa-money-bill-wave"></i> Cash On Delivery 
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault2" disabled>
                            <label class="form-check-label" for="flexRadioDefault2" style="opacity: 0.5;">
                                <i class="fas fa-credit-card"></i> Online Payment (Coming Soon)
                            </label>
                        </div>
                    </div>
                    
                    <button type="button" class="btn-checkout" data-toggle="modal" data-target="#checkoutModal">
                        <i class="fas fa-check"></i> Proceed to Checkout
                    </button>
                </div>
                
                <div class="discount-section">
                    <a class="discount-toggle d-flex justify-content-between align-items-center" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <span><i class="fas fa-tag"></i> Add a discount code (optional)</span>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <div class="mt-3">
                            <input type="text" id="discount-code" class="discount-input" placeholder="Enter discount code (Belum Fix)">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                                
    <?php else: ?>
        <div class="container">
            <div class="login-alert">
                <i class="fas fa-lock" style="font-size: 3rem; color: #d4a574; margin-bottom: 20px;"></i>
                <h3>Authentication Required</h3>
                <p style="font-size: 1.2rem; margin-bottom: 20px;">
                    Before checkout you need to 
                    <strong><a class="login-alert-link" data-toggle="modal" data-target="#loginModal">Login</a></strong>
                </p>
            </div>
        </div>
    <?php endif; ?>
    <?php require 'partials/_checkoutModal.php'; ?>
    <?php require 'partials/_footer.php' ?>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script>
        function check(input) {
            if (input.value <= 0) {
                input.value = 1;
            }
        }
        function updateCart(id) {
            $.ajax({
                url: 'partials/_manageCart.php',
                type: 'POST',
                data:$("#frm"+id).serialize(),
                success:function(res) {
                    location.reload();
                } 
            })
        }
    </script>
</body>
</html>