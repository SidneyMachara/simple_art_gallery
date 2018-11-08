<?php
include('models/Db.php');
// include('models/Funct.php');
$artistId = $_GET['artistId'];

  $query = "SELECT * FROM artists WHERE id = $artistId";
  $result = mysqli_query($conn,$query);
  $artist = mysqli_fetch_assoc($result);
  // to avoid invalid url access
  if($result->num_rows <= 0){
    header("location:index.php");
  }
$artistId = $artist['id'];


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

        <div class="col-md-2">
          <div class="card">
            <div class="card-body">

              <div class="row">
                <div class="col-12 mb-3">
                  <img src="css/imgs/avatar5.png" alt="..." class="rounded-circle img-thumbnail">
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <h4 class="text-bold">Name</h4>
                  <p><?php echo $artist['Name'] ?></p>

                  <h4>DOB</h4>
                  <p> <?php $date = new DateTime($artist['DOB']);  echo date_format($date, ' jS F Y'); ?></p>

                  <h4>Joined on</h4>
                  <p> <?php $date = new DateTime($artist['joined_on']);  echo date_format($date, ' jS F Y'); ?></p>

                  <form class="" action="artists.php" method="post">
                    <input type="hidden" name="artist_id" value='<?php echo $artistId ?>'>
                    <input type="submit" name="delete" value="Delete Artist" class="btn btn-danger elevation-3">
                  </form>

                </div>
              </div>

            </div>
          </div>

        </div>


        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
                <h2>ART</h2>
                <hr>

                <?php
                   $query = "SELECT * FROM art_work WHERE artist_id = $artistId";
                   $result = mysqli_query($conn,$query);

                  // convert results to array
                    $rows = [];
                    while($row = mysqli_fetch_array($result))
                    {
                        $rows[] = $row;
                    }


                    // make arrays of 4
                    foreach (array_chunk($rows,3) as $fourArts) {
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
                 ?>



            </div>
          </div>
        </div>

      </div>

    </div>


  <?php include('inc/footer.php') ?>
  </body>
</html>
