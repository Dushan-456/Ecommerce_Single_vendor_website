<?php
include('header.php');
include('./include/connect.php');
// include('./function/function.php');
?>
<!------------------- hero ------------------------>


      <div id="myCarousel" class="carousel slide  mb-6" data-bs-ride="carousel">
         <div class="carousel-indicators">
           <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
           <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
           <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
         </div>
         <div class="carousel-inner  ">
           <div class="carousel-item hero1">
             <div class="container">
               <div class="carousel-caption text-start">
                  <h2 class="offer">50% OFF</h2>
                 <h1>Example headline.</h1>
                 <p class=>Some representative placeholder content for the first slide of the carousel.</p>
                 <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
               </div>
             </div>
           </div>
           <div class="carousel-item active hero2">
             <div class="container">
               <div class="carousel-caption">
                  <h2 class="offer">50% OFF</h2>
                 <h1>Another example headline.</h1>
                 <p>Some representative placeholder content for the second slide of the carousel.</p>
                 <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
               </div>
             </div>
           </div>
           <div class="carousel-item hero3">
             <div class="container">
               <div class="carousel-caption text-end ">
                  <h2 class="offer">50% OFF</h2>
                 <h1>One more for good measure.</h1>
                 <p>Some representative placeholder content for the third slide of this carousel.</p>
                 <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
               </div>
             </div>
           </div>
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="visually-hidden">Next</span>
         </button>
       </div>
<!------------------- categories ------------------------>


       <div class="container-fluid">
         <div class="cat ">
         <?php
          category_img();
          add_to_cart();
            ?>



            </div>
       </div>
       

   <!------------------- sale ------------------------>



       <div class="shop-container-sale">
       <?php
         if (isset($_SESSION["firstname"])) {
          $name1 = $_SESSION["firstname"];
          $name2 = $_SESSION["lastname"];
          echo"<h1>Welcome $name1  $name2</h1>";

         } ?>
         <h5>Better services and selected items on Choice</h5>
         <div class="row shop-container align-content-center justify-content-center">

         <?php

         
           sale_item();

            ?>


         </div>
       </div>

<!------------------- shop body ------------------------>


      <div class="shop-body">
         <div class="col-md-2 sidebar"><!------------------- sidebar ------------------------>

            <div class="sidebar d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" >
               <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                 <div class="sidebar-logo"><img src="assest/logo.png" alt=""></div> </a>
               <span class="fs-4">Categories</span>
               <hr>
               <ul class="nav nav-pills flex-column mb-auto">
               <?php
           sidebar_category();
            ?>

          
               </ul>
               <hr>
               <div class="dropdown">

               </div>
            </div>
         </div>

         <div class="col  desktop">
            <div class="row shop-container">

            <?php
            home_products();

            ?>
<img src="/admin/product_img/" alt="">




            </div>



            <div class="pgenum ">
               <nav aria-label="Another pagination example">
                  <ul class="pagination pagination-lg flex-wrap">
                    <li class="page-item disabled">
                      <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item " aria-current="page">
                      <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                    <li class="page-item"><a class="page-link" href="#">8</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">Next</a>
                    </li>
                  </ul>
                </nav>
            </div>


         </div>
      </div>

            <!------------------- footer ------------------------>

<?php
include('footer.php');
?>





