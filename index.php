<?php
include('models/Db.php');

if(isset($_POST['login'])){

$email = $_POST['email'];
$password = $_POST['pwd'];


  $query = "SELECT * FROM admin WHERE email = '$email'";
  $result = mysqli_query($conn,$query);

    if($result->num_rows == 0){
      // die($email);
        header("location:index.php?errormsg='no user'");
    }else{

        $row = mysqli_fetch_assoc($result);

        if( md5($password) === $row['password'] ){


          header("location:artists.php");
        }else{
            header("location:index.php?errormsg='wrong password'");

        }

    }


}


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include('inc/head.php') ?>

<?php include('inc/navbar.php') ?>
  <body class="login-block">

<div class="container">

  <div class="card mt-5 mb-5 pl-3 ">
    <div class="card-body p-0">
      <div class="row">
        <div class="col-md-4">

              <h2 class="text-center color-orange mt-5">Login Now</h2>
              <hr class="w-50 bg-orange" >
           <form action="index.php" method="post" class="login-form">
             <div class="form-group">
               <label for="exampleInputEmail1" class="text-uppercase">Username</label>
               <input type="text" class="form-control" name="email" placeholder="email">

             </div>
             <div class="form-group">
               <label for="exampleInputPassword1" class="text-uppercase">Password</label>
               <input type="password" name="pwd" class="form-control" placeholder="Password">
             </div>


               <div class="form-check">
               <label class="form-check-label">
                 <input type="checkbox" class="form-check-input">
                 <small>Remember Me</small>
               </label>

               <input type="submit" name="login" value="Login" class="btn btn-login float-right elevation-2">

             </div>
            </form>

        </div>

        <div class="col-md-8 rounded">
             <img class="d-block img-fluid" src="css/imgs/l4.jpeg" alt="First slide" style="width:100vw;">
        </div>

      </div>
    </div>
  </div>

</div>

    <?php include('inc/footer.php') ?>
  </body>
</html>
