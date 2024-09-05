<?php
include("../include/connect.php");
session_start();
if (!isset($_SESSION["role"])){
  header("Location:./adminlogin.php");
}

            // ----------------Delete product from admin-------------------

            global $conn;
            if(isset($_GET['delete_product'])){
              $product_id = $_GET['delete_product'];
              $delete = "DELETE FROM `products` WHERE `products`.`product_id` = $product_id ";
              $result= mysqli_query($conn, $delete);
              if($result){
                echo "<script>alert('Product Deleted')</script>";
                echo "<script>window.location.href = './index.php?allproduct';</script>";
                exit();
              }

            }
            // ----------------Delete Category from admin-------------------

            global $conn;
            if(isset($_GET['delete_user'])){
              $user_id= $_GET['delete_user'];
              $delete = "DELETE FROM `users` WHERE `users`.`user_id` = $user_id";
              $result= mysqli_query($conn, $delete);
              if($result){
                echo "<script>alert('User Deleted')</script>";
                echo "<script>window.location.href = './index.php?users';</script>";
                exit();
              }

            }
            // ----------------Delete User from admin-------------------

            global $conn;
            if(isset($_GET['delete_category'])){
              $category_id= $_GET['delete_category'];
              $delete = "DELETE FROM `categories` WHERE `categories`.`category_id` = $category_id";
              $result= mysqli_query($conn, $delete);
              if($result){
                echo "<script>alert('Category Deleted')</script>";
                echo "<script>window.location.href = './index.php?categories';</script>";
                exit();
              }}

            // ----------------Delete order from admin-------------------

            global $conn;
            if(isset($_GET['delete_order'])){
              $order_id= $_GET['delete_order'];
              $delete = "DELETE FROM `orders` WHERE `orders`.`id` = $order_id";
              $result= mysqli_query($conn, $delete);
              if($result){
                echo "<script>alert('Order Deleted')</script>";
                echo "<script>window.location.href = './index.php?orders';</script>";
                exit();
              }

            }



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin panel</title>
  <link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
  crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css">
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
  integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>





  <header class="py-3 mb-3 border-bottom bg-black">
    <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
      <div class="dropdown">
        <a href=""  >
          <img class="logo" src="../assest/logo.png" alt="">
        </a>

      </div>

      <div class="d-flex align-items-center">
        <form class="w-100 me-3" role="search">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <?php
          
                  if (isset($_SESSION['firstname'])){
                     $first_name =$_SESSION['firstname'] ;
                     $profile =$_SESSION['profile_pic'] ;
                     echo "
<div class='dropdown'>
    <a href='#' class='d-flex username align-items-center link-body-emphasis text-decoration-none dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>
      <strong class='username' style='colour: white !important;'>Hello  $first_name</strong> &nbsp;
 <img src='../user_area/profile_pics/$profile' alt='' width='40' height='40' class='rounded-circle me-2' style='border: 1px solid white;'>

    </a>
    <ul class='dropdown-menu text-small shadow' >
      <li><a class='dropdown-item' href='#'>My Account</a></li>
      <li><a class='dropdown-item' href='#'>Settings</a></li>
      <li><a class='dropdown-item' href='index.php?allproduct'>All products</a></li>
      <li><a class='dropdown-item' href='index.php?addproduct'>Add New products</a></li>
      <li><a class='dropdown-item' href='index.php?users'>Costomers</a></li>
      <li><a class='dropdown-item' href='index.php?categories'>Categories</a></li>
      <li><hr class='dropdown-divider'></li>
      <li><a class='dropdown-item' href='../logout.php'><i class='fa-solid fa-right-from-bracket'></i>&nbsp;&nbsp;Log out</a></li>
    </ul>
  </div>
                     ";
                  } 
                  
                  
                  ?>
      </div>
    </div>
  </header>

<div class="container-fluid row">
  <div class="col-md-2 ">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary adminsidebar" style="width: 280px;">
      <a href="index.php?dashboard" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Admin Panel</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item ">
          <a href="index.php?dashboard" class="nav-link <?php if(isset($_GET['dashboard'])){echo'active';}?>" aria-current="page">
          <i class="fa-solid fa-gauge "></i>  
                  Dashboard
          </a>
        </li>
        <li>
          <a href="index.php?allproduct" class="nav-link  <?php if(isset($_GET['allproduct'])){echo'active';}?>">
          <i class="fa-solid fa-cart-shopping "></i>
                      All Products
          </a>
        </li>
        <li>
          <a href="index.php?addproduct" class="nav-link <?php if(isset($_GET['addproduct'])){echo'active';}?>">
          <i class="fa-solid fa-cart-plus "></i>
                      Add Products
          </a>
        </li>
        <li>
          <a href="index.php?categories" class="nav-link <?php if(isset($_GET['categories'])){echo'active';}?>">
          <i class="fa-solid fa-calendar-days"></i>
                                Categories
          </a>
        </li>
        <li>
          <a href="index.php?addcategory" class="nav-link <?php if(isset($_GET['addcategory'])){echo'active';}?>">
          <i class="fa-regular fa-calendar-plus"></i>
                               Add New Categories
          </a>
        </li>
        <li>
          <a href="index.php?orders" class="nav-link <?php if(isset($_GET['orders']) || isset($_GET['order_details']) || isset($_GET['payslip'])){echo'active';}?>">
          <i class="fa-solid fa-book "></i>
                      Orders
          </a>
        </li>

        <li>
          <a href="index.php?users" class="nav-link <?php if(isset($_GET['users'])){echo'active';}?>">
          <i class="fa-solid fa-user "></i>
                      All users
          </a>
        </li>
        <li>
          <a href="" class="nav-link <?php if(isset($_GET[''])){echo'';}?>">
          <i class="fa-solid fa-gear"></i>
                                Settings
          </a>
        </li>

      </ul>
      <hr>

                  <?php
                  if (isset($_SESSION['firstname'])){
                     $first_name =$_SESSION['firstname'] ;
                     $profile =$_SESSION['profile_pic'] ;
                     echo "
<div class='dropdown'>
    <a href='#' class='d-flex  align-items-center link-body-emphasis text-decoration-none dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>
      <strong class='' style='colour: white !important;'>Hello  $first_name</strong> &nbsp;
 <img src='../user_area/profile_pics/$profile' alt='' width='40' height='40' class='rounded-circle me-2' style='border: 1px solid white;'>

    </a>
    <ul class='dropdown-menu text-small shadow' >
      <li><a class='dropdown-item' href='#'>My Account</a></li>
      <li><a class='dropdown-item' href='#'>Settings</a></li>
      <li><a class='dropdown-item' href='index.php?allproduct'>All products</a></li>
      <li><a class='dropdown-item' href='index.php?addproduct'>Add New products</a></li>
      <li><a class='dropdown-item' href='index.php?users'>Costomers</a></li>
      <li><a class='dropdown-item' href='index.php?categories'>Categories</a></li>
      <li><hr class='dropdown-divider'></li>
      <li><a class='dropdown-item' href='../logout.php'><i class='fa-solid fa-right-from-bracket'></i>&nbsp;&nbsp;Log out</a></li>
    </ul>
  </div>
                     ";
                  } 
                  
                  
                  ?>
    </div>
  </div>
  <div class="col-md-10">
  
        <?php
            if(isset($_GET['allproduct'])){
              include('allproducts.php');
            }
            if(isset($_GET['dashboard'])){
              include('dashboard.php');
            }
            if(isset($_GET[''])){
              include('dashboard.php');
            }
            if(isset($_GET['addproduct'])){
              include('productadd.php');
            }
            if(isset($_GET['categories'])){
              include('categories.php');
            }
            if(isset($_GET['addcategory'])){
              include('addcategory.php');
            }
            if(isset($_GET['users'])){
              include('users.php');
            }
            if(isset($_GET['adduser'])){
              include('adduser.php');
            }
            if(isset($_GET['orders'])){
              include('orders.php');
            }
            if(isset($_GET['order_details'])){
              include('order_details.php');
            }
            if(isset($_GET['payslip'])){
              include('slip.php');
            }
            ?>  
  </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>