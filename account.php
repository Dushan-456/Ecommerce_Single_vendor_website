<?php
include("./header.php");

if (!isset($_SESSION["firstname"])){
   echo "<script>window.location.href = './login.php';</script>";
}

$user_id = $_SESSION["user_id"];
$name = $_SESSION["firstname"] ;
$name2 = $_SESSION["lastname"] ;
$address =  $_SESSION["address"] ;
$pic = $_SESSION["profile_pic"] ;


?>
<div>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container mb-4 main-container myacc  ">
    <div class="row">
        <div class="col-lg-4 pb-5">
            <!-- Account Sidebar-->
            <div class="author-card pb-3">
                <div class="author-card-cover" style="background-image: url(https://bootdey.com/img/Content/flores-amarillas-wallpaper.jpeg);"><a class="btn btn-style-1 btn-white btn-sm" href="#" data-toggle="tooltip" title="" data-original-title="You currently have 290 Reward points to spend"><i class="fa fa-award text-md"></i></a></div>
                <div class="author-card-profile">
                    <div class="author-card-avatar"><img src="./user_area/profile_pics/<?php echo"$pic"; ?>" alt="<?php echo" $name $name2"; ?>">
                    </div>
                    <div class="author-card-details">
                        <h5 class="author-card-name text-lg"><?php echo" $name $name2"; ?></h5><span class="author-card-position"><?php echo" $address "; ?></span>
                    </div>
                </div>
            </div>
            <div>
            <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item ">
          <a href="account.php?dashboard" class="nav-link <?php if(isset($_GET['dashboard'])){echo'active';}?>" aria-current="page">
          <i class="fa-solid fa-gauge "></i>  
                  Dashboard
          </a>
        </li>

        <li>
          <a href="account.php?myprofile" class="nav-link <?php if(isset($_GET['myprofile'])){echo'active';}?>">
          <i class="fa-solid fa-calendar-days"></i>
              My Details
          </a>
        </li>

        <li>
          <a href="account.php?myorders" class="nav-link <?php if(isset($_GET['myorders']) || isset($_GET['order_details']) || isset($_GET['payslip'])){echo'active';}?>">
          <i class="fa-solid fa-book "></i>
                     My Orders
          </a>
        </li>

        <li>
          <a href="cart.php?show_cart" class="nav-link <?php if(isset($_GET['users'])){echo'active';}?>">
          <i class="fa-solid fa-cart-shopping "></i>
                      My cart
          </a>
        </li>
        <li>
          <a href="index.php?users" class="nav-link <?php if(isset($_GET['users'])){echo'active';}?>">
          <i class="fa-solid fa-heart"></i>
                                My Wish List
          </a>
        </li>
        <li>
          <a href="account.php?pwdchange" class="nav-link <?php if(isset($_GET['pwdchange'])){echo'active';}?>">
          <i class="fa-solid fa-gear"></i>
                                Change Password
          </a>
        </li>

      </ul>
      <hr>
            </div>

        </div>
        <!-- Orders Table-->
        <div class="col-lg-8 pb-5">
        <?php
            if(isset($_GET['myorders'])){
              include('account.orders.php');
            }
            if(isset($_GET['dashboard'])){
              include('account.dash.php');
            }
            if(isset($_GET['myprofile'])){
              include('account.my.php');
            }
            if(isset($_GET['pwdchange'])){
              include('account.pwd.php');
            }
            if(isset($_GET['order_details'])){
              include('account.order.details.php');
            }
            if(isset($_GET['payslip'])){
              include('account.slip.php');
            }


            ?>
        </div>
    </div>
</div>




</div>



<?php
include("./footer.php");
?>