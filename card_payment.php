<?php


    if (!isset($_GET["paynow"])){
        echo "<script>window.location.href = './index.php';</script>";

}


include('header.php');
include("./include/connect.php");

if (!isset($_SESSION["firstname"])){
  echo "<script>window.location.href = './login.php';</script>";
}


$amount = $_GET['amount'];
$order_id = $_GET['paynow'];

?>
<div class="container_pay">
<form class="needs-validation mb-5" novalidate="">
<h1 class="mb-3">Complete Your Payment</h1>

    <img src="./assest/cards.jpg" alt="card">
    <h1 class="mb-3">You have to pay : $ <?php echo "$amount";  ?></h1>

    <div class="creditcard p-4" >

            <hr class="mb-4">

            <h4 class="mb-3">Payment details</h4>

        
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text"  class="form-control" id="cc-name" placeholder="ex : JOHN VICK" required="">
                <small class="smltxt ">Full name as displayed on card</small>
                
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="XXXX-XXXX-XXXX-XXXX" required="">
              
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="XX/XX" required="">
               
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="XXX" required="">
              
              </div>
            </div>
            <hr class="mb-4">
            </div>
            <!-- <button class="btn btn-primary btn-lg btn-block mt-5" type="submit"><i class="fa-solid fa-money-check" style="color: #ffffff;"></i> &nbsp; Pay Now</button> -->

          </form>
       <a href="./thank-you.php?thankyou=<?php echo $order_id ?>"> <button class="btn btn-primary btn-lg btn-block mb-5" type=""><i class="fa-solid fa-money-check" style="color: #ffffff;"></i> &nbsp; Pay Now</button>
       <a href="./thank-you.php?thankyou=<?php echo $order_id ?>"> <button class="btn btn-success btn-lg btn-block mb-5" type=""><i class="fa-solid fa-money-check" style="color: #ffffff;"></i> &nbsp; Pay Later</button>
       </a>

</div>




<?php
include('footer.php');
?> 