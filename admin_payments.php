<?php

  session_start();

  require 'connection.php';

    $id = $_SESSION["id"];
    $nameSql = "SELECT * FROM tbl_user where id='$id'";
    $nameResult = $cn->query($nameSql);
      if ($nameResult->num_rows > 0) {

        while($row = $nameResult->fetch_assoc()) {
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
  <title>Payment Records</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


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
      <ul class="navbar-nav">
        <li class="nav-item active"><a class="nav-link" href="#">Records<span class="sr-only">(current)</span></a></li>
        <li class="nav-item"><a class="nav-link" href="admin_amenities.php">Inventory</a></li>
        <li class="nav-item"><a class="nav-link" href="admin_content_home.php">Content</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
      </ul>
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="admin_reservations.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Reservations</span>
          </a>
        </li>
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Payments</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="admin_users.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Users</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="admin_logs.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Logs</span>
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
        <li class="breadcrumb-item active">Payments</li>
      </ol>
    </div>

    <!-- Example DataTables Card-->
    <div class="container-fluid">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Payments</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th></th>
                  <th>Payment ID</th>
                  <th>Full Name</th>
                  <th>Country</th>
                  <th>City</th>
                  <th>Specific Address</th>
                  <th>Total Amount</th>
                  <th>Downpayment Amount</th>
                  <th>Downpayment Paid On</th>
                  <th>Remaining Balance</th>
                  <th>Full Paid On</th>
                  <th>Payment Status</th>
                  <th>Reservation ID</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $sql = "SELECT * FROM tbl_payment";
                  $result = $cn->query($sql);
                    if ($result->num_rows > 0) {

                      while($row = $result->fetch_assoc()) {
                        $paymentId = $row["id"];
                        $fullName = $row["fullName"];
                        $addressCountry = $row["addressCountry"];
                        $addressCity = $row["addressCity"];
                        $addressOthers = $row["addressOthers"];
                        $totalAmount = $row["totalAmount"];
                        $dpAmount = $row["dpAmount"];
                        $dpPaidOn = $row["dpPaidOn"];
                        $remainingBalance = $row["remainingBalance"];
                        $fullPaidOn = $row["fullPaidOn"];
                        $paymentStatus = $row["paymentStatus"];
                        $reservationId = $row["reservation_id"];

                        //table rows
                        echo '
                          <tr>
                            <td>
                              <!-- Button to Open the Modal -->
                              <button type="button" class="btn btn-primary btn-sm btn_update" data-toggle="modal" data-target="#update" data-rId="'. $paymentId .'">
                                Update
                              </button>

                            </td>
                            <td>' . $paymentId . '</td>
                            <td>' . $fullName . '</td>
                            <td>' . $addressCountry . '</td>
                            <td>' . $addressCity . '</td>
                            <td>' . $addressOthers . '</td>
                            <td>' . $totalAmount . '</td>
                            <td>' . $dpAmount . '</td>
                            <td>' . $dpPaidOn . '</td>
                            <td>' . $remainingBalance . '</td>
                            <td>' . $fullPaidOn . '</td>
                            <td>' . $paymentStatus . '</td>
                            <td>' . $reservationId . '</td>
                          </tr>
                        ';
                        }
                      }

                    else {
                      echo "0 results";
                      }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

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

  <!-- insert modal here -->
  <!-- The Modal -->
  <div class="container-fluid">
    <div class="modal fade" id="update">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Update Row</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- $("input[name='reservationId']").val() -->
          <!-- Modal body -->
          <div class="modal-body">
            <form action="payment_update.php" method="post">
              <div class="row" style="margin-left:10%;">
                <div class="col-md-5">
                  <label>Payment ID</label>
                </div>
                <div class="col-md-3">
                  <input type="text" name="paymentId" style="background-color:#C0C0C0;" readonly>
                </div>
              </div><br>
              <div class="row" style="margin-left:10%;">
                <div class="col-md-5">
                  <label>Full Name</label>
                </div>
                <div class="col-md-3">
                  <input type="text" name="fullName" required>
                </div>
              </div><br>
              <div class="row" style="margin-left:10%;">
                <div class="col-md-5">
                  <label>Country</label>
                </div>
                <div class="col-md-3">
                  <input type="text" name="addressCountry" required>
                </div>
              </div><br>
              <div class="row" style="margin-left:10%;">
                <div class="col-md-5">
                  <label>City</label>
                </div>
                <div class="col-md-3">
                  <input type="text" name="addressCity" required>
                </div>
              </div><br>
              <div class="row" style="margin-left:10%;">
                <div class="col-md-5">
                  <label>Specific Address</label>
                </div>
                <div class="col-md-3">
                  <input type="text" name="addressOthers" required>
                </div>
              </div><br>
              <div class="row" style="margin-left:10%;">
                <div class="col-md-5">
                  <label>Total Amount</label>
                </div>
                <div class="col-md-3">
                  <input type="text" name="totalAmount">
                </div>
              </div><br>
              <div class="row" style="margin-left:10%;">
                <div class="col-md-5">
                  <label>Downpayment Amount</label>
                </div>
                <div class="col-md-3">
                  <input type="text" name="dpAmount" style="background-color:#C0C0C0;" readonly>
                </div>
              </div><br>
              <div class="row" style="margin-left:10%;">
                <div class="col-md-5">
                  <label>Downpayment Paid On</label>
                </div>
                <div class="col-md-3">
                  <input type="text" name="dpPaidOn" style="background-color:#C0C0C0;" readonly>
                </div>
              </div><br>
              <div class="row" style="margin-left:10%;">
                <div class="col-md-5">
                  <label>Remaining Balance</label>
                </div>
                <div class="col-md-3">
                  <input type="text" name="remainingBalance" required>
                </div>
              </div><br>
              <div class="row" style="margin-left:10%;">
                <div class="col-md-5">
                  <label>Full Paid On</label>
                </div>
                <div class="col-md-3">
                  <input type="text" name="fullPaidOn">
                </div>
              </div><br>
              <div class="row" style="margin-left:10%;">
                <div class="col-md-5">
                  <label>Payment Status</label>
                </div>
                <div class="col-md-3">
                  <input type="text" name="paymentStatus" required>
                </div>
              </div><br>
              <div class="row" style="margin-left:10%;">
                <div class="col-md-5">
                  <label>Reservation Id</label>
                </div>
                <div class="col-md-3">
                  <input type="text" name="reservationId" style="background-color:#C0C0C0;" readonly>
                </div>
              </div><br>
              <div class="row" style="margin-left: 10%;">
                <div class="col-md-3">
                  <button type="submit" class="btn btn-success">Update</button>
                </div>
              </div>
            </form>

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
  <!-- jqBootstrapValidation -->
  <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
  <script>
    $(function () {
      $("input,select,text").not("[type=submit]").jqBootstrapValidation();
    });
  </script>

  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>

  <script type="text/javascript">
    $('#dataTable').DataTable( {
      dom: 'Blfrtip',
      buttons: [
      {
        extend: 'excel',
        exportOptions: {
          columns: [1,2,3,4,5,6,7,8,9,10,11,12]
        }
      },
      {
        extend: 'pdf',
        exportOptions: {
          columns: [1,2,3,4,5,6,7,8,9,10,11,12]
        }
      },
      {
        extend: 'print',
        exportOptions: {
          columns: [1,2,3,4,5,6,7,8,9,10,11,12]
        }
      }

       ]
    } );
  </script>

  <!--ajax -->
  <script type="text/javascript">
    $(function(){
      $(document).on('click', '.btn_update', function(){
        var paymentId = $(this).attr('data-rId');
        $.ajax({
          url : "get_payments.php?update=true&rid=" + paymentId,
          type : "get",
          dataType : 'json',
          success : function(data){
            console.log(data);
            $("input[name='paymentId']").val(data.id);
            $("input[name='fullName']").val(data.fullName);
            $("input[name='addressCountry']").val(data.addressCountry);
            $("input[name='addressCity']").val(data.addressCity);
            $("input[name='addressOthers']").val(data.addressOthers);
            $("input[name='totalAmount']").val(data.totalAmount);
            $("input[name='dpAmount']").val(data.dpAmount);
            $("input[name='dpPaidOn']").val(data.dpPaidOn);
            $("input[name='remainingBalance']").val(data.remainingBalance);
            $("input[name='fullPaidOn']").val(data.fullPaidOn);
            $("input[name='paymentStatus']").val(data.paymentStatus);
            $("input[name='reservationId']").val(data.reservation_id);

          },
          error: function(err){
            console.log(err);
          }
        })
      })
    });
  </script>
</body>

</html>
