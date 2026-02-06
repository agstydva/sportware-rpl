<?php
// Get dashboard statistics with error handling
$totalOrdersQuery = "SELECT COUNT(*) as total FROM orders";
$totalOrdersResult = mysqli_query($conn, $totalOrdersQuery);
$totalOrders = ($totalOrdersResult) ? mysqli_fetch_assoc($totalOrdersResult)['total'] ?? 0 : 0;

$totalUsersQuery = "SELECT COUNT(*) as total FROM users";
$totalUsersResult = mysqli_query($conn, $totalUsersQuery);
$totalUsers = ($totalUsersResult) ? mysqli_fetch_assoc($totalUsersResult)['total'] ?? 0 : 0;

$totalProductsQuery = "SELECT COUNT(*) as total FROM product";
$totalProductsResult = mysqli_query($conn, $totalProductsQuery);
$totalProducts = ($totalProductsResult) ? mysqli_fetch_assoc($totalProductsResult)['total'] ?? 0 : 0;

$totalRevenueQuery = "SELECT SUM(amount) as total FROM orders";
$totalRevenueResult = mysqli_query($conn, $totalRevenueQuery);
$totalRevenue = ($totalRevenueResult) ? mysqli_fetch_assoc($totalRevenueResult)['total'] ?? 0 : 0;

$totalContactQuery = "SELECT COUNT(*) as total FROM contact";
$totalContactResult = mysqli_query($conn, $totalContactQuery);
$totalContacts = ($totalContactResult) ? mysqli_fetch_assoc($totalContactResult)['total'] ?? 0 : 0;

// Get recent orders with error handling
$recentOrdersQuery = "SELECT o.*, u.firstName, u.lastName FROM orders o 
                      LEFT JOIN users u ON o.userId = u.id 
                      ORDER BY o.orderDate DESC LIMIT 5";
$recentOrdersResult = mysqli_query($conn, $recentOrdersQuery);
if (!$recentOrdersResult) {
    $recentOrdersResult = null;
}

// Get recent contacts with error handling
$recentContactsQuery = "SELECT c.*, u.firstName, u.lastName, u.email as userEmail FROM contact c 
                        LEFT JOIN users u ON c.userId = u.id 
                        ORDER BY c.time DESC LIMIT 5";
$recentContactsResult = mysqli_query($conn, $recentContactsQuery);
if (!$recentContactsResult) {
    $recentContactsResult = null;
}
?>

<style>
    .dashboard-container {
        margin-top: 90px;
        padding: 20px;
        background: linear-gradient(135deg, #f8f6f0 0%, #e8e3d8 100%);
        min-height: calc(100vh - 90px);
    }

    .dashboard-header {
        background: white;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        margin-bottom: 30px;
        background: linear-gradient(135deg, #d4a574 0%, #b8956a 100%);
        color: white;
    }

    .dashboard-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .dashboard-header p {
        font-size: 1.1rem;
        margin: 10px 0 0 0;
        opacity: 0.9;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: white;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #d4a574, #b8956a);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        color: white;
        margin-bottom: 20px;
    }

    .stat-icon.orders { background: linear-gradient(45deg, #28a745, #20c997); }
    .stat-icon.users { background: linear-gradient(45deg, #007bff, #6610f2); }
    .stat-icon.products { background: linear-gradient(45deg, #fd7e14, #e83e8c); }
    .stat-icon.revenue { background: linear-gradient(45deg, #ffc107, #fd7e14); }
    .stat-icon.contacts { background: linear-gradient(45deg, #dc3545, #e83e8c); }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 5px;
        line-height: 1;
    }

    .stat-label {
        color: #666;
        font-size: 1rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .content-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        margin-bottom: 30px;
    }

    .content-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        overflow: hidden;
    }

    .content-header {
        padding: 25px 30px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-bottom: 2px solid #dee2e6;
    }

    .content-header h3 {
        font-size: 1.4rem;
        font-weight: 700;
        color: #333;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .content-header i {
        color: #d4a574;
        font-size: 1.3rem;
    }

    .content-body {
        padding: 0;
        max-height: 400px;
        overflow-y: auto;
    }

    .order-item, .contact-item {
        display: flex;
        align-items: center;
        padding: 20px 30px;
        border-bottom: 1px solid #f8f9fa;
        transition: all 0.3s ease;
    }

    .order-item:hover, .contact-item:hover {
        background: #f8f9fa;
    }

    .order-item:last-child, .contact-item:last-child {
        border-bottom: none;
    }

    .order-avatar, .contact-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(45deg, #d4a574, #b8956a);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 1.2rem;
        margin-right: 15px;
        flex-shrink: 0;
    }

    .order-info, .contact-info {
        flex: 1;
    }

    .order-name, .contact-name {
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
    }

    .order-details, .contact-details {
        color: #666;
        font-size: 0.9rem;
        line-height: 1.4;
    }

    .order-amount {
        background: linear-gradient(45deg, #28a745, #20c997);
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9rem;
        margin-left: 15px;
    }

    .order-status {
        padding: 6px 12px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-left: 10px;
    }

    .status-confirmed { background: #d4edda; color: #155724; }
    .status-pending { background: #fff3cd; color: #856404; }
    .status-cancelled { background: #f8d7da; color: #721c24; }

    .empty-state {
        text-align: center;
        padding: 60px 30px;
        color: #666;
    }

    .empty-state i {
        font-size: 3rem;
        color: #d4a574;
        margin-bottom: 20px;
    }

    .empty-state h4 {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: #333;
    }

    .view-all-btn {
        background: linear-gradient(45deg, #d4a574, #b8956a);
        color: white;
        padding: 12px 25px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 20px;
    }

    .view-all-btn:hover {
        background: linear-gradient(45deg, #b8956a, #a0845a);
        color: white;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(212, 165, 116, 0.4);
    }

    .quick-actions {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        margin-bottom: 30px;
    }

    .quick-actions h3 {
        font-size: 1.4rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .quick-actions h3 i {
        color: #d4a574;
    }

    .actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .action-btn {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 20px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 15px;
        text-decoration: none;
        color: #333;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .action-btn:hover {
        background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
        color: #333;
        text-decoration: none;
        border-color: #d4a574;
        transform: translateY(-2px);
    }

    .action-btn i {
        font-size: 1.5rem;
        color: #d4a574;
    }

    .action-btn .btn-text {
        font-weight: 600;
        font-size: 1rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .dashboard-container {
            padding: 15px;
            margin-top: 70px;
        }
        
        .content-grid {
            grid-template-columns: 1fr;
        }
        
        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }
        
        .stat-card {
            padding: 20px;
        }
        
        .stat-number {
            font-size: 2rem;
        }
        
        .dashboard-header {
            padding: 20px;
        }
        
        .dashboard-header h1 {
            font-size: 2rem;
        }
    }

    @media (max-width: 576px) {
        .actions-grid {
            grid-template-columns: 1fr;
        }
        
        .order-item, .contact-item {
            padding: 15px 20px;
        }
        
        .content-header {
            padding: 20px;
        }
    }
</style>

<div class="dashboard-container">
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <h1><i class="fas fa-tachometer-alt"></i> Admin Dashboard</h1>
        <p>Welcome back, <strong><?php echo $_SESSION['adminusername']; ?></strong>! Here's what's happening with your store.</p>
    </div>

    <!-- Statistics Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon orders">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="stat-number"><?php echo number_format($totalOrders); ?></div>
            <div class="stat-label">Total Orders</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon users">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-number"><?php echo number_format($totalUsers); ?></div>
            <div class="stat-label">Total Users</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon products">
                <i class="fas fa-box"></i>
            </div>
            <div class="stat-number"><?php echo number_format($totalProducts); ?></div>
            <div class="stat-label">Total Products</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon revenue">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="stat-number">Rp<?php echo number_format($totalRevenue * 1000, 0, ',', '.'); ?></div>
            <div class="stat-label">Total Revenue</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon contacts">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="stat-number"><?php echo number_format($totalContacts); ?></div>
            <div class="stat-label">Messages</div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions">
        <h3><i class="fas fa-bolt"></i> Quick Actions</h3>
        <div class="actions-grid">
            <a href="index.php?page=orderManage" class="action-btn">
                <i class="fas fa-plus-circle"></i>
                <div class="btn-text">Manage Orders</div>
            </a>
            <a href="index.php?page=menuManage" class="action-btn">
                <i class="fas fa-box-open"></i>
                <div class="btn-text">Add Product</div>
            </a>
            <a href="index.php?page=categoryManage" class="action-btn">
                <i class="fas fa-tags"></i>
                <div class="btn-text">Categories</div>
            </a>
            <a href="index.php?page=userManage" class="action-btn">
                <i class="fas fa-user-plus"></i>
                <div class="btn-text">Manage Users</div>
            </a>
        </div>
    </div>

    <!-- Content Grid -->
    <div class="content-grid">
        <!-- Recent Orders -->
        <div class="content-card">
            <div class="content-header">
                <h3><i class="fas fa-shopping-bag"></i> Recent Orders</h3>
            </div>
            <div class="content-body">
                <?php if($recentOrdersResult && mysqli_num_rows($recentOrdersResult) > 0): ?>
                    <?php while($order = mysqli_fetch_assoc($recentOrdersResult)): ?>
                        <div class="order-item">
                            <div class="order-avatar">
                                <?php echo strtoupper(substr($order['firstName'] ?? 'U', 0, 1)); ?>
                            </div>
                            <div class="order-info">
                                <div class="order-name">
                                    <?php echo ($order['firstName'] ?? 'Unknown') . ' ' . ($order['lastName'] ?? 'User'); ?>
                                </div>
                                <div class="order-details">
                                    Order #<?php echo $order['orderId']; ?> • 
                                    <?php echo date('M j, Y', strtotime($order['orderDate'])); ?>
                                </div>
                            </div>
                            <div class="order-amount">
                                Rp<?php echo number_format($order['amount'] * 1000, 0, ',', '.'); ?>
                            </div>
                            <div class="order-status status-<?php echo strtolower(str_replace(' ', '', $order['orderStatus'])); ?>">
                                <?php echo $order['orderStatus']; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <div style="padding: 20px 30px; text-align: center; border-top: 2px solid #f8f9fa;">
                        <a href="index.php?page=orderManage" class="view-all-btn">
                            <span>View All Orders</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                <?php else: ?>
                    <div class="empty-state">
                        <i class="fas fa-shopping-cart"></i>
                        <h4>No Orders Yet</h4>
                        <p>Orders will appear here once customers start purchasing.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Recent Messages -->
        <div class="content-card">
            <div class="content-header">
                <h3><i class="fas fa-comments"></i> Recent Messages</h3>
            </div>
            <div class="content-body">
                <?php if($recentContactsResult && mysqli_num_rows($recentContactsResult) > 0): ?>
                    <?php while($contact = mysqli_fetch_assoc($recentContactsResult)): ?>
                        <div class="contact-item">
                            <div class="contact-avatar">
                                <?php echo strtoupper(substr($contact['firstName'] ?? $contact['email'] ?? 'U', 0, 1)); ?>
                            </div>
                            <div class="contact-info">
                                <div class="contact-name">
                                    <?php 
                                    $name = '';
                                    if ($contact['firstName'] && $contact['lastName']) {
                                        $name = $contact['firstName'] . ' ' . $contact['lastName'];
                                    } else {
                                        $name = $contact['email'] ?? 'Unknown User';
                                    }
                                    echo htmlspecialchars($name); 
                                    ?>
                                </div>
                                <div class="contact-details">
                                    <?php echo htmlspecialchars(substr($contact['message'], 0, 60)); ?>...
                                    <br>
                                    <small><?php echo date('M j, Y g:i A', strtotime($contact['time'])); ?></small>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <div style="padding: 20px 30px; text-align: center; border-top: 2px solid #f8f9fa;">
                        <a href="index.php?page=contactManage" class="view-all-btn">
                            <span>View All Messages</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                <?php else: ?>
                    <div class="empty-state">
                        <i class="fas fa-envelope-open"></i>
                        <h4>No Messages</h4>
                        <p>Customer messages will appear here.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>