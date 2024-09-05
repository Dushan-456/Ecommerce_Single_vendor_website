<?php
 global$conn ;
 
 $user_id = $_SESSION["user_id"];
 $pic = $_SESSION["profile_pic"] ;


$user_query = "SELECT * FROM `users` WHERE user_id = $user_id";
$user_result = mysqli_query($conn, $user_query);
$user_row = mysqli_fetch_array($user_result);
$first_name = $user_row["first_name"];
$last_name = $user_row["last_name"];
$email = $user_row["email"];
$mobile = $user_row["mobile"];
$address = $user_row["address"];

if(isset($_POST["update_user"])){
    $new_first_name = $_POST["new_first_name"];
    $new_last_name = $_POST["new_last_name"];
    $new_email = $_POST["new_email"];
    $new_mobile = $_POST["new_mobile"];
    $new_address = $_POST["new_address"];

    $name1_update_query = "UPDATE `users` SET `first_name` = '$new_first_name' WHERE `users`.`user_id` = $user_id";
    $result1 = mysqli_query($conn, $name1_update_query);

    $name2_update_query = "UPDATE `users` SET `last_name` = '$new_last_name' WHERE `users`.`user_id` = $user_id";
    $result2 = mysqli_query($conn, $name2_update_query);

    $email_update_query = "UPDATE `users` SET `email` = '$new_email' WHERE `users`.`user_id` = $user_id";
    $result3 = mysqli_query($conn, $email_update_query);

    $mobile_update_query = "UPDATE `users` SET `mobile` = '$new_mobile' WHERE `users`.`user_id` = $user_id";
    $result4 = mysqli_query($conn, $mobile_update_query);

    $address_update_query = "UPDATE `users` SET `address` = '$new_address' WHERE `users`.`user_id` = $user_id";
    $result5 = mysqli_query($conn, $address_update_query);

    if($result1 && $result2 && $result3 && $result4 && $result5){
        echo "<script>alert('User Details Updated')</script>";
        echo "<script>window.location.href = './account.php?myprofile';</script>";



    }


}

// $user_id = $_SESSION["user_id"];



if(isset($_POST["update_pro_pic"])){

$new_pro_pic = $_FILES["update_pic"]["name"];
$temp_new_pro_pic = $_FILES["update_pic"]["tmp_name"];
move_uploaded_file($temp_new_pro_pic,"./user_area/profile_pics/$new_pro_pic");

$pic_update_query = "UPDATE `users` SET `profile_pic` = '$new_pro_pic' WHERE `users`.`user_id` = $user_id";
$pic_result5 = mysqli_query($conn, $pic_update_query);

if($pic_result5){
    echo "<script>alert('User Profile Picture Updated')</script>";
    // echo "<script>window.location.href = './account.php?myprofile';</script>";
echo"$new_pro_pic $temp_new_pro_pic";


}
}

?>

<form method="post" >
  <div class="row">
    <h3>Your Details</h3>
    <div class="col">
    <label for="">First name</label>
      <input required value="<?php echo $first_name?>" type="text" name="new_first_name" class="form-control" placeholder="First name">
    </div>
    <div class="col">
    <label for="inputAddress">Last name</label>
      <input required value="<?php echo $last_name?>" type="text" name="new_last_name" class="form-control" placeholder="Last name">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input required value="<?php echo $email?>" type="email" name="new_email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Mobile</label>
      <input value="<?php echo $mobile?>" type="text" name="new_mobile" class="form-control" id="" placeholder="Mobile">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input required value="<?php echo $address?>" name="new_address" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>

  <button type="submit" name="update_user" class="btn btn-primary">Update My Details</button>


</form>
<form action="" method="post" enctype="multipart/form-data">
    <h3>Your Profile Picture</h3>
    <img style="height: 200px; width: 200px;" class="rounded mx-auto d-block" src="./user_area/profile_pics/<?php echo"$pic"; ?>" >

<div class="mb-3">
  <label for="" class="form-label">Select New Picture to change</label>
  <input required name="update_pic" class="form-control" type="file" >
</div>
<button type="submit" name="update_pro_pic" class="btn btn-primary">Change Profile Picture</button>

</form>