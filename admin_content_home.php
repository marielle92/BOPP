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
  <title>Home Content</title>

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
        <li class="nav-item"><a class="nav-link" href="admin_notifications.php">Notifications</a></li>
        <li class="nav-item"><a class="nav-link" href="admin_reservations.php">Records</a></li>
        <li class="nav-item"><a class="nav-link" href="admin_amenities.php">Inventory</a></li>
        <li class="nav-item active"><a class="nav-link" href="#">Content<span class="sr-only">(current)</span></a></li>
        <li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
      </ul>
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Home</span>
          </a>
        </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="admin_content_gallery.php">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">Gallery</span>
            </a>
          </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="admin_content_amenities.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Rates And Amenities</span>
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
        <li class="breadcrumb-item active">Home Content</li>
      </ol>
    </div>

    <!-- ADD NEW PHOTO BUTTON -->
     <div class="container">
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
          Add Photo
        </button></br></br>

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Add Photo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->

                <div class"row">
                  <div class="modal-body">
                    <form method="post" action="home_uploader.php" enctype="multipart/form-data"> <!-- class="modal-content" -->
                      <div class="col-md-12 col-md-offset-12">
                        <label><b>Choose photo</b></label><br>
                        <input name="photo" type="file" accept="image/jpeg, image/png, image/jpg" required/><br><br>
                        <label><b>Description</b></label><br>
                        <textarea class="form-control" rows="6" name="newDescription" style="font-size: 12px; width: 100%;"></textarea><br>
                        <button type="submit" class="btn btn-success">Add</button>
                      </div>
                    </form>
                  </div>
                </div> <!-- row -->
              </div>
            </div>
          </div> <!-- myModal -->
        </div> <!-- container -->

    <!-- BODY -->
    <div class="container">
      <table class="table table-condensed" id="dataTable" cellspacing="0">
        <tbody>
        <?php
          require 'connection.php';
            $homeQuery = mysqli_query($cn, "SELECT * FROM tbl_home");
            while ($homeResult = mysqli_fetch_array($homeQuery)) {
              $homeId = $homeResult["id"];
              $homeImageName = $homeResult["imageName"];
              $homeImageDescription = $homeResult["imageDescription"];

              echo '
                <tr class="row">
                  <td class="col-md-6">
                    <img src="content/home/' . $homeImageName .'" class="img-fluid">

                  </td>
                  <td class="col-md-5">
                    <form method="post" action="home_update.php">
                      <input type="hidden" value="' . $homeId . '" name="homeId" readonly />
                      <label>Description:</label><br/>
                      <textarea class="form-control" rows="6" name="homeImageDescription" style="font-size: 12px; width: 100%;">' . $homeImageDescription . '</textarea><br>
                      <button type="submit" class="btn btn-primary">Update</button>
                    </form><br>
                    <form method="post" action="home_delete.php">
                      <input value="' . $homeId . '" name="homeId" type="hidden" />
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
              ';
            }
          ?>
        </tbody>
      </table>
    </div>

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
