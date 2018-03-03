<?php
  session_start();

  require 'connection.php';

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
  $reservationId = $_GET["id"];
  $reservationSql = "SELECT * FROM tbl_reservation WHERE id='$reservationId'";
  $reservationResult = $cn->query($reservationSql);
    if ($reservationResult->num_rows > 0) {
      while($row = $reservationResult->fetch_assoc()) {
          $contactNumber = $row["contactNumber"];
          $reservedDate = $row["reservedDate"];
          $time = $row["time"];
          $user_id = $row["user_id"];
          $payment_id = $row["payment_id"];
    }
  }
  $amenitySql = "SELECT * FROM tbl_reservation_amenities WHERE reservation_id='$reservationId'";
  $amenityResult = $cn->query($amenitySql);
  $amenitiesArray = array();
    if ($amenityResult->num_rows > 0) {
      while($row = $amenityResult->fetch_assoc()) {
        array_push($amenitiesArray, $row["amenity_id"]);
      }
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
  <title>Modify Reservation</title>
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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="#">
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
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
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
        <li class="breadcrumb-item active">Modify Reservation</li>
      </ol>
    </div>

    <!-- RESERVATION FORM -->
    <div class="container-fluid" style="padding-bottom: 3px; padding-top: 3px;">
      <form method="post" action="modify_reservation_redirect.php">
        <?php
          echo '
            <input type="hidden" id="reservationId" name="reservationId" value=' . $reservationId . '/>
          ';
        ?>
        <div class="row">
          <div class="offset-1 col-10">
            <h3>Select Time</h3><br/>
          </div>
        </div>
        <div class="row">
          <div class="offset-1 col-md-10">
            <div class="form-group">
              <div class="input-group">
                <label class="radio">
                  <?php
                    if ($time == "Day") {
                      echo '
                        <input type="radio" name="time" value="Day" checked>
                      ';
                    }
                    else {
                      echo '
                        <input type="radio" name="time" value="Day">
                      ';
                    }
                  ?>
                  Day
                </label>
                <div class="col-2"></div>
                <label class="radio">
                  <?php
                    if ($time == "Night") {
                      echo '
                        <input type="radio" name="time" value="Night" checked>
                      ';
                    }
                    else {
                      echo '
                        <input type="radio" name="time" value="Night">
                      ';
                    }
                  ?>
                  Night
                </label>
              </div>
            </div>
          </div>
        </div>
        </div><br/><br/>

        <div class="row">
          <div class="offset-1 col-10">
            <h3>Select Date</h3><br/>
          </div>
        </div>
        <div class="row">
          <div class="offset-1 col-10">
            <div class="form-group">
              <div class="input-group">
                <?php
                  echo '
                    <input type="text" class="form-control" id="reservationDate" name="reservationDate" value=' . $reservedDate . ' required/>
                  ';
                ?>
              </div>
            </div>
          </div>
        </div><br/><br/>
        <?php
          $sql = "SELECT * FROM tbl_amenities WHERE isVisible=true";

          $result = $cn->query($sql);
            if ($result->num_rows > 0) {

              echo '
                <div class="row">
                  <div class="offset-1 col-10">
                    <h3>Select Amenities </h3>
                  </div>
                </div>
                <br/>
                <div class="row">
              ';

              while($row = $result->fetch_assoc()) {
                echo '
                  <div class="offset-1 col-10">
                    <label class="checkbox-inline">
                ';

                if(in_array($row["id"], $amenitiesArray)) {
                  echo '<input type="checkbox" name="amenity[]" value="' . $row["id"] . '" checked>&nbsp;' . $row["amenityName"] . '';
                }
                else {
                  echo '<input type="checkbox" name="amenity[]" value="' . $row["id"] . '">&nbsp;' . $row["amenityName"] . '';
                }

                echo '
                    </label>
                  </div>
                ';
                }
                echo '</div><br/><br/>';
              }
            else {
              echo "0 results";
              }
        ?>
        <div class="row">
          <div class="offset-1 col-10">
            <h3>Contact Info</h3>
          </div>
        </div><br/>
        <div class="row">
          <div class="offset-1 col-10">
            <div class="control-group form-group">
              <div class="controls">
                <label>Contact Number</label>
                <?php
                  echo '
                    <input type="text" class="form-control" name="contactNumber" required data-validation-required-message="Please enter your contact number." value="' . $contactNumber . '">
                  ';
                ?>
              </div>
            </div><br/>

            <div class="control-group form-group">
              <div class="controls">
                <label>
                  <input type="checkbox" name="termsAndConds" value="Terms and Conditions" required data-validation-required-message="This field is required.">
                  I have read and agree with the <a href="termsandconds.php" target="_blank">terms and conditions.</a>
                </label>
              </div>
            </div><br/>

            <div id="success"></div>
            <div class="control-group form-group">
              <div class="controls">
                <!-- For success/fail messages -->
                <button type="submit" class="btn btn-primary" id="btnSubmit">Next</button>
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

<!--  -->

</body>

</html>