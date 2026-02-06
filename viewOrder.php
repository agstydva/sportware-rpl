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
    
    <title>Your Orders - Sportware</title>
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
            color: #3498db;
        }

        .page-title p {
            font-size: 1.1rem;
            margin-top: 12px;
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }

        .orders-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            border: none;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .card-header {
            background: linear-gradient(45deg, #3498db, #2980b9);
            color: white;
            border: none;
            padding: 20px 25px;
            display: flex;
            justify-content: between;
            align-items: center;
        }

        .card-header h2 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .card-header .btn {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 20px;
            padding: 8px 16px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-left: 10px;
            transition: all 0.3s ease;
        }

        .card-header .btn:hover {
            background: rgba(255,255,255,0.3);
            color: white;
            transform: translateY(-2px);
        }

        .orders-table {
            margin: 0;
        }

        .orders-table thead {
            background: linear-gradient(45deg, #34495e, #2c3e50);
            color: white;
        }

        .orders-table thead th {
            border: none;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 15px 10px;
            vertical-align: middle;
        }

        .orders-table tbody td {
            padding: 15px 10px;
            vertical-align: middle;
            border-color: #f8f9fa;
        }

        .orders-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-pending {
            background: linear-gradient(45deg, #f39c12, #e67e22);
            color: white;
        }

        .status-delivered {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            color: white;
        }

        .status-cancelled {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
        }

        .btn-action {
            background: linear-gradient(45deg, #3498db, #2980b9);
            color: white;
            border: none;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            margin: 0 3px;
        }

        .btn-action:hover {
            background: linear-gradient(45deg, #2980b9, #1f6391);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }

        .btn-action.btn-status {
            background: linear-gradient(45deg, #e67e22, #d35400);
        }

        .btn-action.btn-status:hover {
            background: linear-gradient(45deg, #d35400, #ba4a00);
            box-shadow: 0 5px 15px rgba(230, 126, 34, 0.4);
        }

        .empty-orders {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .empty-orders img {
            margin-bottom: 30px;
            opacity: 0.8;
        }

        .empty-orders h3 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .empty-orders h4 {
            color: #7f8c8d;
            font-weight: 400;
            margin-bottom: 30px;
        }

        .btn-continue-shopping {
            background: linear-gradient(45deg, #3498db, #2980b9);
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
            background: linear-gradient(45deg, #2980b9, #1f6391);
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
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
            color: #3498db;
            font-weight: 700;
            text-decoration: none;
        }

        .login-alert-link:hover {
            color: #2980b9;
            text-decoration: underline;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .page-title h1 {
                font-size: 2.2rem;
                flex-direction: column;
                gap: 10px;
            }
            
            .orders-table {
                font-size: 0.85rem;
            }
            
            .orders-table thead th,
            .orders-table tbody td {
                padding: 10px 5px;
            }
            
            .card-header {
                flex-direction: column;
                gap: 15px;
            }
        }

        @media (max-width: 576px) {
            .page-title h1 {
                font-size: 1.8rem;
            }
            
            .orders-table {
                font-size: 0.8rem;
            }
        }
    </style>

</head>
<body>
    <?php require 'partials/_nav.php' ?>
    
    <?php if($loggedin): ?>
    <?php $userId = $_SESSION['userId']; ?>
    
    <!-- Page Title Section -->
    <div class="page-title">
        <div class="container">
            <h1><i class="fas fa-clipboard-list"></i> Your Orders</h1>
            <p>Track and manage your order history</p>
        </div>
    </div>

    <div class="container">
        <div class="orders-card" id="empty">
            <div class="card-header">
                <div class="row w-100 align-items-center">
                    <div class="col-sm-4">
                        <h2><i class="fas fa-box"></i> Order Details</h2>
                    </div>
                    <div class="col-sm-8 text-right">						
                        <a href="" class="btn"><i class="fas fa-sync-alt"></i> Refresh List</a>
                        <a href="#" onclick="window.print()" class="btn"><i class="fas fa-print"></i> Print</a>
                    </div>
                </div>
            </div>
            
            <table class="table orders-table text-center mb-0">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Delivery Address</th>
                        <th>Phone Number</th>
                        <th>Total Amount</th>						
                        <th>Payment Method</th>
                        <th>Order Date</th>
                        <th>Status</th>						
                        <th>Items</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM `orders` WHERE `userId`= $userId";
                        $result = mysqli_query($conn, $sql);
                        $counter = 0;
                        while($row = mysqli_fetch_assoc($result)){
                            $orderId = $row['orderId'];
                            $address = $row['address'];
                            $zipCode = $row['zipCode'];
                            $phoneNo = $row['phoneNo'];
                            $amount = $row['amount'];
                            $orderDate = $row['orderDate'];
                            $paymentMode = $row['paymentMode'];
                            if($paymentMode == 0) {
                                $paymentMode = "Cash on Delivery";
                            }
                            else {
                                $paymentMode = "Online Payment";
                            }
                            $orderStatus = $row['orderStatus'];
                            
                            $counter++;
                            
                            echo '<tr>
                                    <td><strong style="color: #3498db;">#' . $orderId . '</strong></td>
                                    <td><span title="' . htmlspecialchars($address) . '">' . (strlen($address) > 25 ? substr($address, 0, 25) . '...' : $address) . '</span></td>
                                    <td>' . $phoneNo . '</td>
                                    <td><strong style="color: #e74c3c;">Rp' . number_format($amount) . '.000</strong></td>
                                    <td><span class="badge badge-info">' . $paymentMode . '</span></td>
                                    <td>' . date('d M Y', strtotime($orderDate)) . '</td>
                                    <td><button class="btn-action btn-status" data-toggle="modal" data-target="#orderStatus' . $orderId . '" title="View Status"><i class="fas fa-truck"></i></button></td>
                                    <td><button class="btn-action" data-toggle="modal" data-target="#orderItem' . $orderId . '" title="View Items"><i class="fas fa-eye"></i></button></td>
                                </tr>';
                        }
                        
                        if($counter==0) {
                            echo '<script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    document.getElementById("empty").innerHTML = `
                                        <div class="empty-orders">
                                            <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4">
                                            <h3>You have not ordered any items yet</h3>
                                            <h4>Start shopping to see your orders here</h4>
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
                                
    <?php else: ?>
        <div class="container">
            <div class="login-alert">
                <i class="fas fa-lock" style="font-size: 3rem; color: #3498db; margin-bottom: 20px;"></i>
                <h3>Authentication Required</h3>
                <p style="font-size: 1.2rem; margin-bottom: 20px;">
                    To view your orders, you need to 
                    <strong><a class="login-alert-link" data-toggle="modal" data-target="#loginModal">Login</a></strong>
                </p>
            </div>
        </div>
    <?php endif; ?>

    <?php 
    include 'partials/_orderItemModal.php';
    include 'partials/_orderStatusModal.php';
    require 'partials/_footer.php'
    ?> 
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

  </body>

</html>
