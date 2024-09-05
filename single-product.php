<?php
include('header.php');
include('./include/connect.php');
?>
 <!-- single page body -->
 <?php
        if(isset($_GET['product'])){
          $product_id = $_GET['product'];
         $product_select_query="SELECT * FROM `products` WHERE `product_id` = '$product_id' ";
         $result_product = mysqli_query($conn, $product_select_query);

         $row_product = mysqli_fetch_assoc($result_product);
         $product_name = $row_product['product_name'];
         $product_category = $row_product['product_category'];
         $product_discription = $row_product['product_discription'];
         $main_image = $row_product['main_image'];
         $image1 = $row_product['image_01'];
         $image2 = $row_product['image_02'];
         $image3 = $row_product['image_03'];
         $image4 = $row_product['image_04'];
         $product_price = $row_product['product_price'];
         $product_old_price = $row_product['product_old_price'];
         $product_stock = $row_product['product_stock'];


     
 }
 
 echo"
 
 
<div class='single-page'>
    <div class='row'>
        <div class='row col-9'>
            <div class='col-5'>
                <section class='p-4 text-center w-100'>
                    <div class='ecommerce-gallery' style='max-width: 500px;'>
                      <div class='row py-3 shadow-5'>
                        <div class='col-12 mb-1'>
                          <div class='lightbox'>
                            <img id='main-image' src='./admin/product_img/$main_image' alt='$product_name' class='ecommerce-gallery-main-img w-100' style='height: auto;'>
                          </div>
                        </div>
                        <div class='col-3 mt-1'>
                          <img src='./admin/product_img/ $image1' alt='$product_name' class='w-100 thumbnail'>
                        </div>
                        <div class='col-3 mt-1'>
                          <img src='./admin/product_img/ $image2' alt='$product_name' class='w-100 thumbnail'>
                        </div>
                        <div class='col-3 mt-1'>
                          <img src='./admin/product_img/ $image3' alt='$product_name' class='w-100 thumbnail'>
                        </div>
                        <div class='col-3 mt-1'>
                          <img src='./admin/product_img/ $image4' alt='$product_name' class='w-100 thumbnail'>
                        </div>
                      </div>
                    </div>
                  </section>

               

              </div>
              <div class='col-7'>
                  <h3>Buy Now and get winning chance</h3>
                  <h4 class='price2'>USD <span class='price'>$product_price</span>.00</h4><label class='pricen' for=''>$product_old_price.00</label> <br><br>
                  <div class='bd-example m-0 border-0'>
                      <span class='badge rounded-pill '>Free shipping</span>
                      <span class='badge rounded-pill '>Fast delivery</span>
                      <span class='badge rounded-pill '>Discount</span>
                      <span class='badge rounded-pill '>Coupon</span>
                      <span class='badge rounded-pill '>Offer</span>
                </div>
                <div class='row'>
                  <div class='col-3 icon'>
                      <i class='fa-solid fa-shield-halved fa-2xl'></i>
                      <h6>Safe payments </h6>
                  </div>
                  <div class='col-3 icon'>
                      <i class='fa-solid fa-lock fa-2xl'></i>
                      <h6> Security & privacy </h6>
                  </div>
                  <div class='col-3 icon'>
                      <i class='fa-solid fa-heart-circle-check fa-2xl'></i>
                      <h6>Buyer protection </h6>
                  </div>
                </div>
                <h2>$product_name</h2>
                  <p> 525 Reviews  |  1526 Orders</p>
                <b><p> Availability : 56 In Stock</p></b>
                <div class='bd-example m-0 border-0'>
        
                <nav>
                <div class='nav nav-tabs mb-3' id='nav-tab' role='tablist'>
                  <button class='nav-link active' id='nav-home-tab' data-bs-toggle='tab' data-bs-target='#nav-home' type='button' role='tab' aria-controls='nav-home' aria-selected='true'>Discription</button>
                  <button class='nav-link' id='nav-profile-tab' data-bs-toggle='tab' data-bs-target='#nav-profile' type='button' role='tab' aria-controls='nav-profile' aria-selected='false' tabindex='-1'>Reviews</button>
                  <button class='nav-link' id='nav-contact-tab' data-bs-toggle='tab' data-bs-target='#nav-contact' type='button' role='tab' aria-controls='nav-contact' aria-selected='false' tabindex='-1'>Contact</button>
                </div>
              </nav>
              <div class='tab-content' id='nav-tabContent'>
                <div class='tab-pane fade active show' id='nav-home' role='tabpanel' aria-labelledby='nav-home-tab'>
                  <p>$product_discription</p>
                </div>
                <div class='tab-pane fade' id='nav-profile' role='tabpanel' aria-labelledby='nav-profile-tab'>
                  
            <div class='review'>
            <div class=''>

        
            <div class='review-list'>
    <ul>
        <li>
            <div class='d-flex'>
                <div class='left'>
                    <span>
                        <img src='https://bootdey.com/img/Content/avatar/avatar1.png' class='profile-pict-img img-fluid' alt='' />
                    </span>
                </div>
                <div class='right'>
                    <h4>
                        Askbootstrap
                        <span class='gig-rating text-body-2'>
                            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1792 1792' width='15' height='15'>
                                <path
                                    fill='currentColor'
                                    d='M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z'
                                ></path>
                            </svg>
                            5.0
                        </span>
                    </h4>
                    <div class='country d-flex align-items-center'>
                        <span>
                            <img class='country-flag img-fluid' src='https://bootdey.com/img/Content/avatar/avatar6.png' />
                        </span>
                        <div class='country-name font-accent'>India</div>
                    </div>
                    <div class='review-description'>
                        <p>
                            The process was smooth, after providing the required info, Pragyesh sent me an outstanding packet of wireframes. Thank you a lot!
                        </p>
                    </div>
                    <span class='publish py-3 d-inline-block w-100'>Published 4 weeks ago</span>
                    
                    
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>
</div>

</div>
<div class='tab-pane fade' id='nav-contact' role='tabpanel' aria-labelledby='nav-contact-tab'>
  <p>This is some placeholder content the <strong>Contact tab's</strong> associated content. Clicking another tab will toggle the visibility of this one for 'the next. The tab JavaScript swaps classes to control the content visibility and styling. You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>
</div>
</div>

</div>
</div>
     
<div class='row shop-container'>


<h1>You may also like this products.......</h1>
";

single_products();

echo"
</div> 

</div>


<div class='col-3'>
<div class='stiky-div'>
<div><h4 class='price2'>USD <span class='price'>$product_price</span>.00</h4><label class='pricen' for=''>$product_old_price.00</label></div> 
<hr>
<div class='shipping-method-container'>
  <label for='shipping-method'>Select Shipping Method:</label>
  <select id='shipping-method'>
    <option value='standard'>Standard Shipping - $5.00</option>
    <option value='express'>Express Shipping - $10.00</option>
    <option value='overnight'>Overnight Shipping - $20.00</option>
  </select>
  <div id='shipping-cost' class='shipping-cost'>Shipping Cost: $5.00</div>
</div>
<hr>

<h4>Quantity :</h4>
<div class='quantity-container'>
  <button class='quantity-btn' id='decrease-btn'>&nbsp;- </button>
  <input type='number' id='quantity-input' value='1' min='1' max='100' />
  <button class='quantity-btn' id='increase-btn'>+</button>
</div>


<a class='sinbutton' href=''><button class='btn sinbutton btn-outline-secondary' type='button'>Buy Now</button></a>
<a class='sinbutton' href='cart.php?show_cart&add_to_cart=$product_id'><button class='btn  btn-primary' type='button'><i class='fa-solid fa-cart-plus fa-lg'>&nbsp; &nbsp;</i>Add to Cart</button></a>
<a class='sinbutton' href=''><button class='btn  wish' type='button'><i class='fa-regular fa-heart fa-lg'></i>&nbsp; &nbsp;Add to Wishlist</button></a>
<div>
  <hr>
  <h4>Share on :</h4>

                  <!-- Facebook -->
<a class='btn text-white' data-mdb-ripple-init style='background-color: #3b5998;' href='#!' role='button'>
  <i class='fab fa-facebook-f'></i>
</a>

<!-- Twitter -->
<a class='btn text-white' data-mdb-ripple-init style='background-color: #55acee;' href='#!' role='button'>
  <i class='fab fa-twitter'></i>
</a>

<!-- Google -->
<a class='btn text-white' data-mdb-ripple-init style='background-color: #dd4b39;' href='#!' role='button'>
  <i class='fab fa-google'></i>
</a>

<!-- Instagram -->
<a class='btn text-white' data-mdb-ripple-init style='background-color: #ac2bac;' href='#!' role='button'>
  <i class='fab fa-instagram'></i>
</a>
</div>

</div>
</div>
</div>
</div>



";
          
include('footer.php');
?>

