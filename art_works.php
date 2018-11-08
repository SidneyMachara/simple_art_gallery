<?php include('models/Db.php'); ?>
<?php


//this code only activated when add art_work btn is clicked
if(isset($_POST['addArt'])){

  //the path to store Image
  $target = "css/imgs/".basename($_FILES['image']['name']);
  $image = $_FILES['image']['name'];
  //move image into folder images
  if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
      $msg= "sucesfull";
    }else{
      $msg= "there was a problem";
    }

  // get form details
  $name = $_POST['name'];
  $created_on = $_POST['created_on'];
  $price = $_POST['price'];
  $location = $_POST['location'];
  $artist_id = $_POST['artist_id'];
  $art_style = $_POST['art_style'];
  if(!isset($_POST['on_sale'])){
    $on_sale = 0;
  }else{
      $on_sale = $_POST['on_sale'];
  }
  $description = $_POST['description'];


  // insert into SQLiteDatabase
  $query = "INSERT INTO art_work (name,created_on,price,location,artist_id,art_style,on_sale,art_image,description)
           VALUES ('$name','$created_on','$price','$location','$artist_id','$art_style','$on_sale','$image','$description')";
  mysqli_query($conn, $query);
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
              <a href="#" class="btn btn-outline-dark pull-right elevation-2" data-toggle="modal" data-target="#addArt">ADD ART</a>
              <h4 class="color-orange">ART WORK</h4>
              <hr>

              <?php
                 $query = "SELECT * FROM art_work";
                 $result = mysqli_query($conn,$query);

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
               ?>

            </div>
          </div>
        </div>

      </div>

    </div>


  <?php include('inc/footer.php') ?>

  <!-- Modal -->
  <?php include('inc/modals/addArt.php') ?>
  </body>
</html>
