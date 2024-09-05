<?php
  include("../include/connect.php");

?>

    <?php


      
      global $conn;

      $get_order_details = "SELECT * FROM `orders` ORDER BY order_date DESC ";
      $result = mysqli_query($conn, $get_order_details);
       $order_count = mysqli_num_rows($result);

       if ($order_count > 0) {

      echo"
      <div>
<h1>All Orders</h1>
<h3>Total Orders : $order_count</h3>
<table class='table  table-striped'>
  <thead>
    <tr>
      <th scope='col'>Order ID</th>
      <th scope='col'>Email</th>
      <th scope='col'>Customer</th>
      <th scope='col'>Phone</th>
      <th scope='col'>Date & Time</th>
      <th scope='col'>Status</th>
      <th scope='col'>Shipping Method</th>
      <th scope='col'>Payment Method</th>
      <th scope='col'>View All Details</th>
      <th scope='col'>Delete</th>
    </tr>
  </thead>
  <tbody>
      
      ";
      while($row = mysqli_fetch_array($result)){
        $order_id = $row["id"];
        $email = $row['email'];
        $name = $row['name'];
        $phone = $row['phone'];
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
        <tr >
        <td><a href='?order_details=$order_id'>DORQ$order_id</a></td>
        <td>$email</td>
        <td>$name</td>
        <td>$phone</td>
        <td>$order_date</td>
        <td><span class='badge bg-$colour font-size-12 ms-2'>$status</span></td>
        <td>$shipping_method</td>
        <td>$payment_method</td>
        <td><a href='?order_details=$order_id'><button class='action-but'><i class='fa-solid fa-pen-to-square fa-xl' style='color: #0d63f8;'></i></button></a></td>
        <td><a href='?delete_order=$order_id'><button class='action-but'><i class='fa-solid fa-trash fa-xl' style='color: #ff0000;'></i></button></a></td>
      </tr>
        
        ";

      }
    } else {
      echo "
      <div class=''><h1 class='text-center mb-5'>Sorry No Orders<br><br><i class='fa-regular fa-face-frown fa-bounce fa-2xl'></i></h1></div>
      
      ";    }
    
    
    ?>





          </tbody>
        </table>
    </div>