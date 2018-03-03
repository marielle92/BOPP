<?php
  session_start();

  require 'connection.php';

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

  if($_FILES['uploadedfile']['error'] == UPLOAD_ERR_NO_FILE) {
    $rating = $_POST["rating"];
    $review = (string)$_POST["review"];
    
    $feedbackSql = "INSERT INTO tbl_feedback (rating, review, image, mgr_evaluation, user_id, reservation_id) VALUES ('$rating', '$review', NULL, 'Pending', '$id', '$reservationId')";
    if($cn->query($feedbackSql) === TRUE) {
      echo '<script> alert("Feedback submitted."); window.location.href="user_feedback.php"; </script>';
    }
    else {
      $msg = $cn->error;
      echo '<script> alert("ERROR' . $msg .'"); window.location.href="user_feedback.php"; </script> ';
    }  
  }
  else {
    // Where the file is going to be placed
    //http://localhost/BOPP3/images/
    /* Add the original filename to our target path.  
    Result is "uploads/filename.extension" */
    $target_path = "uploads/" . basename($_FILES['uploadedfile']['name']);

    if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
      $rating = $_POST["rating"];
      $review = (string) $_POST["review"];
      $image = (string) basename( $_FILES['uploadedfile']['name']);
        
      $feedbackSql = "INSERT INTO tbl_feedback (rating, review, image, mgr_evaluation, user_id, reservation_id) VALUES ('$rating', '$review', '$image', 'Pending', '$id', '$reservationId')";
      if ($cn->query($feedbackSql) === TRUE) {
        echo '<script> alert("Feedback submitted."); window.location.href="user_feedback.php"; </script>';
      }
      else {
        $msg = $cn->error;
        echo '<script> alert("ERROR' . $msg . '"); window.location.href="user_feedback.php"; </script> ';
      }  
    }
    else{
      echo '<script> alert("Error upload. Maximun size exceded."); window.location.href="user_feedback.php"; </script>';
    }
  }


// Where the file is going to be placed
//http://localhost/BOPP3/images/
// $target_path = "uploads/";

/* Add the original filename to our target path.  
Result is "uploads/filename.extension" */
// $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);


// if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
//     $rating = $_POST["rating"];
// 		$review = (string)$_POST["review"];
//     $image = (string)basename( $_FILES['uploadedfile']['name']);
    
//     $feedbackSql = "INSERT INTO tbl_feedback (rating, review, image, mgr_evaluation, user_id, reservation_id) VALUES ('$rating', '$review', '$image', 'Pending', '$id', '$reservationId')";
// 		if ($cn->query($feedbackSql) === TRUE) {
//           echo '<script> alert("Feedback submitted."); window.location.href="user_feedback.php"; </script>';

//         }
//       else {
//         	$msg = $cn->error;
//           echo '<script> alert("ERROR": ' . $msg .'); window.location.href="user_feedback.php"; </script> ';
//         }	
// }
//  else{
//     echo '<script> alert("ERROR": File upload); window.location.href="user_feedback.php"; </script>';
// }

?>