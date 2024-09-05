<?php
    include("./include/connect.php");
    

    // ------------show all product in home page--------------------------

    function home_products() {
        global$conn ;

        $prod_select_query="SELECT * FROM `products` ORDER BY RAND()";
        $result_product = mysqli_query($conn, $prod_select_query);
        while ($row_product = mysqli_fetch_assoc($result_product)) {
          $product_id = $row_product["product_id"];
          $product_name = $row_product['product_name'];
          $product_category = $row_product['product_category'];
          $product_discription = $row_product['product_discription'];
          $main_image = $row_product['main_image'];
          $product_price = $row_product['product_price'];
          $product_old_price = $row_product['product_old_price'];
          $product_stock = $row_product['product_stock'];

          echo"
          
          <div class= 'item' >
          <a href='single-product.php?product=$product_id'><img class='prodimg' src='./admin/product_img/$main_image' alt='$product_name'></a>
          <a href='?add_to_cart=$product_id'><i class='fa-solid fa-cart-plus fa-xl carticon' ></i></a>
          <a href='single-product.php?product=$product_id'><h4 class='prod-title'>$product_name</h4></a>
          <a href='single-product.php?product=$product_id'><h3 class='prod-price'>USD <span>$product_price</span>.00</h3><label for=''>$product_old_price.00</label></a>
        </div>

          
          ";

        }

    }   


    // ------------show category img on home page--------------------------


    function category_img() {

        global $conn ;

        $select_cat = "SELECT * FROM `categories` ORDER BY  RAND() Limit 7 ";
        $result_cat = mysqli_query($conn, $select_cat);

        while ($row_cat = mysqli_fetch_assoc($result_cat)) {
          $cat_id = $row_cat['category_id'];
          $cat_title = $row_cat['category_name'];
          $cat_img = $row_cat['category_image'];
          echo"
            <div class='cat-in'>
              <a href='result.php?category=$cat_id'><img src='./admin/category_img/$cat_img' alt=''></a>
              <a href='result.php?category=$cat_id'><h3>$cat_title</h3></a>
            </div>
          
          ";
        }

    }

    // ------------show sale products on home page--------------------------

    function sale_item(){
        global $conn ;
        $prod_select_query="SELECT * FROM `products` ORDER BY RAND() LIMIT 6";
        $result_product = mysqli_query($conn, $prod_select_query);
        while ($row_product = mysqli_fetch_assoc($result_product)) {
          $product_id = $row_product["product_id"];
          $product_name = $row_product['product_name'];
          $product_category = $row_product['product_category'];
          $product_discription = $row_product['product_discription'];
          $main_image = $row_product['main_image'];
          $product_price = $row_product['product_price'];
          $product_old_price = $row_product['product_old_price'];
          $product_stock = $row_product['product_stock'];

          echo"
          
          <div class= 'item' >
          <a href='single-product.php?product=$product_id'><img class='prodimg' src='./admin/product_img/$main_image' alt='$product_name'></a>
          <a href='?add_to_cart=$product_id'><i class='fa-solid fa-cart-plus fa-xl carticon' ></i></a>
          <a href='single-product.php?product=$product_id'><h4 class='prod-title'>$product_name</h4></a>
          <a href='single-product.php?product=$product_id'><h3 class='prod-price'>USD <span>$product_price</span>.00</h3><label for=''>$product_old_price.00</label></a>
        </div>

          
          ";

        }


    }

    // ------------show side bar category on home page--------------------------

    function sidebar_category(){
        global $conn ;
        $select_cat = "SELECT * FROM `categories`  ";
        $result_cat = mysqli_query($conn, $select_cat);

        while ($row_cat = mysqli_fetch_assoc($result_cat)) {
          $cat_id = $row_cat['category_id'];
          $cat_title = $row_cat['category_name'];
          $cat_dis = $row_cat['description'];
          echo"
           <li>
              <a href='result.php?category=$cat_id' class='nav-link link-body-emphasis'>
              <i class='fa-solid fa-list'></i>
                 $cat_title
              </a>
           </li>
          
          ";
        }


    }

    // ------------header category --------------------------

    function header_cat(){
        global $conn ;
        $select_cat = "SELECT * FROM `categories`";
        $result_cat = mysqli_query($conn, $select_cat);

        while ($row_cat = mysqli_fetch_assoc($result_cat)) {
          $cat_id = $row_cat['category_id'];
          $cat_title = $row_cat['category_name'];
          $cat_dis = $row_cat['description'];
          echo"
            <li><a class='dropdown-item' href='result.php?category=$cat_id'>$cat_title</a></li>

 
          ";
        }
    }


    // ------------ category filter--------------------------

    function categorize_products() {
        global$conn ;
        if(isset($_GET['category'])){
                 $cat_id = $_GET['category'];
                 $cat_id_query ="SELECT `category_name` FROM `categories` WHERE `category_id`=$cat_id";
                 $result_id_query = mysqli_query($conn, $cat_id_query) ;
                 $row_cat = mysqli_fetch_assoc($result_id_query) ;
                 $cat_title = $row_cat["category_name"];

                $prod_select_query="SELECT * FROM `products` WHERE `product_category` = '$cat_title' ";
                $result_product = mysqli_query($conn, $prod_select_query);

                $num_of_row=mysqli_num_rows($result_product);
                if($num_of_row> 0){
                    echo"<h1 class='text-center mb-5'>Products in $cat_title category</h1>";

                while ($row_product = mysqli_fetch_assoc($result_product)) {
                  $product_id = $row_product["product_id"];
                  $product_name = $row_product['product_name'];
                  $product_category = $row_product['product_category'];
                  $product_discription = $row_product['product_discription'];
                  $main_image = $row_product['main_image'];
                  $product_price = $row_product['product_price'];
                  $product_old_price = $row_product['product_old_price'];
                  $product_stock = $row_product['product_stock'];
        
                  echo"
                  
                  <div class= 'item' >
                  <a href='single-product.php?product=$product_id'><img class='prodimg' src='./admin/product_img/$main_image' alt='$product_name'></a>
                  <a href='?add_to_cart=$product_id'><i class='fa-solid fa-cart-plus fa-xl carticon' ></i></a>
                  <a href='single-product.php?product=$product_id'><h4 class='prod-title'>$product_name</h4></a>
                  <a href='single-product.php?product=$product_id'><h3 class='prod-price'>USD <span>$product_price</span>.00</h3><label for=''>$product_old_price.00</label></a>
                </div>
        
                  
                  ";
        
                }
            }else{
                echo "
                <div class='no-products'><h1 class='text-center mb-5'>Sorry No any Product in this Category<br><br><i class='fa-regular fa-face-frown fa-bounce fa-2xl'></i></h1></div>
                
                ";
            }


            
        }


    }   
    // ------------ product search filter--------------------------

    function search_products() {
        global$conn ;
        if(isset($_GET['search_submit'])){
                 $search_data = $_GET['search_data'];
                 $search_query ="SELECT * FROM `products` WHERE LOWER(`product_name`)LIKE LOWER('%$search_data%')";
                 $result_search_query = mysqli_query($conn, $search_query) ;
                $num_of_row=mysqli_num_rows($result_search_query) ;
                if($num_of_row> 0){
                    echo"<h1 class='text-center mb-5'>Search Results for: $search_data </h1>";

                while ($row_search = mysqli_fetch_assoc($result_search_query)) {
                  $product_id = $row_search["product_id"];
                  $product_name = $row_search['product_name'];
                  $product_category = $row_search['product_category'];
                  $product_discription = $row_search['product_discription'];
                  $main_image = $row_search['main_image'];
                  $product_price = $row_search['product_price'];
                  $product_old_price = $row_search['product_old_price'];
                  $product_stock = $row_search['product_stock'];
        
                  echo"
                  
                  <div class= 'item' >
                  <a href='single-product.php?product=$product_id'><img class='prodimg' src='./admin/product_img/$main_image' alt='$product_name'></a>
                  <a href='?add_to_cart=$product_id'><i class='fa-solid fa-cart-plus fa-xl carticon' ></i></a>
                  <a href='single-product.php?product=$product_id'><h4 class='prod-title'>$product_name</h4></a>
                  <a href='single-product.php?product=$product_id'><h3 class='prod-price'>USD <span>$product_price</span>.00</h3><label for=''>$product_old_price.00</label></a>
                </div>
        
                  
                  ";
        
                }
            }else{
                echo "
                <div class='no-products'><h1 class='text-center mb-5'>Sorry No any Matching for : $search_data<br><br><i class='fa-regular fa-face-frown fa-bounce fa-2xl'></i></h1></div>
                
                ";
            }


            
        }


    }   



    // ------------ Single product page similar products --------------------------
    function single_products() {
        global$conn ;
        global$product_category ;

        $prod_select_query="SELECT * FROM `products` WHERE `product_category`='$product_category'";
        $result_product = mysqli_query($conn, $prod_select_query);
        while ($row_product = mysqli_fetch_assoc($result_product)) {
          $product_id = $row_product["product_id"];
          $product_name = $row_product['product_name'];
          $product_category = $row_product['product_category'];
          $product_discription = $row_product['product_discription'];
          $main_image = $row_product['main_image'];
          $product_price = $row_product['product_price'];
          $product_old_price = $row_product['product_old_price'];
          $product_stock = $row_product['product_stock'];

          echo"
          
          <div class= 'item' >
          <a href='single-product.php?product=$product_id'><img class='prodimg' src='./admin/product_img/$main_image' alt='$product_name'></a>
          <a href='?add_to_cart=$product_id'><i class='fa-solid fa-cart-plus fa-xl carticon' ></i></a>
          <a href='single-product.php?product=$product_id'><h4 class='prod-title'>$product_name</h4></a>
          <a href='single-product.php?product=$product_id'><h3 class='prod-price'>USD <span>$product_price</span>.00</h3><label for=''>$product_old_price.00</label></a>
        </div>

          
          ";

        }

    } 

    // ------------ get ip address--------------------------

    function getIPAddress() {  
        //whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
         }  
    //whether ip is from the remote address  
        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
    }  
    // $ip = getIPAddress();  
    // echo 'User Real IP Address - '.$ip;  


    // ------------ add to cart function--------------------------

    function add_to_cart(){

        global $conn;
        $ip=getIPAddress();

        if(isset($_GET['add_to_cart'])){
            $product_id = $_GET['add_to_cart'];
            $quantity = ($_GET['quantity']?? 1);
            $sql = "SELECT * FROM `cart` WHERE `ip_address` = '$ip' AND `product_id` = $product_id ";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                $cart_id = $row["cart_id"];
                $product_id_in_cart = $row["product_id"];
                $new_qty = $row["quantity"]+$quantity;
                $update_sql = "UPDATE `cart` SET `quantity` = $new_qty WHERE `cart_id` = $cart_id ";
                $result=mysqli_query($conn, $update_sql);
                if($result){
                    echo"<script>alert('cart updated')</script>";
                    echo "<script>window.location.href = './index.php';</script>";


                }
            }else{
                echo"ip- $ip  $product_id $quantity";
                $insert_sql = "INSERT INTO `cart` (`ip_address`, `product_id`, `quantity`) VALUES ('$ip', $product_id, $quantity)";
                mysqli_query($conn, $insert_sql);
                echo"<script>alert('Added to cart')</script>";
                echo "<script>window.location.href = './index.php';</script>";

            }
        }


    }

    // ------------show cart qty count--------------------------

function cart_count(){
    global $conn;
    $ip=getIPAddress();
    $cart_count = "SELECT SUM(quantity) FROM `cart` WHERE `ip_address`='$ip'";
    $qty= mysqli_query($conn, $cart_count);
    $qty_row=mysqli_fetch_assoc($qty);
    if(mysqli_num_rows($qty)> 0){
    $qty_count =$qty_row['SUM(quantity)'] ;
    echo"$qty_count";
    }else{
        $qty_count = 0;
        echo"$qty_count";
    }
    
}
function cart_price_count(){
    global $conn;
    $ip=getIPAddress();
    $cart_total = 0;
    $cart_price_count = "SELECT  products.product_price,quantity
                                 FROM `cart` 
                                JOIN products ON cart.product_id = products.product_id 
                                 WHERE `ip_address`='$ip'";
    $qty= mysqli_query($conn, $cart_price_count);
    while($price_row=mysqli_fetch_assoc($qty) ){
      $cart_tot = $price_row["product_price"] * $price_row["quantity"];
      $cart_total =$cart_total + $cart_tot;

    }

    echo"$cart_total";


  
}

// ----------------Delete item from cart-------------------

function delete_cart(){
  global $conn;
  $ip =getIPAddress();
  if(isset($_GET['delete_cart'])){
    $item_id= $_GET['delete_cart'];
    $delete = "DELETE FROM `cart` WHERE `cart`.`cart_id` = $item_id ";
    $result= mysqli_query($conn, $delete);
    if($result){
      echo "<script>alert('Delete Item From Cart')</script>";
      echo "<script>window.location.href = './cart.php?show_cart';</script>";
      // header('Location:./index.php');
      exit();
    }

  }
}




