<?php

include('header.php');
include('./include/connect.php');

if (!isset($_SESSION["firstname"])){
    echo "<script>window.location.href = './login.php';</script>";
 }
global $conn;
// $get_order_details = "SELECT cart.cart_id, products.product_name,products.product_id, products.product_price,products.product_old_price, cart.quantity , products.main_image
//                                  FROM `cart` 
//                                 JOIN products ON cart.product_id = products.product_id 
//                                  WHERE `ip_address`=''";
$order_id=$_GET['thankyou'];
$get_order_details = "SELECT * FROM `orders` WHERE id = $order_id ";
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





?>


 <!-- Checkout page body -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

 <div class="container thankyou">
<div class="tnk">
    <i class="fa-solid iconk fa-circle-check fa-2xl" style="color: #1dcb06;"></i>
    <h1>Thank You For Your Order</h1>
    <h1>Your Order has Completed</h1>
</div>
 <div class="row">
         <div class="col-lg-12">
             <div class="card thankyou">
                 <div class="card-body">
                     <div class="invoice-title">
                         <h4 class="float-end font-size-15">Invoice #DORQ<?php echo $order_id; if($status=='Pending'){echo" <span class='badge bg-warning font-size-12 ms-2'>Payment Pending</span>";}else if($status=='slip Uploaded'){echo" <span class='badge bg-success font-size-12 ms-2'>Payment Complete</span>";}?></h4>
                         <div class="mb-4">
                            <h2 class="mb-1 text-muted">Bootdey.com</h2>
                         </div>
                         <div class="text-muted">
                             <p class="mb-1">3184 Spruce Drive Pittsburgh, PA 15201</p>
                             <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> xyz@987.com</p>
                             <p><i class="uil uil-phone me-1"></i> 012-345-6789</p>
                         </div>
                     </div>
 
                     <hr class="my-4">
 
                     <div class="row">
                         <div class="col-sm-6">
                             <div class="text-muted">
                                 <h5 class="font-size-16 mb-3">Billed To:</h5>
                                 <h5 class="font-size-15 mb-2"><?php echo $name;?></h5>
                                 <p class="mb-1"><?php echo $address;?></p>
                                 <p class="mb-1"><?php echo "$country  $postal_code";?></p>
                                 <p class="mb-1"><?php echo $email;?></p>
                                 <p><?php echo $phone;?></p>
                             </div>
                         </div>
                         <!-- end col -->
                         <div class="col-sm-6">
                             <div class="text-muted text-sm-end">
                                 <div>
                                     <h5 class="font-size-15 mb-1">Invoice No:</h5>
                                     <p>#DORQ<?php echo $order_id;?></p>
                                 </div>
                                 <div class="mt-4">
                                     <h5 class="font-size-15 mb-1">Invoice Date & time:</h5>
                                     <p><?php echo $order_date;?></p>
                                 </div>
                                 <div class="mt-4">
                                     <h5 class="font-size-15 mb-1">Order No:</h5>
                                     <p>#<?php echo $order_id;?></p>
                                 </div>
                             </div>
                         </div>
                         <!-- end col -->
                     </div>
                     <!-- end row -->
                     
                     <div class="py-2">
                         <h5 class="font-size-15">Order Summary</h5>
 
                         <div class="table-responsive">



                             <table class="table align-middle table-nowrap table-centered mb-0">
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
    <td> <img class='thankimg' src='./admin/product_img/$img' alt='$product_name'>
</td>
    <td >
            <h6 class='namerow text-truncate font-size-14 mb-1'>$product_name</h6>
    </td>
    <td>$ $price</td>
    <td>$quantity</td>
    <td class='text-end'>$ $total_price</td>
</tr>
                
                ";

            }
            ?>
                                     <!-- end tr -->

                                     <!-- end tr -->
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
                             </table><!-- end table -->
                         </div><!-- end table responsive -->
                         <div class="d-print-none mt-4">
                             <div class="float-end">
                                 <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                                 <a href="#" class="btn btn-primary w-md">Send</a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div><!-- end col -->
     </div>
     <h3>Share Us On</h3>
     <div class="tnk mb-5">
        <div>
                <!-- Facebook -->
                <a class="btn text-white" data-mdb-ripple-init style="background-color: #3b5998;" href="#!" role="button">
                    <i class="fab fa-facebook-f"></i>
                </a>
                
                <!-- Twitter -->
                <a class="btn text-white" data-mdb-ripple-init style="background-color: #55acee;" href="#!" role="button">
                    <i class="fab fa-twitter"></i>
                </a>
                
                <!-- Google -->
                <a class="btn text-white" data-mdb-ripple-init style="background-color: #dd4b39;" href="#!" role="button">
                    <i class="fab fa-google"></i>
                </a>
                
                <!-- Instagram -->
                <a class="btn text-white" data-mdb-ripple-init style="background-color: #ac2bac;" href="#!" role="button">
                    <i class="fab fa-instagram"></i>
                </a>
        </div>
     </div>
 </div>









 <?php
include('footer.php');
?>
