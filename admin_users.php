<?php
  session_start();

 require 'connection.php';

    $id = $_SESSION["id"];
    $sql = "SELECT * FROM tbl_user where id='$id'";
    $result = $cn->query($sql);
      if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
          $_SESSION["firstName"] = $row["firstName"];
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
  <title>User Records</title>
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
          <a class="nav-link" href="admin_reservations">
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
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="#">
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
        <li class="breadcrumb-item active">Users</li>
      </ol>
    </div>

    <!-- Example DataTables Card-->
    <div class="container-fluid">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Users</div>
        <div class="card-body">
          <div class="table-responsive">
             <!-- ADD USER BUTTON -->
             <div class="container">
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Add New User
                </button></br></br>

                <!-- The Modal -->
                <div class="modal fade" id="myModal">
                  <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Add New User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->

                        <div class"row">
                          <div class="modal-body">
                            <form method="post" action="addNewUser_redirect.php"> <!-- class="modal-content" -->
                              <div class="col-md-12 col-md-offset-12">
                              <label><b>Level of Acess</b></label></br>
                              <label class="radio-inline"><input type="radio" name="levelOfAccess" value="Staff" checked>Staff</label> &nbsp; &nbsp;
                              <label class="radio-inline"><input type="radio" name="levelOfAccess" value="Manager">Manager</label></br>
                              <label><b>First Name</b></label>
                              <input type="text" name="firstName" style="width: 100%;" required>
                              <label><b>Middle Name</b></label>
                              <input type="text" name="middleName" style="width: 100%;">
                              <label><b>Last Name</b></label>
                              <input type="text" name="lastName" style="width: 100%;" required>
                              <label><b>Email Address</b></label>
                              <input type="text" name="email" style="width: 100%;" required>
                              <label><b>Username</b></label>
                              <input type="text" name="username" style="width: 100%;" required>
                              <label><b>Password</b></label>
                              <input type="password" name="password" style="width: 100%;" required></br></br>
                              <button type="submit" class="btn btn-success">Add User</button>
                            </div>
                            </form>
                          </div>
                        </div> <!-- row -->
                      </div>
                    </div>
                  </div> <!-- myModal -->
                </div> <!-- container -->

              </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th></th>
                  <th>User ID</th>
                  <th>Level of Access</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $con = mysqli_connect("localhost", "root", "", "blueoasis") or die("Connection Error");
                  $query = mysqli_query($con, "SELECT * FROM tbl_user");
                  while ($tblResult = mysqli_fetch_array($query)) {
                    $userId = $tblResult["id"];
                    $levelOfAccess = $tblResult["levelOfAccess"];
                    $firstName = $tblResult["firstName"];
                    $middleName = $tblResult["middleName"];
                    $lastName = $tblResult["lastName"];
                    $email = $tblResult["email"];
                    $username = $tblResult["username"];
                    $status = $tblResult["status"];

                    echo '
                    <tr>
                      <td>
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-primary btn-sm btn_update" data-toggle="modal" data-target="#update" data-rId="'. $userId .'">
                          Update
                        </button>
                      </td>
                      <td>' . $userId . '</td>
                      <td>' . $levelOfAccess . '</td>
                      <td>' . $firstName . '</td>
                      <td>' . $middleName . '</td>
                      <td>' . $lastName . '</td>
                      <td>' . $email . '</td>
                      <td>' . $username . '</td>
                      <td>' . $status . '</td>
                    </tr>';
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
            <form action="user_update.php" method="post">
              <div class="row" style="margin-left: 10%;">
                <div class="col-md-5">
                  <label>User ID</label>
                </div>
                <div class="col-md-3">
                  <input type="text" name="userId" style="background-color:#C0C0C0;" readonly>
                </div>
              </div><br>
              <div class="row" style="margin-left: 10%;">
                <div class="col-md-5">
                  <label>Level of Access</label>
                </div>
                <div class="col-md-5">
                  <input type="text" name="levelOfAccess">
                </div>
              </div><br>
              <div class="row" style="margin-left: 10%;">
                <div class="col-md-5">
                  <label>First Name</label>
                </div>
                <div class="col-md-3">
                  <input type="text" name="firstName" >
                </div>
              </div><br>
              <div class="row" style="margin-left: 10%;">
                <div class="col-md-5">
                  <label>Middle Name</label>
                </div>
                <div class="col-md-3">
                  <input type="text" name="middleName">
                </div>
              </div><br>
              <div class="row" style="margin-left: 10%;">
                <div class="col-md-5">
                  <label>Last Name</label>
                </div>
                <div class="col-md-3">
                  <input type="text" name="lastName">
                </div>
              </div><br>
              <div class="row" style="margin-left: 10%;">
                <div class="col-md-5">
                  <label>Email</label>
                </div>
                <div class="col-md-3">
                  <input type="text" name="email">
                </div>
              </div></br>
              <div class="row" style="margin-left: 10%;">
                <div class="col-md-5">
                  <label>Username</label>
                </div>
                <div class="col-md-3">
                  <input type="text" name="username">
                </div>
              </div></br>
              <div class="row" style="margin-left: 10%;">
                <div class="col-md-5">
                  <label>Password</label>
                </div>
                <div class="col-md-3">
                  <input type="password" name="password" style="background-color:#C0C0C0;" readonly>
                </div>
              </div></br>
              <div class="row" style="margin-left: 10%;">
                <div class="col-md-5">
                  <label>Token</label>
                </div>
                <div class="col-md-3">
                  <input type="password" name="token" style="background-color:#C0C0C0;" readonly>
                </div>
              </div></br>
              <div class="row" style="margin-left: 10%;">
                <div class="col-md-5">
                  <label>Status</label>
                </div>
                <div class="col-md-3">
                  <input type="text" name="status">
                </div>
              </div></br>
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
  </div> <!-- container -->

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

  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>

<!--
  <script type="text/javascript">
    $('#dataTable').DataTable( {
        dom: 'Blfrtip',
        buttons: [
         'excel', 'pdf', 'print'
        ]
    } );
  </script>
-->

<script type="text/javascript">
    $('#dataTable').DataTable( {
      dom: 'Blfrtip',
      buttons: [
      {
        extend: 'excel',
        exportOptions: {
          columns: [1,2,3,4,5,6]
        }
      },
      {
        extend: 'pdf',
        exportOptions: {
          columns: [1,2,3,4,5,6]
        }
      },
      {
        extend: 'print',
        exportOptions: {
          columns: [1,2,3,4,5,6]
        }
      }

       ]
    } );
  </script>

  <!--ajax -->
  <script type="text/javascript">
    $(function(){
      $(document).on('click', '.btn_update', function(){
        var userId = $(this).attr('data-rId');
        $.ajax({
          url : "get_user.php?update=true&rid=" + userId,
          type : "get",
          dataType : 'json',
          success : function(data){
            console.log(data);
            $("input[name='userId']").val(data.id);
            $("input[name='levelOfAccess']").val(data.levelOfAccess);
            $("input[name='firstName']").val(data.firstName);
            $("input[name='middleName']").val(data.middleName);
            $("input[name='lastName']").val(data.lastName);
            $("input[name='email']").val(data.email);
            $("input[name='username']").val(data.username);
            $("input[name='password']").val(data.password);
            $("input[name='token']").val(data.token);
            $("input[name='status']").val(data.status);

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
