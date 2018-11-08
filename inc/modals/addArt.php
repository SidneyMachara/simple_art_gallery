<?php
$query = "SELECT * FROM artists";
$result = mysqli_query($conn,$query);
 ?>
<div class="modal fade" id="addArt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Art</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="art_works.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <input type="text" class="form-control" name="name"  placeholder="Art Name" required>
          </div>
          <div class="form-group">
            <input type="number" class="form-control" name="price" placeholder="Price" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="art_style"  placeholder="Style" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Date Created</label>
            <input type="date" class="form-control" name="created_on"  placeholder="Date created" required>
          </div>
          <div class="form-group">
             <label for="exampleInputEmail1">Description</label>
            <textarea rows="3" col="100" class="form-control" name="description" required>
            </textarea>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="location"  placeholder="Loaction" required>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="on_sale" >
            <label class="form-check-label" for="defaultCheck1">
              For Sale
            </label>
          </div>

          <input type="file" name="image" value="" required>

          <div class="form-group">
           <label for="exampleFormControlSelect1">Select Artist</label>
           <select class="form-control" id="exampleFormControlSelect1" name="artist_id" required>
             <?php
              while($artist = mysqli_fetch_assoc($result)){
              ?>
             <option value="<?php  echo $artist['id']; ?>"><?php echo $artist['Name']; ?></option>
             <?php
             }
            ?>
           </select>
         </div>

          <button type="submit" class="btn btn-danger pull-right elevation-2" name="addArt">ADD</button>
        </form>

      </div>
    </div>
  </div>
</div>
