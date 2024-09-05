<?php
  include("../include/connect.php");
  if(isset($_POST["add_category"])){  //button eka click karalada balanawa
    $cat_title=$_POST['category'];       // category kiyala name eka thiyena input eke thiyena value eka variable ekata save kara gnnw
    $cat_dis=$_POST['cat_discription']; // cat_discription kiyala name eka thiyena input eke thiyena value eka variable ekata save kara gnnw
    $cat_image=$_FILES['cat_image']['name'];
    $temp_cat_image=$_FILES['cat_image']['tmp_name'];

    $select_query="SELECT * FROM `categories` WHERE category_name='$cat_title' ";     //database eke kalin mekata samana ekak thiyenawda balanawa
    $result_select=mysqli_query($conn,$select_query);
    $number=mysqli_num_rows($result_select);      // number eka 1 wenawa kiyanne kalin ekak thiyenawa ita passe eka chech karala 0 nam witharak add karanawa

    if($number>0){
      echo "<script>alert('This Category already added')</script>";
    }else{

      move_uploaded_file($temp_cat_image,"./category_img/$cat_image");
    
    $insert_query="INSERT INTO `categories` (`category_name`,`description`,`category_image`) 
    VALUES ('$cat_title','$cat_dis','$cat_image')";  // sql code eka


    $result=mysqli_query($conn,$insert_query);    // conn kiyanne connect.php eke varible ekk, 
    if($result){                                            // resulst kiyana eka true unoth alert ekak gannwa
      echo"<script>alert('Category Added')</script> ";
      echo "<script>window.location.href = './index.php?categories';</script>";

    }
  }
  }
?>


<div class="prod-add">
   <form action="" method="post" enctype="multipart/form-data">
     <h3>Category name</h3>
     <input class="name-input form-control" type="text" placeholder="category name" required name="category">
     <br><br>
     <h3>Category Discription</h3>

     <input class="name-input form-control" type="text" placeholder="category discription" required name="cat_discription">
    <br><br>
    <div class="mb-3">
  <label for="formFile" class="form-label">Select Main Image for product</label>
  <input class="form-control" type="file" id="formFile"  name="cat_image">
</div><br><br>

    <div class="d-grid gap-2">

     <button type="submit" name="add_category" class="btn btn-primary">Add category</button>
    </div>
    </form>
 </div>

 <?php
        $conn->close();

    ?>