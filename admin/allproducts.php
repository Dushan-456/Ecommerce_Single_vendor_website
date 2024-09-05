<?php
  include("../include/connect.php");


?>

<div>            <?php

$select_prod = "SELECT * FROM `products`";
$result_prod = mysqli_query($conn, $select_prod);
$prod_count = mysqli_num_rows($result_prod);
echo"
      <h1>All products</h1>
      
      <h3>Total products : $prod_count</h3>
      
      <a href='index.php?addproduct'><h4>+ Add New Products</h4></a>
        <table class='table  table-striped'>
          <thead>
            <tr>
              <th scope='col'>Product ID</th>
              <th scope='col'>Image</th>
              <th scope='col'>Product Name</th>
              <th scope='col'>Description</th>
              <th scope='col'>Category</th>
              <th scope='col'>Price</th>
              <th scope='col'>Old Price</th>
              <th scope='col'>Stoke</th>
              <th scope='col'>Edit</th>
              <th scope='col'>Delete</th>
            </tr>
          </thead>
          <tbody>";


            while ($row_prod = mysqli_fetch_assoc($result_prod)) {
              $prod_id = $row_prod['product_id'];
              $prod_name = $row_prod['product_name'];
              $product_category = $row_prod['product_category'];
              $product_discription = $row_prod['product_discription'];
              $main_image = $row_prod['main_image'];
              $product_price = $row_prod['product_price'];
              $product_old_price = $row_prod['product_old_price'];
              $product_stock = $row_prod['product_stock'];
              echo"
              <tr>
              <td>$prod_id</td>
              <td><img class='prodimg' src='./product_img/$main_image' alt='$prod_name'></td>
              <td>$prod_name</td>
              <td>$product_discription</td>
              <td>$product_category</td>
              <td>$product_price</td>
              <td>$product_old_price</td>
              <td>$product_stock</td>
              <td><a href=''><button class='action-but'><i class='fa-solid fa-pen-to-square fa-xl' style='color: #0d63f8;'></i></button></a></td>
              <td><a href='?delete_product=$prod_id'><button class='action-but'><i class='fa-solid fa-trash fa-xl' style='color: #ff0000;'></i></button></a></td>
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