<?php
include("./include/connect.php");
include('./function/function.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0 , maximum-scale=1.0 , minimum-scale=1.0">
      <title>Bootstrap</title>
      <link rel="stylesheet" href="style.css" />

      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">








      <link
         href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
         rel="stylesheet"
         integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
         crossorigin="anonymous" />
         <link
         rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
         integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
         crossorigin="anonymous"
         referrerpolicy="no-referrer" />
      <link
         rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
         integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
         crossorigin="anonymous"
         referrerpolicy="no-referrer" />
   </head>
   <body>

<!------------------- header ------------------------>

      <header class=" text-bg-dark pe-5 ps-5 pb-2 pt-2">
         <div class="container-fluid">
            <div
               class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
               <div class="col-lg-4 d-flex">
                  <ul
                     class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                     <li>
                        <a href="#" class="nav-link px-2 text-white"
                           ><i
                              class="fa-solid fa-envelope fa-sm"
                              style="color: #ffffff"></i
                           >&nbsp; &nbsp;navodyadushan123@gmail.com</a
                        >
                     </li>
                     <li>
                        <a href="#" class="nav-link px-2 text-white"
                           ><i
                              class="fa-solid fa-phone fa-sm"
                              style="color: #ffffff"></i
                           >&nbsp; &nbsp;+94 719675669</a
                        >
                     </li>
                     <li>
                        <a href="" class="nav-link px-2">
                           &nbsp;&nbsp;<i class="fa-brands fa-facebook fa-lg" style="color: #ffffff;"></i>
                           &nbsp;<i class="fa-brands fa-square-instagram fa-lg" style="color: #ffffff;"></i>
                           &nbsp;<i class="fa-brands fa-whatsapp fa-lg" style="color: #ffffff;"></i>
                        </a>
                     </li>
                  </ul>
               </div>
               <div class="col-lg-4">
                    <div class="search-form">
                    <form action="result.php" method="get"
                     class="col-12 d-flex col-lg-auto mb-3 mb-lg-0 me-lg-3"
                     role="search">
                     <input
                        type="search"
                        class="form-control form-control-dark"
                        placeholder="Search your product here..."
                        aria-label="Search" required name="search_data" />
                     <a href=""><button type="submit" name="search_submit" value="searched">
                     <i class="fa-solid fa-magnifying-glass fa-xl" style="color: #ffffff;"></i>                     </button></a>
                  </form>
                    </div>
               </div>

               <div class="col-lg-4  text-end div01">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item dropdown">
                     <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        ><i class="fa-solid fa-dollar-sign fa-sm" style="color: #ffffff;"></i>&nbsp;USD</a
                     >
                     <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">LKR</a></li>
                        <li>
                           <a class="dropdown-item" href="#">USD</a>
                        </li>
                        <li>
                           <a class="dropdown-item" href="#"
                              >GPA</a
                           >
                        </li>
                     </ul>
                  </li>
               </ul>
                 <a href="account.html"><i class="fa-regular fa-heart fa-2xl" style="color: #ffffff;"></i></a>&nbsp; &nbsp;&nbsp; &nbsp;
                 <a href="account.html"><i class="fa-solid fa-circle-user fa-2xl" style="color: #ffffff;"></i></a>&nbsp; &nbsp;&nbsp; &nbsp;
                  <a href="cart.php?show_cart"><i
                     class="fa-solid fa-cart-shopping fa-2xl"
                     style="color: #ffffff"></i
                  ><sup>
                     
                     <?php
                    cart_count();
                 
                     ?>
                  </sup><sub>$
                     <?php
                     cart_price_count();
                     ?>
                  </sub></a>&nbsp; &nbsp;&nbsp; &nbsp;
                  <?php
                  if (isset($_SESSION['firstname'])){
                     $first_name =$_SESSION['firstname'] ;
                     $profile =$_SESSION['profile_pic'] ;
                     echo "
<div class='dropdown'>
    <a href='#' class='d-flex username align-items-center link-body-emphasis text-decoration-none dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>
      <strong class='username' style='colour: white !important;'>Hello  $first_name</strong> &nbsp;
 <img src='./user_area/profile_pics/$profile' alt='' width='40' height='40' class='rounded-circle me-2' style='border: 1px solid white;'>

    </a>
    <ul class='dropdown-menu text-small shadow' >
      <li><a class='dropdown-item' href='./account.php?dashboard'>My Account</a></li>
      <li><a class='dropdown-item' href='./account.php?myprofile'>My Details</a></li>
      <li><a class='dropdown-item' href='./account.php?myorders'>My Orders</a></li>
      <li><a class='dropdown-item' href='./account.php?pwdchange'>Password Change</a></li>
      <li><hr class='dropdown-divider'></li>
      <li><a class='dropdown-item' href='logout.php'><i class='fa-solid fa-right-from-bracket'></i>&nbsp;&nbsp;Log out</a></li>
    </ul>
  </div>
                     ";
                  } else{

                     echo "
                     <a href='./login.php'><button type='button' class='btn btn-outline-light me-2'>
    Login
 </button></a>
 <a href='./registration.php'><button type='button' class='btn btn-warning'>Sign-up</button></a>
                     ";
                  }
                  
                  
                  ?>
                  
               </div>
            </div>
         </div>
      </header>

      <nav
         class="navbar navbar-expand-lg navbar-dark bg-dark"
         aria-label="Ninth navbar example">
         <div class="nav1 ">
            <a class="navbar-brand me-5" href="index.php"><img class="logo" src="assest/logo.png" alt=""></a>
            <button
               class="navbar-toggler"
               type="button"
               data-bs-toggle="collapse"
               data-bs-target="#navbarsExample07XL"
               aria-controls="navbarsExample07XL"
               aria-expanded="false"
               aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse"  id="navbarsExample07XL">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0 menu11">
                  <li class="catego nav-item dropdown">
                     <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        >&nbsp;&nbsp;<i class="fa-solid fa-bars fa-sm" style="color: #ffffff;"></i> &nbsp; &nbsp;All Categories</a
                     >
                     <ul class="dropdown-menu">
                     <?php
                           header_cat() ;

                     
                     ?>
                        
                        

                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " aria-current="page" href="#"
                        >Choice</a
                     >
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">Super Deals</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link">Sale</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link">20% Discount</a>
                  </li>
                  <li class="nav-item dropdown">
                     <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        >Gifts</a
                     >
                     <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li>
                           <a class="dropdown-item" href="#">Another action</a>
                        </li>
                        <li>
                           <a class="dropdown-item" href="#"
                              >Something else here</a
                           >
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link">Beauty & Health</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link">Black FriDay</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link">Top sale</a>
                  </li>

                  <li class="nav-item dropdown">
                     <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        >More</a
                     >
                     <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li>
                           <a class="dropdown-item" href="#">Another action</a>
                        </li>
                        <li>
                           <a class="dropdown-item" href="#"
                              >Something else here</a
                           >
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
         </div>
      </nav>