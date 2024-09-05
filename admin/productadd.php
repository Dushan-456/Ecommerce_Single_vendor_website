<?php
include("../include/connect.php");
if(isset($_POST["add_product"])){
  $product_name=$_POST['product_name'];
  $product_categ=$_POST['product_categ'];
  $product_discription=$_POST['product_discription'];
  //imagesssssss
  $main_image=$_FILES['main_image']['name'];
  $image_01=$_FILES['image-01']['name'];
  $image_02=$_FILES['image-02']['name'];
  $image_03=$_FILES['image-03']['name'];
  $image_04=$_FILES['image-04']['name'];

  $temp_main_image=$_FILES['main_image']['tmp_name'];
  $temp_image_01=$_FILES['image-01']['tmp_name'];
  $temp_image_02=$_FILES['image-02']['tmp_name'];
  $temp_image_03=$_FILES['image-03']['tmp_name'];
  $temp_image_04=$_FILES['image-04']['tmp_name'];

  $product_price=$_POST['product_price'];
  $product_old_price=$_POST['product_old_price'];
  $product_stock=$_POST['product_stock'];

  move_uploaded_file($temp_main_image,"./product_img/$main_image");
  move_uploaded_file($temp_image_01,"./product_img/ $image_01");
  move_uploaded_file($temp_image_02,"./product_img/ $image_02");
  move_uploaded_file($temp_image_03,"./product_img/ $image_03");
  move_uploaded_file($temp_image_04,"./product_img/ $image_04");

  $insert_query="INSERT INTO `products` (`product_name`,`product_category`,`product_discription`,`main_image`,`image_01`,`image_02`,`image_03`,`image_04`,`product_price`,`product_old_price`,`product_stock`) 
    VALUES ('$product_name','$product_categ','$product_discription','$main_image','$image_01','$image_02','$image_03','$image_04','$product_price','$product_old_price','$product_stock')"; 

    $insert_result=mysqli_query($conn,$insert_query);
    if($insert_result){
      echo"<script>alert('New Product Added')</script> ";
      echo "<script>window.location.href = './index.php?allproduct';</script>";


    }
}
?>

<div class="prod-add">
   <form action="" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-6">
      <h4>Product Name</h4>
      <input type="text" class="form-control" placeholder="Product Name" required name="product_name">
      </div>
      <div class="col-6">
      <h4>Product Category</h4>

<select class="form-select" aria-label="Default select example" required name="product_categ">
<option value="No">-select Category-</option>

  <?php
  $select_cat="SELECT * FROM `categories`";
  $result_cat= mysqli_query($conn,$select_cat);
  while($row_cat=mysqli_fetch_assoc($result_cat)){
    $cat_title=$row_cat["category_name"];
    echo"  <option value='$cat_title'>$cat_title</option>
";

  }
  
  ?>

</select>
      </div>
    </div><br><br>
    
<h4>Product Discription</h4>

     <div class=" mb-3">
      
  <input type="text" class="form-control" id="floatingInput" name="product_discription" placeholder="Product Discription" required>
</div><br><br>
<h4>Select Main Image</h4>

<div class="mb-3">
  <label for="formFile" class="form-label">Select Main Image for product</label>
  <input class="form-control" type="file" id="formFile" required name="main_image">
</div>
<h4>Select Image 01</h4>

<div class="mb-3">
  <label for="formFile" class="form-label">Select other for product</label>
  <input class="form-control" type="file" id="formFile" required name="image-01">
</div>
<h4>Select Image 02</h4>

<div class="mb-3">
  <label for="formFile" class="form-label">Select other for product</label>
  <input class="form-control" type="file" id="formFile"  name="image-02">
</div>
<h4>Select Image 03</h4>

<div class="mb-3">
  <label for="formFile" class="form-label">Select other for product</label>
  <input class="form-control" type="file" id="formFile" name="image-03">
</div>

<h4>Select Image 04</h4>

<div class="mb-3">
  <label for="formFile" class="form-label">Select other for product</label>
  <input class="form-control" type="file" id="formFile" name="image-04">
</div><br><br>


<div class="row">
  <div class="col-4">
  <h4>Price </h4>

    <input type="text" class="form-control" placeholder="Product Price" required name="product_price">
  </div>
  <div class="col-4">
  <h4>Old Price </h4>

    <input type="text" class="form-control" placeholder="Old Price" name="product_old_price" >
  </div>
  <div class="col-4">
  <h4>Stock Count </h4>

    <input type="text" class="form-control" placeholder="stock count" name="product_stock">
  </div>
</div><br><br>

<div class="d-grid gap-2">
  <button class="btn btn-primary" type="Submit" name="add_product">Add Product</button>
</div>
<br><br><br>

</form>
 </div>
 <?php
        $conn->close();

    ?>