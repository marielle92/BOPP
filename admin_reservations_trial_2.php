<?php
  
  session_start();

  $cn = mysqli_connect('localhost', 'root', '', 'blueoasis');
    if($cn->connect_errno > 0) {
      die('Unable to connect to database [' . $cn->connect_error . ']');
    }

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
  <title>Reservation Records</title>

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
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Reservations</span>
          </a>
        </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="admin_payments.php">
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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Inventory">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Inventory</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="admin_amenities.php">Amenities</a>
            </li>
            <li>
              <a href="admin_equipment.php">Equipment</a>
            </li>
          </ul>
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
        <li class="breadcrumb-item active">Reservations</li>
      </ol>
    </div>

    <!-- Example DataTables Card-->
    <div class="container-fluid">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Reservations</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th></th>
                  <th>Reservation ID</th>
                  <th>Contact Number</th>
                  <th>Reserved Date</th>
                  <th>Reserved Time</th>
                  <th>User ID</th>
                  <th>Payment ID</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $sql = "SELECT * FROM tbl_reservation";
                  $result = $cn->query($sql);
                    if ($result->num_rows > 0) {

                      while($row = $result->fetch_assoc()) {
                        $reservationId = $row["id"];
                        $contactNumber = $row["contactNumber"];
                        $reservedDate = $row["reservedDate"];
                        $time = $row["time"];
                        $userId = $row["user_id"];
                        $paymentId = $row["payment_id"];

                        /*
                        echo $reservationId . "\n";
                        echo $contactNumber;
                        echo $reservedDate;
                        echo $time;
                        echo $userId;
                        echo $paymentId;
                        */
        
                        
                        //table rows
                        echo '
                          <tr>
                            <td>
                              <!-- Button to Open the Modal -->
                              <button type="button" class="btn btn-primary btn-sm btn_update" data-toggle="modal" data-target="#update" data-rId="'. $reservationId .'">
                                Update
                              </button>
                              
                            </td>
                            <td>' . $reservationId . '</td>
                            <td>' . $contactNumber . '</td>
                            <td>' . $reservedDate . '</td>
                            <td>' . $time . '</td>
                            <td>' . $userId . '</td>
                            <td>' . $paymentId . '</td>
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
  <div class="container">
    <div class="modal fade" id="update">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Update Row</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- $("input[name='reservationId']").val() -->
          <!-- Modal body -->
          <div class="modal-body">
            <form action="reservation_update.php" method="post">
              <label>Reservation ID</label>
              <input type="text" name="reservationId" readonly><br><br>
              <label>Contact Number</label>
              <input type="text" name="contactNumber"><br><br>
              <label>Reserved Date</label>
              <input type="text" name="reservedDate" ><br><br>
              <label>Time</label>
              <input type="text" name="time"><br><br>
              <label>User ID</label>
              <input type="text" name="userId" readonly><br><br>
              <label>Payment ID</label>
              <input type="text" name="paymentId" readonly>
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
       'excel', 'pdf', 'print',]
    } );
  </script>
  <!--ajax -->
  <script type="text/javascript">
    $(function(){
      $(document).on('click', '.btn_update', function(){
        var reservationId = $(this).attr('data-rId');
        $.ajax({
          url : "get_reservations.php?update=true&rid=" + reservationId,
          type : "get",
          dataType : 'json',
          success : function(data){
            console.log(data);
            $("input[name='reservationId']").val(data.id);
            $("input[name='contactNumber']").val(data.contactNumber);
            $("input[name='reservedDate']").val(data.reservedDate);
             $("input[name='time']").val(data.time);
              $("input[name='userId']").val(data.user_id);
               $("input[name='paymentId']").val(data.payment_id);

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
