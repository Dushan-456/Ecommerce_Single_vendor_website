<div>

    <?php

$select_user = "SELECT * FROM `users`";
$result_user = mysqli_query($conn, $select_user);
$user_count = mysqli_num_rows($result_user);
echo"
     <h1>All Users</h1>
      
      <h3>Total Users : $user_count</h3>
      
        <table class='table  table-striped'>
          <thead>
            <tr>
              <th scope='col'>User ID</th>
              <th scope='col'>User Image</th>
              <th scope='col'>First Name</th>
              <th scope='col'>Last Name</th>
              <th scope='col'>Email</th>
              <th scope='col'>Mobile</th>
              <th scope='col'>Address</th>
              <th scope='col'>Role</th>
              <th scope='col'>Edit</th>
              <th scope='col'>Delete</th>
            </tr>
          </thead>
          <tbody>";


            while ($row_user = mysqli_fetch_assoc($result_user)) {
              $user_id = $row_user['user_id'];
              $first_name = $row_user['first_name'];
              $last_name = $row_user['last_name'];
              $email = $row_user['email'];
              $mobile = $row_user['mobile'];
              $address = $row_user['address'];
              $profile_pic = $row_user['profile_pic'];
              $role = $row_user['role'];
              echo"
              <tr>
              <td>$user_id</td>
              <td><img class='prodimg' src='../user_area/profile_pics/$profile_pic' alt='$first_name'></td>
              <td>$first_name</td>
              <td>$last_name</td>
              <td>$email</td>
              <td>$mobile</td>
              <td>$address</td>
              <td>$role</td>
              <td><a href=''><button class='action-but'><i class='fa-solid fa-pen-to-square fa-xl' style='color: #0d63f8;'></i></button></a></td>
              <td><a href='?delete_user=$user_id'><button class='action-but'><i class='fa-solid fa-trash fa-xl' style='color: #ff0000;'></i></button></a></td>
            </tr>
              
              
              
              ";
            }

              
            ?>





          </tbody>
        </table>
    </div>



          </tbody>
        </table>
    </div>