<?php
	session_start();

	$cn = mysqli_connect('localhost', 'root', '', 'blueoasis');
    if($cn->connect_errno > 0) {
      die('Unable to connect to database [' . $cn->connect_error . ']');
    }

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

			$fullName = $_POST["fullName"];
			$add_country = $_POST["add_country"];
			$add_city = $_POST["add_city"];
			$add_others = $_POST["add_others"];

			$sql = "INSERT INTO tbl_payment (fullName, addressCountry, addressCity, addressOthers, totalAmount, dpAmount, remainingBalance, paymentStatus, reservation_id) VALUES ('$fullName', '$add_country', '$add_city', '$add_others', '$totalAmount', '$dpAmount', '$remainingBalance', 'Pending', '$reservationId')";
			if($cn->query($sql) === TRUE) {
        $paymentId = $cn->insert_id;
        $payIdSql = "UPDATE tbl_reservation SET payment_id='$paymentId' WHERE id = '$reservationId'";
        if($cn->query($payIdSql) === TRUE) {
        	//header ('Location: paypal.php');
        	$_SESSION["paymentId"] = $paymentId;
        	echo '
		        <form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post">
		          <input type="hidden" name="cmd" value="_xclick">
		          <input type="hidden" name="business" value="mariellebanares@gmail.com">
		          <input type="hidden" name="currency_code" value="PHP">
		          <input type="hidden" name="item_name" value="Downpayment">
		          <input type="hidden" name="amount" value="1">
		          <input type="hidden" name="return" value="http://192.168.1.4:80/BOPP3/payment_success.php">
		          <input type="image" style="width:300px; height:75px; display:block; padding-top: 20%; margin-left:auto; margin-right:auto;" src="photos/paypalButton.png" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!">
		        </form>
		        ';
        }
        else {
        	echo '<script> alert("INSERT ERROR MESSAGE HERE");  window.location.href="user_payment.php"; </script>';
        }
		  }  
      else {
        echo '<script> alert("Non-existent in DB"); window.location.href="user_payment.php"; </script>';
      }
		?>
	</body>
</html>