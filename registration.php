<?php
    include("./header.php");

    if(isset($_POST["register"])){
        $first_name = $_POST["firstname"];
        $last_name = $_POST["lastname"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
        $address = $_POST["address"];
        $profile_pic = $_FILES["profile_pic"]["name"];
        $temp_profile_pic = $_FILES["profile_pic"]["tmp_name"];
        $pwd = $_POST["password"];
        $conform_pwd = $_POST["conform_password"];

        $already_query = "SELECT * FROM `users` WHERE email ='$email'";
        $already_result = mysqli_query($conn, $already_query);
        if(!mysqli_num_rows($already_result) > 0){
            if($pwd==$conform_pwd){
                move_uploaded_file($temp_profile_pic,"./user_area/profile_pics/$profile_pic");
                $register_query ="INSERT INTO `users` (`first_name`,`last_name`,`email`,`mobile`,`address`,`profile_pic`,`password`)
                 VALUES (?,?,?,?,?,?,?)";
                 $stmt= mysqli_stmt_init($conn);
                 if(!mysqli_stmt_prepare($stmt,$register_query)){
                    echo "<script>window.location.href = './registration.php?error=stmtfailed';</script>";
                 }else{
                    $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,"sssssss", $first_name , $last_name ,$email , $mobile ,$address ,$profile_pic,$hashed_pwd);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                    echo"<script>alert('user registered')</script>";
                 echo "<script>window.location.href = './login.php?error=none';</script>";

                 }                 

            }else{
                echo "<script>window.location.href = './registration.php?error=pwdnotmatch';</script>";

            }
        }else{
            echo "<script>window.location.href = './registration.php?error=alreadyin';</script>";
        }
        
    }




?>

<div class="login-signup">
<div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
            <?php
            if(isset($_GET["error"])){
               if($_GET["error"] == "alreadyin"){
                  echo "            <div class='errorlog'><h4>This Email already registered</h4></div>";
               }
               if($_GET["error"] == "pwdnotmatch"){
                  echo "            <div class='errorlog'><h4>Password Does Not Match </h4></div>";
               }

            }
            ?>
			  <div >
			      <div class="myform form ">
                        <div class="logo mb-3">
                           <div class="col-md-12 text-center">
                              <h1 >Signup</h1>
                           </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                           <div class="form-group">
                              <label for="exampleInputEmail1">First Name</label>
                              <input required type="text"  name="firstname" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Enter Firstname">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Last Name</label>
                              <input required type="text"  name="lastname" class="form-control" id="lastname" aria-describedby="emailHelp" placeholder="Enter Lastname">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input required type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Mobile Number</label>
                              <input required type="text" name="mobile"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Mobile number">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Your Address</label>
                              <input required type="text" name="address"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Your Address">
                           </div>
                           <div class="mb-3">
                            <label for="formFile" class="form-label">Choose Profile Picture</label>
                            <input required class="form-control" type="file" id="formFile" name="profile_pic"  value="user_pic.png">
                            </div>
                            




                           <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input required type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Conform Password</label>
                              <input required type="password" name="conform_password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Conform Password">
                           </div>
                          &nbsp; <input required type="checkbox">&nbsp;<label for="">By signing up you accept our <a href="">Terms Of Use</a></label>

                           <div class="col-md-12 text-center mb-3">
                            <button name="register"  type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Register</button>
                           </div>
                           <div class="col-md-12 ">
                              <div class="form-group">
                                 <p class="text-center"><a href="./login.php" >Already have an account?</a></p>
                              </div>
                           </div>
                            </div>
                        </form>
                     </div>
			</div>
		</div>
      </div>   
</div>
<?php
    include("./footer.php");
?>