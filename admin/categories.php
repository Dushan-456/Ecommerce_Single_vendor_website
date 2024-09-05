<?php
  include("../include/connect.php");

?>

<div>
      <h1>All Categories</h1><a href="index.php?addcategory"><h4>+ Add New Category</h4></a>
        <table class="table  table-striped">
          <thead>
            <tr>
              <th scope="col">Category ID</th>
              <th scope="col">Category Image</th>
              <th scope="col">Category Name</th>
              <th scope="col">Description</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>


          <?php
            $select_cat = "SELECT * FROM `categories`";
            $result_cat = mysqli_query($conn, $select_cat);

            while ($row_cat = mysqli_fetch_assoc($result_cat)) {
              $cat_id = $row_cat['category_id'];
              $cat_img = $row_cat['category_image'];
              $cat_title = $row_cat['category_name'];
              $cat_dis = $row_cat['description'];
              echo"
              <tr>
              <td>$cat_id</td>
              <td><img class='prodimg' src='./category_img/$cat_img' alt='$cat_title'></td>
              <td>$cat_title</td>
              <td>$cat_dis</td>
              <td><a href=''><button class='action-but'><i class='fa-solid fa-pen-to-square fa-xl' style='color: #0d63f8;'></i></button></a></td>
              <td><a href='?delete_category=$cat_id'><button class='action-but'><i class='fa-solid fa-trash fa-xl' style='color: #ff0000;'></i></button></a></td>
            </tr>
              
              ";
            }
            ?>


           


          </tbody>
        </table>
    </div>

    <?php
        $conn->close();

    ?>