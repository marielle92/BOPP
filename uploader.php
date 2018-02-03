<?php
  session_start();

  $cn = mysqli_connect('localhost', 'root', '', 'blueoasis');
    if($cn->connect_errno > 0) {
      die('Unable to connect to database [' . $cn->connect_error . ']');
    }

    $id = $_SESSION["id"];
    $sql = "SELECT * FROM tbl_reservation where user_id='$id'";
    $result = $cn->query($sql);
      if ($result->num_rows > 0) {
      		while($row = $result->fetch_assoc()) {
      			$reservationId = $row["id"];
      		}
        }
      else {
      	$reservationId = NULL;
        echo '<script> alert("Non-existent in DB"); window.location.href="index.php"; </script>';
        }

// Where the file is going to be placed
//http://localhost/BOPP3/images/
$target_path = "uploads/";

/* Add the original filename to our target path.  
Result is "uploads/filename.extension" */
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);


if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    $rating = $_POST["rating"];
		$review = (string)$_POST["review"];
    $image = (string)basename( $_FILES['uploadedfile']['name']);
    
    $feedbackSql = "INSERT INTO tbl_feedback (rating, review, image, mgr_evaluation, user_id, reservation_id) VALUES ('$rating', '$review', '$image', 'Pending', '$id', '$reservationId')";
		if ($cn->query($feedbackSql) === TRUE) {
          echo '<script> alert("Feedback submitted."); window.location.href="user_feedback.php"; </script>';

        }
      else {
        	$msg = $cn->error;
          echo '<script> alert("ERROR": ' . $msg .'); window.location.href="user_feedback.php"; </script> ';
        }	
}
 else{
    echo '<script> alert("ERROR": File upload); window.location.href="user_feedback.php"; </script>';
}

?>