<?php
	session_start();

  $cn = mysqli_connect('localhost', 'root', '', 'blueoasis');
    if($cn->connect_errno > 0) {
      die('Unable to connect to database [' . $cn->connect_error . ']');
    }
?>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

	<title>Reservation trial</title>
	<!-- Bootstrap core CSS -->
  <link href="startbootstrap-modern-business-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="startbootstrap-modern-business-gh-pages/css/modern-business.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- google recaptcha -->
  <script src='https://www.google.com/recaptcha/api.js'></script>

  <!-- jqBootstrapValidation -->
  <script src="js/jqBootstrapValidation.js"></script>

</head>
<body>

  <!-- CALENDAR -->

	<!-- Page Content -->
    <div class="container">
      <form method="post" action="reservation_redirect_trial.php" novalidate>

            <div class="row">
              <div class="col-xs-1 col-md-1"></div>
              <div class="col-xs-4 col-md-4">
                <h3>Select Date and Time</h3>
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


  <!-- jqBootstrapValidation -->
  <script>
    $(function () { $("input,select,text").not("[type=submit]").jqBootstrapValidation(); } );
  </script>

	<!-- Bootstrap core JavaScript -->
  <script src="startbootstrap-modern-business-gh-pages/vendor/jquery/jquery.min.js"></script>
  <script src="startbootstrap-modern-business-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Contact form JavaScript -->
  <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
</body>
</html>