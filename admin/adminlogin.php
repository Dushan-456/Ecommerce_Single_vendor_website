<?php
   include("../include/connect.php");

   if(isset($_POST["login"])){
    $login_email = $_POST["email"];
    $password = $_POST["password"];

    $login_query ="SELECT * FROM `users` WHERE email = '$login_email' AND role = 'admin'";
    $login_result = mysqli_query($conn, $login_query);
    if(mysqli_num_rows($login_result) > 0){
      $login_result = mysqli_fetch_assoc($login_result);
      $hashed_pwd = $login_result["password"];
      $check_pwd = password_verify($password, $hashed_pwd);
         if($check_pwd == false ){
            echo "<script>window.location.href = './adminlogin.php?error=wrongpwd';</script>";
            exit();
         }else if($check_pwd == true){

            session_start();
            $_SESSION["firstname"] = $login_result['first_name'];
            $_SESSION["lastname"] = $login_result['last_name'];
            $_SESSION["user_id"] = $login_result['user_id'];
            $_SESSION["role"] = $login_result['role'];
            $_SESSION["profile_pic"] = $login_result['profile_pic'];

            echo'<script>alert("user logged in    ")</script>';
            echo "<script>window.location.href = './index.php';</script>";


            exit();
         }
    }else{
      echo "<script>window.location.href = './adminlogin.php?error=usernotreg';</script>";
      exit();

    }
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">








      <link
         href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
         rel="stylesheet"
         integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
         crossorigin="anonymous" />
         <link
         rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
         integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
         crossorigin="anonymous"
         referrerpolicy="no-referrer" />
      <link
         rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
         integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
         crossorigin="anonymous"
         referrerpolicy="no-referrer" />
</head>
<body>
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
							<h1>Admin Login</h1>
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
                           
                        </form>
                 
				</div>
			</div>

			</div>
		</div>
      </div>   
</div>

    
</body>
</html>