<?php
  include("./include/connect.php");




  $order_id = $_GET['order_details'];
  $get_order_details = "SELECT * FROM `orders` JOIN users ON orders.user_id = users.user_id  WHERE `id`=$order_id ";
  $result = mysqli_query($conn, $get_order_details);
  $row = mysqli_fetch_array($result);
  $status = $row['status'];
  $order_date = $row['order_date'];
  $name = $row['name'];
  $email = $row['email'];
  $phone = $row['phone'];
  $address = $row['address'];
  $country = $row['country'];
  $city = $row['city'];
  $postal_code = $row['postal_code'];
  $shipping_method = $row['shipping_method'];
  $payment_method = $row['payment_method'];
  $payment_slip = $row['payment_slip'];

  $user_id  = $row['user_id'];
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $email = $row['email'];
  $mobile = $row['mobile'];
  $user_address = $row['address'];
  $profile_pic = $row['profile_pic'];
  $role = $row['role'];



  if($status=='Pending'){$colour='warning';}
  else if($status=='slip Uploaded'){$colour='primary';}
  else if($status=='Conformed'){$colour='success';}
  else if($status=='Canceled'){$colour='danger';}
  else if($status=='Order Shipped'){$colour='dark';}


?>

<div class="mb-5" >
    <h1>ORDER ID - #DORQ<?php echo $order_id ?></h1>
    <div class="row">
       
        <div class="col-5 shadow p-3 m-3 bg-white rounded"><h3>
            <h3 class="mb-4" >Delivery Details</h3>
            <div class="text-muted">
                                 <h5 class="font-size-16 mb-3">Delivery To:</h5>
                                 <h5 class="font-size-15 mb-2"><?php echo $name;?></h5>
                                 <p class="mb-1"><?php echo $address;?></p>
                                 <p class="mb-1"><?php echo "$country  $postal_code";?></p>
                                 <p class="mb-1"><?php echo $email;?></p>
                                 <p><?php echo $phone;?></p>
                             </div>

        </h3>
    </div>
        <div class="col-6 shadow p-3 m-3 bg-white rounded">
            <h3 class="mb-4">Order Details</h3>
            <label>Order status : </label>&nbsp;&nbsp;<span class='badge p-2 bg-<?php echo $colour;?>  '><?php echo $status;?></span><br><br>
            <label>Payment Method : </label>&nbsp;&nbsp;<label><?php echo $payment_method;?></label><br>
            <label>Delivery Method : </label>&nbsp;&nbsp;<label><?php echo $shipping_method;?></label><br>
                <br><?php if($payment_method=='Bank Deposite'&& ($status=='slip Uploaded' || $status=='Conformed' || $status=='Order Shipped')){
                    echo " <a href='?payslip=$payment_slip'><button type='button' class='btn btn-info'>View Payment Slip</button></a>
";
                }
                if($payment_method=='Bank Deposite' && $status=='Pending'){
                    echo " <a href='bank_payment.php?paynow=$order_id'><button type='button' class='btn btn-info'>Upload Payment Slip</button></a>
";
                }
                ?>
        </div>

    </div>
    <div class="col-12 shadow p-3 m-3 bg-white rounded">
    <h3 class="mb-4">Order Items</h3>


    <table class="table align-middle table-nowrap table-centered mb-5">
                                 <thead>
                                     <tr>
                                         <th style="width: 70px;">No.</th>
                                         <th>Image</th>
                                         <th>Item</th>
                                         <th>Price</th>
                                         <th>Quantity</th>
                                         <th class="text-end" style="width: 120px;">Total</th>
                                     </tr>
                                 </thead><!-- end thead -->
                                 <tbody>
    <?php
     $items_query = "SELECT * FROM `order_items` JOIN products ON order_items.product_id = products.product_id  WHERE `order_id`=$order_id";
     $items_result = mysqli_query($conn, $items_query);
     $num=0;
     $total=0;
     while($items = mysqli_fetch_array($items_result)) {
         $img = $items["main_image"];
         $product_name = $items["product_name"];
         $price = $items["price"];
         $quantity = $items["quantity"];
         $total_price = $items["total_price"];
         $total += $total_price ;
         $num += 1;

         echo"
         <tr>
<th scope='row'>0$num</th>
<td> <img style='height: 90px; width: 90px;' src='./admin/product_img/$img' alt='$product_name'>
</td>
<td class='namerow'>
     <h6 class=' text-truncate font-size-14 mb-1'>$product_name</h6>
</td>
<td>$ $price</td>
<td>$quantity</td>
<td class='text-end'>$ $total_price</td>
</tr>
         
         ";

     }
    
    
    ?>
             <tr>
                                         <th scope="row" colspan="5" class="text-end">Sub Total</th>
                                         <td class="text-end">$<?php echo $total ?></td>
                                     </tr>
                                     <!-- end tr -->
                                     <tr>
                                         <th scope="row" colspan="5" class="border-0 text-end">
                                             Discount :</th>
                                         <td class="border-0 text-end">- $28.00</td>
                                     </tr>
                                     <!-- end tr -->
                                     <tr>
                                         <th scope="row" colspan="5" class="border-0 text-end">
                                             Shipping Charge :</th>
                                         <td class="border-0 text-end">$25.00</td>
                                     </tr>
                                     <!-- end tr -->
                                     <tr>
                                         <th scope="row" colspan="5" class="border-0 text-end">
                                             Tax</th>
                                         <td class="border-0 text-end">$18.25</td>
                                     </tr>
                                     <!-- end tr -->
                                     <tr>
                                         <th scope="row" colspan="5" class="border-0 text-end">Total</th>
                                         <td class="border-0 text-end"><h4 class="m-0 fw-semibold">$<?php echo $total -28+25+18.25 ?></h4></td>
                                     </tr>
                                     <!-- end tr -->
                                 </tbody><!-- end tbody -->
                             </table>

    </div>


</div>




