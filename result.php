<?php
include("./include/connect.php");
include("./header.php");
?>
 <div class="row shop-container container m-auto mt-5">
<?php



add_to_cart();
categorize_products();
search_products();
?>
 </div>


<?php
include("./footer.php");
?>





