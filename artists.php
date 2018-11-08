<?php
include('models/Db.php');
// include('models/Funct.php');

//this code only activated when add artist btn is clicked
if(isset($_POST['addArtist'])){

  // get form details
  $name = $_POST['name'];
  $dob = $_POST['dob'];

  // insert into SQLiteDatabase
  $query = "INSERT INTO artists (Name,DOB)
           VALUES ('$name','$dob')";
  mysqli_query($conn, $query);
}

// delete
if(isset($_POST['delete'])){
  $artist_id = $_POST['artist_id'];
  $query = "DELETE FROM artists WHERE id = '$artist_id' ";
  mysqli_query($conn,$query);

  //delet all art related to that artists
  $query = "DELETE FROM art_work  WHERE artist_id = '$artist_id' ";
  $deletedArt = mysqli_query($conn,$query);


  //delete related  transaction
  $query = "DELETE FROM transaction  WHERE artist_id = '$artist_id' ";
  mysqli_query($conn,$query);

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

                <a href="" class="btn btn-outline-dark pull-right mb-4 elevation-2"  data-toggle="modal" data-target="#addArtist"> ADD ARTIST</a>
                <h4 class="color-orange">ARTISTS</h4>
                <hr>


                 <table class="table table-hover">
                   <thead class="bg-dark text-white ">
                     <tr>
                       <th>#</th>
                       <th>Name</th>
                       <th>DOB</th>
                       <th>Joine_on</th>
                        <th></th>
                     </tr>
                   </thead>

                   <tbody>
                     <?php
                        $query = "SELECT * FROM artists";
                        $result = mysqli_query($conn,$query);

                         while($artist = mysqli_fetch_assoc($result)){
                           ?>
                           <tr>
                            <td><?php echo $artist['id']; ?></td>
                            <td><?php echo $artist['Name']; ?></td>
                            <td><?php $date = new DateTime($artist['DOB']);  echo date_format($date, ' jS F Y'); ?></td>
                            <td><?php $date = new DateTime($artist['joined_on']);  echo date_format($date, ' jS F Y');  ?></td>
                            <td><a href="artist.php?artistId='<?php echo $artist['id']; ?> ' " class="bg-info text-dark text-bold" style="border-radius:50%;padding:0 5px;">></a> </td>
                           </tr>
                        <?php

                      }


                      ?>
                   </tbody>
                 </table>
            </div>
          </div>
        </div>

      </div>

    </div>


  <?php include('inc/footer.php') ?>
  <!-- Modal -->
  <?php include('inc/modals/addArtist.php') ?>
  </body>
</html>
