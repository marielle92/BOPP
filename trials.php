<div class="container">
  <h2>Update row</h2>
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update">
    Update
  </button>

  <!-- The Modal -->
  <div class="container">
    <div class="modal fade" id="update">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Update Row</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            <form action="reservation_update.php" method="post">
              <label>Reservation ID</label>
              <input type="text" name="reservationId" value="' . $tblResult["id"] . '" readonly>
              <label>Contact Number</label>
              <input type="text" name="contactNumber" value="' . $tblResult["contactNumber"] . '">
              <label>Reserved Date</label>
              <input type="text" name="reservedDate" value="' . $tblResult["reservedDate"] . '">
              <label>Time</label>
              <input type="text" name="time" value="' . $tblResult["time"] . '">
              <label>User ID</label>
              <input type="text" name="userId" value="' . $tblResult["user_id"] . '" readonly>
              <label>Payment ID</label>
              <input type="text" name="paymentId" value="' . $tblResult["payment_id"] . '" readonly>
            </form>

          </div>
          
        </div>
      </div>
    </div>
  </div>
  
</div>