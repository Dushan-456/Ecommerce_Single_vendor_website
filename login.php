<?php
    include("./header.php");

 



   if(isset($_POST["login"])){
    $login_email = $_POST["email"];
    $password = $_POST["password"];

    $login_query ="SELECT * FROM `users` WHERE email = '$login_email'";
    $login_result = mysqli_query($conn, $login_query);
    if(mysqli_num_rows($login_result) > 0){
      $login_result = mysqli_fetch_assoc($login_result);
      $hashed_pwd = $login_result["password"];
      $check_pwd = password_verify($password, $hashed_pwd);
         if($check_pwd == false ){
            echo "<script>window.location.href = './login.php?error=wrongpwd';</script>";
            exit();
         }else if($check_pwd == true){

            // session_start();
            $_SESSION["firstname"] = $login_result['first_name'];
            $_SESSION["lastname"] = $login_result['last_name'];
            $_SESSION["user_id"] = $login_result['user_id'];
            $_SESSION["email"] = $login_result['email'];
            $_SESSION["mobile"] = $login_result['mobile'];
            $_SESSION["address"] = $login_result['address'];
            $_SESSION["profile_pic"] = $login_result['profile_pic'];

            echo'<script>alert("user logged in    ")</script>';
            echo "<script>window.location.href = './index.php';</script>";


            exit();
         }
    }else{
      echo "<script>window.location.href = './login.php?error=usernotreg';</script>";
      exit();

    }
   }

?>

<div class="login-signup">
<div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
			<div id="first">
            <?php
            if(isset($_GET["error"])){
               if($_GET["error"] == "usernotreg"){
                  echo "            <div class='errorlog'><h4>User Not Registered please register first</h4></div>";
               }
               if($_GET["error"] == "wrongpwd"){
                  echo "            <div class='errorlog'><h4>Wrong Password please try again  </h4></div>";
               }
               if($_GET["error"] == "none"){
                  echo "            <div class='errornone'><h4>New user Registered Please Log in </h4></div>";
               }

            }
            ?>
				<div class="myform form ">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<h1>Login</h1>
						 </div>
					</div>
                   <form action="" method="post" name="login">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                           </div>
                           <div class="form-group">
                              <p class="text-center">By signing up you accept our <a href="#">Terms Of Use</a></p>
                           </div>
                           <div class="col-md-12 text-center ">
                              <button name="login" type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                           </div>
                           <div class="col-md-12 ">
                              <div class="login-or">
                                 <hr class="hr-or">
                                 <span class="span-or">or</span>
                              </div>
                           </div>
                           <div class="col-md-12 mb-3">
                              <p class="text-center">
                                 <a href="" class="google btn mybtn"><i class="fa-brands fa-google "></i> &nbsp; Signup using Google
                                 </a>
                              </p>
                           </div>
                           <div class="form-group">
                              <p class="text-center">Don't have account? <a href="./registration.php" id="signup">Sign up here</a></p>
                           </div>
                        </form>
                 
				</div>
			</div>

			</div>
		</div>
      </div>   
</div>
<?php
    include("./footer.php");
?>