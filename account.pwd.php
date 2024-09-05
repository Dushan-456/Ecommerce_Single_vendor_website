
<?php

$user_id = $_SESSION["user_id"];

if(isset($_POST["update_pwd"])){
    $old_pwd = $_POST['old_pwd'];
    $new_pwd = $_POST['new_pwd'];
    $conform_new_pwd = $_POST['conform_new_pwd'];

    $pwd_query ="SELECT * FROM `users` WHERE user_id = '$user_id'";
    $pwd_result = mysqli_query($conn, $pwd_query);
    $result_row = mysqli_fetch_assoc($pwd_result);
    $hashed_pwd = $result_row["password"];
    $check_pwd = password_verify($old_pwd, $hashed_pwd);
    if($check_pwd == false ){
        echo "<script>window.location.href = './account.php?pwdchange&error=wrongpwd';</script>";
            exit();
    }else if($conform_new_pwd == $new_pwd){ 

        if($check_pwd == true){
            $new_hashed_pwd = password_hash($new_pwd, PASSWORD_DEFAULT);
    
            $pwd_update_query = "UPDATE `users` SET `password` = '$new_hashed_pwd' WHERE `users`.`user_id` = $user_id";
            $result = mysqli_query($conn, $pwd_update_query);
            if($result){
                echo "<script>alert('Password Updated Please Log again')</script>";
                echo "<script>window.location.href = './logout.php';</script>";
    
            }
    
        }



    }else {
        echo "<script>window.location.href = './account.php?pwdchange&error=pwdnotmatch';</script>";

    }




}

?>

<div class="col-8">
    <h1>Change Password</h1>
    
<?php
if(isset($_GET['error'])){
    if($_GET["error"] == "wrongpwd"){
        echo "            <div class='errorlog'><h4>Wrong Password please try again  </h4></div>";
     } else if($_GET["error"] == "pwdnotmatch"){
        echo "            <div class='errorlog'><h4> Password Does not match  </h4></div>";
     }
    
    }

?>
<form action="" method="post" >

<div class="form-floating mb-3">
  <input name="old_pwd" type="password" class="form-control" id="floatingInput" placeholder="Old password">
  <label for="floatingInput">Old password</label>
</div>
<div class="form-floating mb-3">
  <input name="new_pwd" type="password" class="form-control" id="floatingPassword" placeholder="New Password">
  <label for="floatingPassword">New Password</label>
</div>
<div class="form-floating mb-3">
  <input name="conform_new_pwd" type="password" class="form-control" id="floatingPassword" placeholder="Conform New Password">
  <label for="floatingPassword">Conform New Password</label>
</div>
<button type="submit" name="update_pwd" class="btn btn-primary">Change Password</button>


</form>

</div>