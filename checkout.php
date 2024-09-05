<?php
include('header.php');
include("./include/connect.php");
if (!isset($_SESSION["firstname"])){
    echo "<script>window.location.href = './login.php';</script>";
}
$name1 = $_SESSION["firstname"] ;
$name2 = $_SESSION["lastname"] ;
$email = $_SESSION["email"] ;
$mobile = $_SESSION["mobile"] ;
$address = $_SESSION["address"] ;
$user_id = $_SESSION['user_id'] ;


if(isset($_POST['submit_checkout'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $postal = $_POST['postal'];
    $shipping = $_POST['shipping'];
    $pay_method = $_POST['pay_method']; 


    $stmt = $conn->prepare("INSERT INTO orders (`user_id`, `name`,`phone` , `email`, `address` , `country`,`city`,`postal_code`,`shipping_method`,`payment_method`) VALUES (?, ?,?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssssss", $user_id, $name,$phone, $email,$address, $country, $city, $postal, $shipping, $pay_method);
    $stmt->execute();
    $order_id = $stmt->insert_id;

//      // Insert each item into order_items
//      $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
//      foreach ($cart as $item) {
//          $product_id = $item['product_id'];
//          $quantity = $item['quantity'];
//          $price = $item['price'];
//          $total_amount += $quantity * $price;
//          $stmt->bind_param("iiid", $order_id, $product_id, $quantity, $price);
//          $stmt->execute();
// }

$stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price, total_price ) VALUES (?, ?, ?, ?, ?)");
global $conn;
$ip=getIPAddress();
$get_cart = "SELECT cart.cart_id, products.product_name,products.product_id, products.product_price,products.product_old_price, cart.quantity , products.main_image
             FROM `cart` 
            JOIN products ON cart.product_id = products.product_id 
             WHERE `ip_address`='$ip'";
$cart_details = mysqli_query($conn, $get_cart);
    $total=0;
    $final_total= 0;

    while($car_row = mysqli_fetch_assoc($cart_details)){
    $quantity  = $car_row["quantity"];
    $product_id = $car_row["product_id"];
    $product_img = $car_row["main_image"];
    $product_price = $car_row["product_price"];
    $subtotal = $car_row["quantity"]* $car_row["product_price"];
    $total += $subtotal;
    $final_total = $total-28 +25 +18.25;

    
      $stmt->bind_param("iiiii", $order_id, $product_id, $quantity, $product_price, $subtotal);
      $stmt->execute();

    }




    
    $clear_cart = "DELETE  FROM `cart` WHERE ip_address ='$ip' ";
    mysqli_query($conn, $clear_cart);

    echo"<script>alert('Order has pladed')</script> ";


    if($pay_method == "Bank Deposite"){
        echo "<script>window.location.href = './bank_payment.php?paynow=$order_id&amount=$final_total';</script>";
    }
    else if($pay_method == "Credit/Debit Card"){
        echo "<script>window.location.href = './card_payment.php?paynow=$order_id&amount=$final_total';</script>";

    }
    else if($pay_method ==  "Cash on Delivery"){
        echo "<script>window.location.href = './thank-you.php?thankyou=$order_id&amount=$final_total';</script>";

    }

}



?>

<div>

 <!-- Checkout page body -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<div class="container  checkout-div">
<form action="" method="post">
    <div class="row">
        <div class="col-xl-8">

            <div class="card">
                <div class="card-body">
                    <ol class="activity-checkout mb-0 px-4 mt-3">
                        <li class="checkout-item">
                            <div class="avatar checkout-icon p-1">
                                <div class="avatar-title rounded-circle bg-primary">
                                    <i class="bx bxs-receipt text-white font-size-20"></i>
                                </div>
                            </div>
                            <div class="feed-item-list">
                                <div>
                                    <h5 class="font-size-16 mb-1">Billing Info</h5>
                                    <p class="text-muted text-truncate mb-4">Complete your order details</p>
                                    <div class="mb-3">
                                        
                                            <div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="billing-name"  >Name</label>
                                                            <input type="text" name="name" required class="form-control" id="billing-name" placeholder="Enter name" value='<?php echo" $name1 $name2 ";?>'>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="billing-email-address">Email Address</label>
                                                            <input type="email" class="form-control" required name="email" id="billing-email-address" placeholder="Enter email" value='<?php echo" $email ";?>'>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="billing-phone">Phone</label>
                                                            <input type="text" class="form-control" required name="phone" id="billing-phone" placeholder="Enter Phone no." value='<?php echo" $mobile ";?>'>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="billing-address">Address</label>
                                                    <input class="form-control" id="billing-address" required name="address"  placeholder="Enter full address" value='<?php echo"$address";?>'></input>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-4 mb-lg-0">
                                                            <label class="form-label" >Country</label>
                                                            <select class="form-control form-select" name="country" title="Country">
                                                                <option value="Sri Lanka">Sri Lanka</option>
                                                                <option value="India">India</option>
                                 
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="mb-4 mb-lg-0">
                                                            <label class="form-label" for="billing-city">City</label>
                                                            <input type="text" class="form-control" id="billing-city" placeholder="Enter City" name="city" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="mb-0">
                                                            <label class="form-label" for="zip-code">Zip / Postal code</label>
                                                            <input type="text" class="form-control" id="zip-code" placeholder="Enter Postal code" name="postal" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="checkout-item">
                            <div class="avatar checkout-icon p-1">
                                <div class="avatar-title rounded-circle bg-primary">
                                    <i class="bx bxs-truck text-white font-size-20"></i>
                                </div>
                            </div>
                            <div class="feed-item-list">
                                <div>
                                    <h5 class="font-size-16 mb-1">Shipping Info</h5>
                                    <p class="text-muted text-truncate mb-4">Select Shipping method</p>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div data-bs-toggle="collapse">
                                                    <label class="card-radio-label mb-0">
                                                        <input type="radio" name="shipping" id="info-address1" class="card-radio-input" value="sl post" checked="">
                                                        <div class="card-radio text-truncate p-3">
                                                            <span class="fs-14 mb-4 d-block"><b>SL Post</b></span>
                                                            <span class="fs-14 mb-2 d-block"> Delivery within : 2-3 weeks</span>
                                                            <span class="text-muted fw-normal text-wrap mb-1 d-block">Your package will  arived  from Sri lankan <br> post</span>
                                                           
                                                        </div>
                                                    </label>
                                                    <div class="edit-btn bg-light  rounded">
                                                        <a href="#" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit">
                                                        <i class="fa-solid fa-truck"></i>                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-sm-6">
                                                <div>
                                                    <label class="card-radio-label mb-0">
                                                        <input type="radio" name="shipping" id="info-address2" value="pronto" class="card-radio-input">
                                                        <div class="card-radio text-truncate p-3">
                                                            <span class="fs-14 mb-4 d-block"><b>Pronto</b></span>
                                                            <span class="fs-14 mb-2 d-block">Delivery within : 4-5 Days</span>
                                                            <span class="text-muted fw-normal text-wrap mb-1 d-block">Your package will arived from Pronto Courier Service</span>
                                                        </div>
                                                    </label>
                                                    <div class="edit-btn bg-light  rounded">
                                                        <a href="#" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit">
                                                        <i class="fa-solid fa-truck"></i>                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="checkout-item">
                            <div class="avatar checkout-icon p-1">
                                <div class="avatar-title rounded-circle bg-primary">
                                    <i class="bx bxs-wallet-alt text-white font-size-20"></i>
                                </div>
                            </div>
                            <div class="feed-item-list">
                                <div>
                                    <h5 class="font-size-16 mb-1">Payment Info</h5>
                                    <p class="text-muted text-truncate mb-4">Select your Payment option</p>
                                </div>
                                <div>
                                    <h5 class="font-size-14 mb-3">Payment method :</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6">
                                            <div data-bs-toggle="collapse">
                                                <label class="card-radio-label">
                                                    <input type="radio" name="pay_method" id="pay-methodoption1" value="Credit/Debit Card" class="card-radio-input">
                                                    <span class="card-radio py-3 text-center text-truncate">
                                                        <i class="bx bx-credit-card d-block h2 mb-3"></i>
                                                        Credit / Debit Card
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3 col-sm-6">
                                            <div>
                                                <label class="card-radio-label">
                                                    <input type="radio" name="pay_method" id="pay-methodoption2" value="Bank Deposite" class="card-radio-input">
                                                    <span class="card-radio py-3 text-center text-truncate">
                                                    <i class="fa-solid fa-building-columns d-block h2 mb-3"></i>
                                                        Bank Deposite
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div>
                                                <label class="card-radio-label">
                                                    <input type="radio" name="pay_method" id="pay-methodoption3" value="Cash on Delivery" class="card-radio-input" checked="">

                                                    <span class="card-radio py-3 text-center text-truncate">
                                                        <i class="bx bx-money d-block h2 mb-3"></i>
                                                        <span>Cash on Delivery</span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row my-4">
                <div class="col">
                    <a href="index.php" class="btn btn-link text-muted">
                        <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
                </div> <!-- end col -->
                <div class="col">
                   
                </div> <!-- end col -->
            </div> <!-- end row-->
        </div>
        <div class="col-xl-4 ">
            <div class="card checkout-fnl checkout-order-summary">
                <div class=" card-body">
                    <div class="p-3 bg-light mb-3">
                        <h5 class="font-size-16 mb-0">Order Summary <span class="float-end ms-2">#MN0124</span></h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered mb-0 table-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0" style="width: 110px;" scope="col">Product</th>
                                    <th class="border-top-0" scope="col">Product Desc</th>
                                    <th class="border-top-0" scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                global $conn;
                                if(isset($_GET["checkout"])){
                                    global $conn;
                                    $ip=getIPAddress();
                                    $get_cart = "SELECT cart.cart_id, products.product_name,products.product_id, products.product_price,products.product_old_price, cart.quantity , products.main_image
                                                 FROM `cart` 
                                                JOIN products ON cart.product_id = products.product_id 
                                                 WHERE `ip_address`='$ip'";
                                    $cart_details = mysqli_query($conn, $get_cart);
                                    if(mysqli_num_rows($cart_details) > 0){
                                        $total=0;
                                        $final_total= 0;
                                
                                
                                        while($car_row = mysqli_fetch_assoc($cart_details)){
                                        $quantity  = $car_row["quantity"];
                                        $cart_id  = $car_row["cart_id"];
                                        $product_name = $car_row["product_name"];
                                        $product_id = $car_row["product_id"];
                                        $product_img = $car_row["main_image"];
                                        $product_price = $car_row["product_price"];
                                        $product_old_price = $car_row["product_old_price"];
                                        $subtotal = $car_row["quantity"]* $car_row["product_price"];
                                        $total += $subtotal;
                                        $final_total = $total-28 +25 +18.25;
                                    
                                        echo"
                                        <tr>
                                        <th scope='row'><img src='./admin/product_img/$product_img' alt='$product_name' title='product-img' class='avatar rounded'></th>
                                        <td>
                                            <h5 class='font-size-16 text-truncate'><a href='#' class='text-dark'>ID - $product_id </a></h5>

                                            <p class='text-muted mb-0 mt-1'>$ $product_price x $quantity</p>
                                        </td>
                                        <td>$ $subtotal</td>
                                    </tr>
                                        
                                        
                                        ";
                                    
                                    
                                    }}}
                                
                                ?>

                                <tr>
                                    <td colspan="2">
                                        <h5 class="font-size-14 m-0">Sub Total :</h5>
                                    </td>
                                    <td><h5><?php echo"
                                     $ $total
                                    ";?></h5>
                                       
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h5 class="font-size-14 m-0">Discount :</h5>
                                    </td>
                                    <td>
                                        <b>- $ 28</b>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <h5 class="font-size-14 m-0">Shipping Charge :</h5>
                                    </td>
                                    <td>
                                        <b>$ 25</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h5 class="font-size-14 m-0">Estimated Tax :</h5>
                                    </td>
                                    <td>
                                        <b>$ 18.25</b>
                                    </td>
                                </tr>                              
                                    
                                <tr class="bg-light">
                                    <td colspan="2">
                                        <h5 class="font-size-14 m-0">Total:</h5>
                                    </td>
                                    <td><h5>
                                    <?php echo"
                                     $ $final_total
                                    ";?></h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="checkout-button"  name="submit_checkout" >Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>







</div>
    


<?php
include('footer.php');
?>     
