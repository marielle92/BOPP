<?php
  session_start();

  $cn = mysqli_connect('localhost', 'root', '', 'blueoasis');
    if($cn->connect_errno > 0) {
      die('Unable to connect to database [' . $cn->connect_error . ']');
    }

    $id = $_SESSION["id"];
    $sql = "SELECT * FROM tbl_user where id='$id'";
    $result = $cn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $_SESSION["firstName"] = $row["firstName"];
        $_SESSION["middleName"] = $row["middleName"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["username"] = $row["username"];
      }
    }
    else {
      echo '<script> alert("Non-existent in DB"); window.location.href="index.php"; </script>';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Check In</title>
  <!-- Bootstrap core CSS-->
  <link href="startbootstrap-sb-admin-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="startbootstrap-sb-admin-gh-pages/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="startbootstrap-sb-admin-gh-pages/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="startbootstrap-sb-admin-gh-pages/css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" style="color: #4CA6A6;">Hello, <?php echo $_SESSION["firstName"] . "!"; ?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="user_reservation.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Make Reservation</span>
          </a>
        </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="user_feedback.php">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">Feedback</span>
            </a>
          </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="user_booking.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">My Booking</span>
          </a>
        </li>
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Check In</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="user_checkout.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Check Out</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Check In</li>
      </ol>
    </div>

    <div class="container-fluid">

      <!-- AMENITIES FROM DATABASE -->
      <?php
        // Get latest reservation
        $reservationSql = "SELECT * FROM tbl_reservation WHERE user_id='$id' ORDER BY id DESC LIMIT 1";
        $reservationResult = $cn->query($reservationSql);
        if($reservationResult->num_rows > 0) {
          $reservationRow = $reservationResult->fetch_assoc();
          $reservationId = $reservationRow["id"];
          
          // Get amenities under latest reservation
          $resAmenitySql = "SELECT * FROM tbl_reservation_amenities WHERE reservation_id = '$reservationId'";
          $resAmenityResult = $cn->query($resAmenitySql);
          if($resAmenityResult->num_rows > 0) {
            while($resAmenityRow = $resAmenityResult->fetch_assoc()) {
              $amenityId = $resAmenityRow["amenity_id"];

              // Get amenity details
              $amenitySql = "SELECT * FROM tbl_amenities WHERE id = '$amenityId'";
              $amenityResult = $cn->query($amenitySql);
              if ($amenityResult->num_rows > 0) {
                while($amenityRow = $amenityResult->fetch_assoc()) { 
                  echo '
                    <!-- CHECK IN EQUIPMENT STATUS -->
                    <div class="col-md-12 mb-3">
                      <div class="card">
                        <div class="card-header">
                          <strong>' . $amenityRow["amenityName"] . '</strong>
                        </div>
                        <div class="card-body">
                    ';

                      // Get equipments for each amenity
                      $equipmentSql = "SELECT * FROM tbl_equipment WHERE amenity_id = " . $amenityRow["id"];
                      $equipmentResult = $cn->query($equipmentSql);

                      if($equipmentResult->num_rows > 0) {
                        echo '
                        
                          <table class="table table-responsive table-striped" style="width:100%">
                            <tr align="center">
                              <th>
                                Name
                              </th>
                              <th>
                                Qty
                              </th>
                              <th>
                                Complete
                              </th>
                              <th>
                                Incomplete
                              </th>
                              <th>
                                Damaged
                              </th>
                              <th>
                                Unavailable
                              </th>
                              <th>
                                Comment
                              </th>
                            </tr>
                        ';

                        while($equipmentRow = $equipmentResult->fetch_assoc()) {
                          echo '
                            <tr align="center">
                              <td>
                                ' . $equipmentRow["equipmentName"] . '
                              </td>
                              <td>
                                '. $equipmentRow["quantity"] . '
                              </td>
                              <td>
                                <form action="checkin_redirect.php" method="post">
                                  <label><input type="radio" name="'. $equipmentRow["equipmentName"] . 'Status" value="Complete" checked></label>
                              </td>
                              <td>
                              <label><input type="radio" name="'. $equipmentRow["equipmentName"] . 'Status" value="Incomplete"></label>
                              </td>
                              <td>
                              <label><input type="radio" name="'. $equipmentRow["equipmentName"] . 'Status" value="Damaged"></label>
                              </td>
                              <td>
                              <label><input type="radio" name="'. $equipmentRow["equipmentName"] . 'Status" value="Unavailable"></label>
                              </td>
                              <td>
                                <textarea class="form-control" rows="2" id="'. $equipmentRow["equipmentName"] . 'Comment" style="font-size: 12px;"></textarea>
                              </td>
                            </tr>
                          ';
                        }

                        echo '
                          </table>
                          
                        ';
                      }

                  echo '
                        </div>
                      </div>
                    </div>
                  ';
                }
              }
            }
             echo '
                      <input type="submit" value="Submit" style="text-align:center;">
                  </form>
                ';
          }
        }
      ?>

    </div>
  </div>

    

      <!-- Example DataTables Card-->
      
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="index.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="startbootstrap-sb-admin-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="startbootstrap-sb-admin-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="startbootstrap-sb-admin-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="startbootstrap-sb-admin-gh-pages/vendor/chart.js/Chart.min.js"></script>
    <script src="startbootstrap-sb-admin-gh-pages/vendor/datatables/jquery.dataTables.js"></script>
    <script src="startbootstrap-sb-admin-gh-pages/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="startbootstrap-sb-admin-gh-pages/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="startbootstrap-sb-admin-gh-pages/js/sb-admin-datatables.min.js"></script>
    <script src="startbootstrap-sb-admin-gh-pages/js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>