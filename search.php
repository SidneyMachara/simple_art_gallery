<?php
include('models/Db.php');
// include('models/Funct.php');

if(isset($_POST['search'])){
  $searchQuery = $_POST['search'];
  $query = "SELECT * FROM art_work WHERE (name LIKE '%$searchQuery%') OR (description LIKE '%$searchQuery%')";
  $result = mysqli_query($conn,$query);
}
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
          <div class="card">
            <div class="card-body">
                <h4 class="color-orange">Search results</h4>
                <hr>

                <?php
                  if($result->num_rows >0){

                  // convert results to array
                    $rows = [];
                    while($row = mysqli_fetch_array($result))
                    {
                        $rows[] = $row;
                    }


                    // make arrays of 4
                    foreach (array_chunk($rows,4) as $fourArts) {
                      ?>
                        <div class="card-deck">
                      <?php

                     foreach ($fourArts as $art) {
                       ?>

                       <div class="card mb-4 elevation-2" style="max-width:220px;">
                         <img class="card-img-top" src="css/imgs/<?php echo $art['art_image'] ?>" alt="Card image cap">
                         <div class="card-body ">
                           <h5 class="card-title"><?php echo $art['name']; ?></h5>
                           <p class="card-text"><?php echo mb_strimwidth($art['description'], 0, 35, "..."); ?></p>

                           <a  href="art_work.php?art_workId='<?php echo $art['art_id']; ?> ' " class="btn btn-danger">View</a>
                         </div>
                       </div>
                       <?php
                     }
                     ?>
                      </div>
                      <?php
                    }

                    // \.
                  }else{
                    ?>
                    <div class="alert alert-info">
                      No art by such name or description was found in search ...
                    </div>
                    <?php
                  }
                 ?>


            </div>
          </div>
        </div>

      </div>

    </div>


  <?php include('inc/footer.php') ?>
  </body>
</html>
