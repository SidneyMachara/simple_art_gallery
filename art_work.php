<?php
include('models/Db.php');

// include('models/Funct.php');


  $art_workId = $_GET['art_workId'];



  $query = "SELECT * FROM art_work WHERE art_id = $art_workId";
  $result = mysqli_query($conn,$query);
  $art = mysqli_fetch_assoc($result);
  // to avoid invalid url access
  if($result->num_rows <= 0){

    header("location:index.php");
  }
  $art_workId = $art['art_id'];
  $price = $art['price'];
  // artist
  $artist_id = $art['artist_id'];
  $query = "SELECT * FROM artists WHERE id = $artist_id";
  $result = mysqli_query($conn,$query);
  $artist = mysqli_fetch_assoc($result);





  //this code only activated when sell btn is clicked
  if(isset($_POST['sell'])){
      // die($customer_name);
    // get form details
    $customer_name = $_POST['customer_name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $passport_number = $_POST['passport_number'];



    // insert into SQLiteDatabase
    $query = "INSERT INTO transaction (customer_name,phone_number,email,art_id,artist_id,passport_number,price)
             VALUES ('$customer_name','$phone_number','$email','$art_workId','$artist_id','$passport_number','$price')";
    mysqli_query($conn, $query);
  }

  //Transaction
  $query = "SELECT * FROM transaction WHERE art_id = $art_workId";
  $TransResult = mysqli_query($conn,$query);
  $transaction = mysqli_fetch_assoc($TransResult);


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

        <div class="col-md-10">
            <div class="row mb-5">
              <div class="col-md-12 ">
                <div class="card card-body ">

                  <img src="css/imgs/<?php echo $art['art_image'] ?>" alt="..." class="img-thumbnail img-fluid img-responsive mx-auto" style="width:400px;height:400px;">
                </div>
              </div>
            </div>

            <div class="row mb-5">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                      <h4>About ART</h4>
                      <hr class="bg-orange">
                      <table class="table">
                        <tr>
                          <th><span class="font-weight-bold">Name: </span> </th>
                          <td> <span><?php echo $art['name']; ?></span></td>
                        </tr>
                        <tr>
                          <th><span class="font-weight-bold">Syle: </span> </th>
                          <td> <span><?php echo $art['art_style']; ?></span></td>
                        </tr>
                        <tr>
                          <th><span class="font-weight-bold">Created_on: </span> </th>
                          <td><span><?php $date = new DateTime($art['created_on']);  echo date_format($date, ' jS F Y');  ?></span></td>
                        </tr>
                        <tr>
                          <th><span class="font-weight-bold">Description: </span> </th>
                          <td><span><?php echo $art['description']; ?></span></td>
                        </tr>
                        <tr>
                          <th><span class="font-weight-bold">Price: </span> </th>
                          <td> <span>(RMB) <?php echo $art['price']; ?></span></td>
                        </tr>
                      </table>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                      <h4>Artist</h4>
                      <hr class="bg-orange">
                      <table class="table">
                        <tr>
                          <th><span class="font-weight-bold">Name: </span> </th>
                          <td> <span><?php echo $artist['Name']; ?></span></td>
                        </tr>
                        <tr>
                          <th><span class="font-weight-bold">DOB: </span> </th>
                          <td><span><?php $date = new DateTime( $artist['DOB']);  echo date_format($date, ' jS F Y');  ?></span></td>
                        </tr>

                      </table>
                  </div>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <h4>Operations</h4>
                    <hr>
                    <!-- check if for sale -->
                    <?php if($art['on_sale'] == 1) {?>
                    <div class="row">
                      <div class="col-md-1">
                        <?php if($TransResult->num_rows == 0) {?>
                        <a href="#" class="btn btn-warning elevation-2" data-toggle="modal" data-target="#sell">Sell</a>
                      <?php } ?>
                      </div>

                      <div class="col-md-11 ">
                        <div class="card card-body ">
                            <h4>Transaction Information</h4>
                            <hr class="bg-orange">
                            <!-- check if sold -->
                            <?php if($TransResult->num_rows > 0) {?>
                            <table class="table">
                              <tr>
                                <th><span class="font-weight-bold">Customer Name: </span> </th>
                                <td> <span><?php echo $transaction['customer_name']; ?></span></td>
                              </tr>
                              <tr>
                                <th><span class="font-weight-bold">Customer Passport #: </span> </th>
                                <td> <span><?php echo $transaction['passport_number']; ?></span></td>
                              </tr>
                              <tr>
                                <th><span class="font-weight-bold">Customer email: </span> </th>
                                <td> <span><?php echo $transaction['email']; ?></span></td>
                              </tr>
                              <tr>
                                <th><span class="font-weight-bold">Customer Mobile Number: </span> </th>
                                <td> <span><?php echo $transaction['phone_number']; ?></span></td>
                              </tr>
                              <tr>
                                <th><span class="font-weight-bold">Date Sold: </span> </th>
                                <td> <span><?php $date = new DateTime( $transaction['date_sold']);  echo date_format($date, ' jS F Y'); ?></span></td>
                              </tr>
                              <tr>
                                <th><span class="font-weight-bold">Price: </span> </th>
                                <td> <span>(Rmb) <?php echo $art['price']; ?></span></td>
                              </tr>
                            </table>
                          <?php }else{ ?>
                            <div class="alert alert-warning">
                              NOT YET SOLD !!
                            </div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  <?php }else{ ?>
                    <div class="alert alert-info">
                      Not For Sale !
                    </div>
                  <?php } ?>
                  </div>
                </div>
              </div>
            </div>


        </div>

      </div>

    </div>


  <?php include('inc/footer.php') ?>
  <!-- Modal -->
  <?php include('inc/modals/transaction.php') ?>
  </body>
</html>
