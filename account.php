<?php
include('models/Db.php');


if(isset($_POST['change_pwd'])){

$current_pwd = $_POST['current_pwd'];
$new_pwd = $_POST['new_pwd'];
$confirm_pwd = $_POST['confirm_pwd'];
$email = "admin@gmail.com";


$query = "SELECT * FROM admin WHERE email = '$email'";
$user_data = mysqli_query($conn,$query);




while($row = mysqli_fetch_assoc($user_data)) {
  $real_pwd = $row['password'];
  if(md5($current_pwd) === $real_pwd){
    if($new_pwd == $confirm_pwd){ // allowing chage
         $new_pwd = md5($new_pwd);
         $query = "UPDATE admin SET password = '$new_pwd' WHERE email = '$email' ";
         mysqli_query($conn,$query);
       }
     }
   }
}

// transaction
$query = "SELECT * FROM transaction";
$Tranresult = mysqli_query($conn,$query);
$transaction = mysqli_fetch_assoc($Tranresult);

// Total
$query = "SELECT SUM(price) as totalCash FROM transaction";
$result = mysqli_query($conn,$query);
$totalCash = mysqli_fetch_assoc($result);

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include('inc/head.php') ?>

<?php include('inc/navbar.php') ?>
  <body class="login-block">

    <div class="container-fluid mt-5 mb-5 full-h">

      <div class="row">

        <div class="col-md-2">
          <?php include('inc/sideNav.php'); ?>
        </div>


        <div class="col-md-10 ">
            <div class="card card-body">
              <div class="row mb-5">
                <div class="col-md-12 ">
                  <div class="card card-body border-danger">
                      <h4 class="color-orange">Dashboard</h4>
                      <!-- <hr class="bg-orange"> -->
                        <table class="table">
                          <tr>
                            <th># Art sold</th>
                            <td><?php echo $Tranresult->num_rows ?> </td>
                          </tr>
                          <tr>
                            <th>Total cash</th>
                            <td>(Rmb) <?php echo $totalCash["totalCash"]; ?></td>
                          </tr>
                        </table>
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                  <h4 class="color-orange">Change password</h4>
                  <hr class="bg-orange">
                  <form class="" action="account.php" method="post">
                    <div class="form-group">
                      <input type="password" class="form-control" name="current_pwd"  placeholder="current password">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="new_pwd"  placeholder="new password">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="confirm_pwd"  placeholder="confirm password">
                    </div>
                    <div class="form-group">
                      <input type="submit" class="form-control btn btn-danger elevation-2" name="change_pwd"  value="Change Password">
                    </div>
                  </form>
                </div>

              </div>

            </div>
        </div>

      </div>

    </div>


  <?php include('inc/footer.php') ?>

  </body>
</html>
