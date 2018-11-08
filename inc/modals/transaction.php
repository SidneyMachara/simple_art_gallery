<div class="modal fade " id="sell" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Transaction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="art_work.php?art_workId='<?php echo $art_workId; ?> ' " method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="customer_name"  placeholder="Customer Name">
          </div>

          <div class="form-group">
            <input type="number" class="form-control" name="phone_number"  placeholder="Customer Phone Number">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="email"  placeholder="Customer email">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="passport_number"  placeholder="Customer passport number">
          </div>


          <button type="submit" class="btn btn-danger pull-right elevation-2" name="sell">ADD</button>
        </form>

      </div>
    </div>
  </div>
</div>
