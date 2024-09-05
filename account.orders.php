<div class="d-flex justify-content-end pb-3">


<?php
      $get_order_details = "SELECT * FROM `orders` WHERE user_id = $user_id ORDER BY order_date DESC";
      $result = mysqli_query($conn, $get_order_details);
       $order_count = mysqli_num_rows($result);

       if ($order_count > 0) {

        echo"
        <div class='form-inline'>
    <label class='text-muted mr-3' for='order-sort'>Sort Orders</label>
    <select class='form-control' id='order-sort'>
        <option>All</option>
        <option>Delivered</option>
        <option>In Progress</option>
        <option>Delayed</option>
        <option>Canceled</option>
    </select>
</div>
</div>
<div class='table-responsive'>
<table class='table table-hover mb-0'>
    <thead>
        <tr>
            <th>Order #</th>
            <th>Date & Time Purchased</th>
            <th>Shipping Method</th>
            <th>Status</th>
            <th>Payment Method</th>
        </tr>
    </thead>
    <tbody>
        
        ";


       
       while($row = mysqli_fetch_array($result)){
        $order_id = $row["id"];
        $order_date = $row['order_date'];
        $status = $row['status'];
        $shipping_method = $row['shipping_method'];
        $payment_method = $row['payment_method'];
  
        if($status=='Pending'){$colour='warning';}
        else if($status=='slip Uploaded'){$colour='primary';}
        else if($status=='Conformed'){$colour='success';}
        else if($status=='Canceled'){$colour='danger';}
        else if($status=='Order Shipped'){$colour='dark';}

        echo"
        
<tr>
    <td><a class='navi-link' href='./account.php?order_details=$order_id' data-toggle='modal'>DORQ$order_id</a></td>
    <td>$order_date</td>
    <td>$shipping_method</td>
    <td><span class='badge badge-$colour m-0'>$status</span></td>
    <td><span>$payment_method</span></td>
</tr>
        
        ";

       }}
?>


                    </tbody>
                </table>
            </div>