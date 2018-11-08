<div class="modal fade " id="addArtist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Artist</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="artists.php" method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="name"  placeholder="Name">
          </div>

          <div class="form-group">
            <label for="">Date Of Birth</label>
            <input type="date" class="form-control" name="dob"  placeholder="Date Of Birth">
          </div>


          <button type="submit" class="btn btn-danger pull-right elevation-2" name="addArtist">ADD</button>
        </form>

      </div>
    </div>
  </div>
</div>
