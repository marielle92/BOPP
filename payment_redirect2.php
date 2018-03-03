<?php
	session_start();

	require 'connection.php';

    $totalAmount = $_SESSION["totalAmount"];
    $dpAmount = $_SESSION["dpAmount"];
    $remainingBalance = $_SESSION["remainingBalance"];
    $reservationId = $_SESSION["reservationId"];

?>
<html>
<head>
	<title>Redirect</title>
</head>
	<body>
		<?php

		if($_FILES['photo']['error'] == UPLOAD_ERR_NO_FILE) {
    $msg = $cn->error;
    echo '<script> alert("ERROR' . $msg .'"); window.location.href="user_payment.php"; </script> ';
	  }
	  else {
    // Where the file is going to be placed
    //http://localhost/BOPP3/images/
    /* Add the original filename to our target path.
    Result is "uploads/filename.extension" */
    $target_path = "payments/" . basename($_FILES['photo']['name']);

    if(move_uploaded_file($_FILES['photo']['tmp_name'], $target_path)) {
      $photo = (string) basename( $_FILES['photo']['name']);
    }
    else{
      echo '<script> alert("Error upload. Maximun size exceded."); window.location.href="user_payment.php"; </script>';
    }
  }

			$fullName = $_POST["fullName"];
			$add_country = $_POST["add_country"];
			$add_city = $_POST["add_city"];
			$add_others = $_POST["add_others"];

			$sql = "INSERT INTO tbl_payment (fullName, addressCountry, addressCity, addressOthers, totalAmount, dpAmount, remainingBalance, depositSlip, paymentStatus, reservation_id) VALUES ('$fullName', '$add_country', '$add_city', '$add_others', '$totalAmount', '$dpAmount', '$remainingBalance', '$photo', 'Pending', '$reservationId')";
			if($cn->query($sql) === TRUE) {
        $paymentId = $cn->insert_id;
        $payIdSql = "UPDATE tbl_reservation SET payment_id='$paymentId' WHERE id = '$reservationId'";
        if($cn->query($payIdSql) === TRUE) {
        	//header ('Location: paypal.php');
        	$_SESSION["paymentId"] = $paymentId;
        	echo '<script> window.location.href="payment_success.php"; </script>';
        }
        else {
        	echo '<script> alert("Payment denied");  window.location.href="user_payment.php"; </script>';
        }
		  }
      else {
        echo '<script> alert("Non-existent in DB"); window.location.href="user_payment.php"; </script>';
      }
		?>
	</body>
</html>