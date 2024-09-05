<?php



    if (!isset($_GET["paynow"])){
        echo "<script>window.location.href = './index.php';</script>";

}
include('header.php');
include("./include/connect.php");

if (!isset($_SESSION["firstname"])){
    echo "<script>window.location.href = './login.php';</script>";
 }
global $conn;


if(isset($_POST["upload_slip"])){
    $time = date('Y-m-d H:i:s');
    $slip = $_FILES['payment_slip']['name'];
    $tmp_slip = $_FILES['payment_slip']['tmp_name'];
    $order_id = $_GET["paynow"];


    move_uploaded_file($tmp_slip,"./admin/payment_slip/$slip");



$time_query = "UPDATE `orders` SET `payment_time` = '$time' WHERE `orders`.`id` = $order_id";
$time_result = mysqli_query($conn,$time_query);

$paid_query = "UPDATE `orders` SET `status` = 'slip Uploaded' WHERE `orders`.`id` = $order_id";
$paid_result = mysqli_query($conn,$paid_query);

$slip_query = "UPDATE `orders` SET `payment_slip` = '$slip' WHERE `orders`.`id` = $order_id";
$result = mysqli_query($conn,$slip_query);

if($result && $time_result && $paid_result){
    echo"<script>alert('Payment Slip Uploaded')</script> ";
    echo "<script>window.location.href = './thank-you.php?thankyou=$order_id';</script>";

}}

$amount = $_GET['amount'];
$order_id = $_GET["paynow"];

?>
<div class="container_pay">
<form class="needs-validation mb-5" method="post" enctype="multipart/form-data">
<h1 class="mb-3">Upload Your Payment Slip</h1>
<div class="row">
    <div class="col-9">
        <img src="./assest/Sample-Deposit-Slip.png" alt="">
    </div>
    <div class="col-3">
        <img src="./assest/slip.jpeg" alt="">
    </div>
</div>
<h1 class="mb-3">You have to pay : $ <?php echo "$amount";  ?></h1>

<div>
  <label for="formFileLg" class="form-label">select your payment Slip</label>
  <input name="payment_slip" class="form-control form-control-lg" id="formFileLg" type="file" required>
</div>


<button name="upload_slip" class="btn btn-primary btn-lg btn-block mt-5" type="submit"><i class="fa-solid fa-money-check" style="color: #ffffff;"></i> &nbsp; Upload Slip Now</button>

          </form>
          <a href="./thank-you.php?thankyou=<?php echo $order_id ?>">
            <button class="btn btn-success btn-lg btn-block mb-5" ><i class="fa-solid fa-money-check" style="color: #ffffff;"></i> &nbsp; Upload Slip Later</button>

            </a>

</div>




<?php
include('footer.php');
?> 