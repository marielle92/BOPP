<?php
	session_start();
  
  require 'connection.php';

?>
<html>
<head>
	<title>Redirect</title>
</head>
	<body>
		<?php
			
      $paymentId = $_POST["paymentId"];
      $fullName = $_POST["fullName"];
      $addressCountry = $_POST["addressCountry"];
      $addressCity = $_POST["addressCity"];
      $addressOthers = $_POST["addressOthers"];
      $totalAmount = $_POST["totalAmount"];
      $remainingBalance = $_POST["remainingBalance"];
      $fullPaidOn = $_POST["fullPaidOn"];
      $paymentStatus = $_POST["paymentStatus"];

      if(empty($fullPaidOn)) {
        $fullPaidOn = 'NULL';
      }
			 
        $paymentSql = "UPDATE tbl_payment SET fullName='$fullName', addressCountry='$addressCountry', addressCity='$addressCity', addressOthers='$addressOthers', totalAmount='$totalAmount', remainingBalance='$remainingBalance', fullPaidOn=" . $fullPaidOn . ", paymentStatus='$paymentStatus' WHERE id = '$paymentId'";
        if($cn->query($paymentSql) === TRUE) {
        	//header ('Location: paypal.php');
          echo '<script> alert("Row updated");  window.location.href="admin_payments.php"; </script>';
        }
        else {
          echo '<script> alert("Update failed");  window.location.href="admin_payments.php"; </script>';
        }
	?>
	</body>
</html>