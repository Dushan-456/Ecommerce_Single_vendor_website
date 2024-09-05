

<?php
include('header.php');

echo"



 
<div class='cart'>
    <div class='container'>
        
        <div class='row'>


     ";       
                delete_cart();
                add_to_cart();
    
                global $conn;
                if(isset($_GET["show_cart"])){
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
        
                    echo"    <div class='col-xl-8'>";
        
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
                        <div class='card border shadow-none'>
          <div class='card-body'>
         
              <div class='d-flex align-items-start border-bottom pb-3'>
                  <div class='me-4'>
                      <img src='./admin/product_img/$product_img' alt='$product_name' class='avatar-lg rounded'>
                  </div>
                  <div class='flex-grow-1 align-self-center overflow-hidden'>
                      <div>
                          <h5 class='text-truncate font-size-18'><a href='single-product.php?product=$product_id' class='text-dark'>$product_name </a></h5>
                          <p class='text-muted mb-0'>
                          <i class='fa-solid fa-star' style='color: #FFD43B;'></i>
                          <i class='fa-solid fa-star' style='color: #FFD43B;'></i>  
                          <i class='fa-solid fa-star' style='color: #FFD43B;'></i>
                          <i class='fa-solid fa-star' style='color: #FFD43B;'></i>
                          <i class='fa-solid fa-star-half-stroke' style='color: #FFD43B;'></i>

                          </p>
                          <p class='mb-0 mt-1'>Stock : <span class='fw-medium'>Yes</span></p>
                      </div>
                  </div>
                  <div class='flex-shrink-0 ms-2'>
                      <ul class='list-inline mb-0 font-size-16'>
                          <li class='list-inline-item'>
                              <a href='?delete_cart=$cart_id' class='text-muted px-1'>
                              <i class='fa-solid fa-trash-can fa-lg' style='color: #e60000;'></i>
                              </a>
                          </li>
                          <li class='list-inline-item'>
                              <a href='#' class='text-muted px-1'>
                                  <i class='mdi mdi-heart-outline'></i>
                              </a>
                          </li>
                      </ul>
                  </div>
              </div>
        
              <div>
                  <div class='row'>
                      <div class='col-md-4'>
                          <div class='mt-3'>
                              <p class='text-muted mb-2'>Price</p>
                              <h5 class='mb-0 mt-2'><span class='text-muted me-2'><del class='font-size-16 fw-normal'>$ $product_old_price</del></span>$ $product_price</h5>
                          </div>
                      </div>
                      <div class='col-md-5'>
                          <div class='mt-3'>
                              <p class='text-muted mb-2'>Quantity</p>
                              <div class='d-inline-flex'>
                                  <select class='form-select form-select-sm w-xl' type='submit'>
                                      <option value='$quantity'selected=''>$quantity</option>
                                      <option value='1'>1</option>
                                      <option value='2'>2</option>
                                      <option value='3'>3</option>
                                      <option value='4'>4</option>
                                      <option value='5'>5</option>
                                      <option value='6'>6</option>
                                      <option value='7'>7</option>
                                      <option value='8'>8</option>
                                      <option value='9'>9</option>
                                      <option value='10'>10</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class='col-md-3'>
                          <div class='mt-3'>
                              <p class='text-muted mb-2'>Total</p>
                              <h5>$ $subtotal</h5>
                          </div>
                      </div>
                  </div>
              </div>
        
          </div>
        </div>
        
                        
                        ";
        
                        }
                        echo "
                        
        <div class='row my-4'>
          <div class='col-sm-6'>
              <a href='index.php' class='btn btn-link text-muted'>
                  <i class='mdi mdi-arrow-left me-1'></i> Continue Shopping </a>
          </div> <!-- end col -->
          <div class='col-sm-6'>
             
          </div> <!-- end col -->
        </div> <!-- end row-->
        </div>
        
        <div class=' col-xl-4'>
        <div class=' check mt-5 mt-lg-0'>
          <div class=' card border shadow-none'>
              <div class=' card-header bg-transparent border-bottom py-3 px-4'>
                  <h5 class='font-size-16 mb-0'>Order Summary <span class='float-end'>#MN0124</span></h5>
              </div>
              <div class=' card-body p-4 pt-2'>
        
                  <div class='table-responsive'>
                      <table class='table mb-0'>
                          <tbody>
                              <tr>
                                  <td>Sub Total :</td>
                                  <td class='text-end'>$ $total</td>
                              </tr>
                              <tr>
                                  <td>Discount : </td>
                                  <td class='text-end'>- $  28</td>
                              </tr>
                              <tr>
                                  <td>Shipping Charge :</td>
                                  <td class='text-end'>$ 25</td>
                              </tr>
                              <tr>
                                  <td>Estimated Tax : </td>
                                  <td class='text-end'>$ 18.25</td>
                              </tr>
                              <tr class='bg-light'>
                                  <th>Total :</th>
                                  <td class='text-end'>
                                      <span class='fw-bold'>
                                          $ $final_total 
                                      </span>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                      <div class='col-sm-12 mt-5'>
                          <div class='text-sm-end mt-2 mt-sm-0'>
                              <a href='checkout.php?checkout' ><button class=' checkout-button'><i class='mdi mdi-cart-outline me-1'></i> Checkout</button>
                                   </a>
                          </div>
                  </div>
                  <!-- end table-responsive -->
              </div>
          </div>
        </div>
        </div>
        </div>
        <!-- end row -->
                        
                        
                        ";
                        
                    }else{
                        echo"<h1>Sorry ! Your Cart is Empty<br><br><i class='fa-regular fa-face-frown fa-bounce fa-2xl'></i> </h1>";
                    }
                }
        
                
        
            
        



echo"


    

        
    </div>
</div>
</div>



";


include('footer.php');
?>
