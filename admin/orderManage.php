<div class="container" style="margin-top:98px;background: aliceblue;">
    <div class="table-wrapper">
        <div class="table-title" style="border-radius: 14px;">
            <div class="row">
                <div class="col-sm-4">
                    <h2>Order <b>Details</b></h2>
                </div>
                <div class="col-sm-8">						
                    <a href="" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Refresh List</span></a>
                    <a href="#" onclick="window.print()" class="btn btn-info"><i class="material-icons">&#xE24D;</i> <span>Print</span></a>
                </div>
            </div>
        </div>
        
        <table class="table table-striped table-hover text-center" id="NoOrder">
            <thead style="background-color: #FFD700;">
                <tr>
                    <th>Order Id</th>
                    <th>User Id</th>
                    <th>Address</th>
                    <th>Phone No</th>
                    <th>Amount</th>						
                    <th>Payment Mode</th>
                    <th>Order Date</th>
                    <th>Status</th>						
                    <th>Items</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM `orders`";
                    $result = mysqli_query($conn, $sql);
                    $counter = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $Id = $row['userId'];
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
                            $paymentMode = "Online";
                        }
                        $orderStatus = $row['orderStatus'];
                        $counter++;
                        
                        echo '<tr>
                                <td>' . $orderId . '</td>
                                <td>' . $Id . '</td>
                                <td data-toggle="tooltip" title="' .$address. '">' . substr($address, 0, 20) . '...</td>
                                <td>' . $phoneNo . '</td>
                                <td>Rp' . $amount . '.000</td>
                                <td>' . $paymentMode . '</td>
                                <td>' . $orderDate . '</td>
                                <td><a href="#" data-toggle="modal" data-target="#orderStatus' . $orderId . '" class="view"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
</svg></a></td>
                                <td><a href="#" data-toggle="modal" data-target="#orderItem' . $orderId . '" class="view" title="View Details"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
  <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1M.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8z"/>
</svg></a></td>
                            </tr>';
                    }
                    if($counter==0) {
                        ?><script> document.getElementById("NoOrder").innerHTML = '<div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%"> You have not Recieve any Order!	</div>';</script> <?php
                    } 
                ?>
            </tbody>
        </table>
    </div>
</div> 

<?php 
    include 'partials/_orderItemModal.php';
    include 'partials/_orderStatusModal.php';
?>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
    .tooltip.show {
        top: -62px !important;
    }
    
    .table-wrapper .btn {
        float: right;
        color: #333;
        background-color: #fff;
        border-radius: 3px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }
    .table-wrapper .btn:hover {
        color: #333;
        background: #f2f2f2;
    }
    .table-wrapper .btn.btn-primary {
        color: #fff;
        background: #03A9F4;
    }
    .table-wrapper .btn.btn-primary:hover {
        background: #03a3e7;
    }
    .table-title .btn {		
        font-size: 13px;
        border: none;
    }
    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }
    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }
    .table-title {
        color: #fff;
        background: #4b5366;		
        padding: 16px 25px;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }
    table.table tr th:first-child {
        width: 60px;
    }
    table.table tr th:last-child {
        width: 80px;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
        /* background-color: #fcfcfc; */
    }
    table.table-striped.table-hover tbody tr:hover {
        /* background: #f5f5f5; */
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
    }
    table.table td a:hover {
        color: #2196F3;
    }
    table.table td a.view {        
        width: 30px;
        height: 30px;
        color: #2196F3;
        border: 2px solid;
        border-radius: 30px;
        text-align: center;
    }
    table.table td a.view i {
        font-size: 22px;
        margin: 2px 0 0 1px;
    }   
    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }
    table {
        counter-reset: section;
    }

    .count:before {
        counter-increment: section;
        content: counter(section);
    }
    

</style>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>