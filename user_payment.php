<?php
  session_start();

  require 'connection.php';

    $id = $_SESSION["id"];
    $reservationId = $_SESSION["reservationId"];
    $reservationTime = $_SESSION["time"];


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
  <title>Reservation</title>
  <!-- Bootstrap core CSS-->
  <link href="startbootstrap-sb-admin-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="startbootstrap-sb-admin-gh-pages/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="startbootstrap-sb-admin-gh-pages/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="startbootstrap-sb-admin-gh-pages/css/sb-admin.css" rel="stylesheet">
  <!-- bootstrap calendar -->
  <link href="css/bootstrap-datepicker/bootstrap-datepicker.standalone.min.css" rel="stylesheet">
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
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
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
        <li class="breadcrumb-item active"><a href="user_reservation.php">Make Reservation</a> / Payment</li>
      </ol>
    </div>


    <div class="container-fluid" style="padding-bottom: 3px; padding-top: 3px;">
      <!-- Booking Summary -->
      <div class="row">
        <div class="offset-1 col-10">
          <h3>Booking Summary</h3>
        </div>
      </div>
      <div class="row">
          <div class="offset-1 col-md-10">
            <?php

              if ($reservationTime == "Day") {
                $reservationTimePrice = 9000;
              }
              else {
                $reservationTimePrice = 10000;
              }

              echo $reservationTime . " Swimming: <b>" . (string)$reservationTimePrice . '.00Php</b><br>';
              $totalAmenityPrice = 0;

              $sql = "SELECT * FROM tbl_reservation_amenities WHERE reservation_id='$reservationId'"; //reservation id
              $result = $cn->query($sql);
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  $amenityId = $row["amenity_id"];
                  //echo $amenityId;
                  $tblAmenitySql = "SELECT * FROM tbl_amenities WHERE id='$amenityId'";
                  $result1 = $cn->query($tblAmenitySql);

                  $cn->query($tblAmenitySql);
                    while($row1 = $result1->fetch_assoc()) {
                      echo $row1["amenityName"] . ': <b>' . $row1["amenityPrice"] . '.00Php</b><br>';
                      $totalAmenityPrice = $totalAmenityPrice + $row1["amenityPrice"];

                    }
                }
                echo "<br>";
                //echo $totalAmenityPrice;
                $totalAmount = $totalAmenityPrice + $reservationTimePrice;
                //echo $totalAmount;
                echo "<b>Total: </b><h4>" . $totalAmount . ".00Php</h4><br>";
                $dpAmount = $totalAmount / 2;
                echo "<b>Downpayment: </b><h4>" . $dpAmount . ".00Php</h4>";
                $remainingBalance = $totalAmount - $dpAmount;
                $_SESSION["totalAmount"] = $totalAmount;
                $_SESSION["dpAmount"] = $dpAmount;
                $_SESSION["remainingBalance"] = $remainingBalance;
              }
              else {
                echo "0 results";
              }
            ?>
          </div>
        </div><br/>
      <!-- RESERVATION FORM -->
      <form method="post" action="payment_redirect2.php" enctype="multipart/form-data">
        <div class="row">
          <div class="offset-1 col-10">
            <h3>Bill to:</h3>
          </div>
        </div>
        <div class="row">
          <div class="offset-1 col-10">
            <div class="control-group form-group">
              <div class="controls">
                <label>Full Name</label>
                <input type="text" class="form-control" name="fullName" required>
              </div>
            </div><br/>
          </div>
        </div>

        <div class="row">
          <div class="offset-1 col-10">
            <h3>Billing Address</h3>
          </div>
        </div>
        <div class="row">
          <div class="offset-1 col-10">
            <div class="control-group form-group">
              <div class="controls">
                <label>Country</label>
                <input type="text" class="form-control" name="add_country" required data-validation-required-message="Please enter your contact number.">
              </div>
            </div><br/>
            <div class="control-group form-group">
              <div class="controls">
                <label>City</label>
                <input type="text" class="form-control" name="add_city" required data-validation-required-message="Please enter your contact number.">
              </div>
            </div><br/>
            <div class="control-group form-group">
              <div class="controls">
                <label>Street Number, Street Name, Subdivision, Barangay, etc.</label>
                <input type="text" class="form-control" name="add_others" required data-validation-required-message="Please enter your contact number.">
              </div>
            </div><br/>

            <div id="success"></div>
            <div class="control-group form-group">
              <div class="controls">
                <label><b>UPLOAD DEPOSIT SLIP PHOTO</b></label><br>
                <input name="photo" type="file" accept="image/jpeg, image/png, image/jpg" required/><br><br>
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
          </div>
        </div>

      </form>
    </div>

      <!-- Example DataTables Card-->

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>by Marielle</small>
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
            <a class="btn btn-primary" href="logout_redirect.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
  <!-- Bootstrap core JavaScript-->
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
  <!-- jqBootstrapValidation -->
  <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
  <script>
    $(function () {
      $("input,select,text").not("[type=submit]").jqBootstrapValidation();
    });
  </script>

  <script type="text/javascript" src="js/momentjs/moment.js"></script>
  <script type="text/javascript" src="js/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

  <script type="text/javascript">
    $(function () {
      $('#reservationDate').datepicker({
        format: 'yyyy-mm-dd',
        startDate: moment().format('YYYY-MM-DD')
      });
    });
  </script>


</body>

</html>
