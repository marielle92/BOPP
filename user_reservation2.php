<?php
  session_start();

  $cn = mysqli_connect('localhost', 'root', '', 'blueoasis');
    if($cn->connect_errno > 0) {
      die('Unable to connect to database [' . $cn->connect_error . ']');
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

  <!-- jqBootstrapValidation -->
  <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" style="color: #4CA6A6;">Hello, world!</a>
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
          <a class="nav-link" href="guest_booking.html">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">My Booking</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="guest_checkin.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Check In</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="guest_checkout.html">
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
        <li class="breadcrumb-item active">Reservation</li>
      </ol>
    </div>

    <!-- CHECK IN EQUIPMENT STATUS -->
    <div class="container-fluid" style="padding-bottom: 3px; padding-top: 3px;">
      <form method="post" action="reservation_trial_redirect.php">
        <div class="row">
          <div class="col-xs-1 col-md-1"></div>
          <div class="col-xs-4 col-md-4">
            <h3>Select Date and Time</h3><br>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1 col-md-1"></div>
          <div class="col-xs-10 col-md-10">
            <label>Month</label>
            <input type="text" name="month" value="January" readonly>
            <label>Day</label>
            <input type="text" name="day" value="1" readonly>
            <label>Year</label>
            <input type="text" name="year" value="2018" readonly>
            <label>Time</label>
            <input type="text" name="time" value="Day" readonly>
          </div>
        </div><br><br>
        <?php
          $sql = "SELECT * FROM tbl_amenities";

          $result = $cn->query($sql);
            if ($result->num_rows > 0) {

              echo '
                  <div class="row">
                    <div class="col-xs-1 col-md-1"></div>
                    <div class="col-xs-4 col-md-4">
                      <h3>Select Amenities </h3>
                    </div>
                  </div><br>
                  <div class="row">
                    <div class="col-xs-1 col-md-1"></div>
              ';

              while($row = $result->fetch_assoc()) {
                echo '
                  <div class="col-xs-1 col-md-2"><label class="checkbox-inline"><input type="checkbox" name="amenity[]" value="' . $row["id"] . '">&nbsp;' . $row["amenityName"] . '</label></div>
                ';
                }
                echo '</div><br><br>';
              }
            else {
              echo "0 results";
              }
        ?>
        <div class="row">
          <div class="col-xs-1 col-md-1"></div>
          <div class="col-xs-4 col-md-4">
            <h3>Contact Info</h3>
          </div>
        </div><br>
        <div class="row">
          <div class="col-xs-1 col-md-1"></div>
          <div class="col-lg-8 mb-4">
            <div class="control-group form-group">
              <div class="controls">
                <label>Country</label>
                <input type="text" class="form-control" name="add_country" required data-validation-required-message="Please enter your country address.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>City</label>
                <input type="text" class="form-control" name="add_city" required data-validation-required-message="Please enter your city address.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Street Number, Street Name, Barangay, etc.</label>
                <input type="text" class="form-control" name="add_others" required data-validation-required-message="Please enter your street and barangay address.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Contact Number</label>
                <input type="text" class="form-control" name="contactNumber" required data-validation-required-message="Please enter your contact number.">
              </div>
            </div><br>

            <div class="control-group form-group">
              <div class="controls">
                <input type="checkbox" name="termsAndConds" value="Terms and Conditions" required data-validation-required-message="This field is required.">
                <label>I have read and agree with the terms and conditions.</label>
              </div>
            </div><br><br>

            <div id="success"></div>
            <div class="control-group form-group">
              <div class="controls">
                <!-- For success/fail messages -->
                <button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
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
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- jqBootstrapValidation -->
    <script>
      $(function () { $("input,select,text").not("[type=submit]").jqBootstrapValidation(); } );
    </script>

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
