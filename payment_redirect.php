<?php
	require 'connection.php';

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
      $newName = $_POST["newName"];
      $newPrice = $_POST["newPrice"];
      $newDescription = $_POST["newDescription"];
      $photo = (string) basename( $_FILES['photo']['name']);

      $uploadAmenitiesSql = "INSERT INTO tbl_ratesandamenities (imageName, amenityName, description, price) VALUES ('$photo', '$newName', '$newDescription', '$newPrice')";
      if ($cn->query($uploadAmenitiesSql) === TRUE) {
        echo '<script> alert("Amenity added."); window.location.href="admin_content_amenities.php"; </script>';
      }
      else {
        $msg = $cn->error;
        echo '<script> alert("ERROR' . $msg . '"); window.location.href="admin_content_amenities.php"; </script> ';
      }
    }
    else{
      echo '<script> alert("Error upload. Maximun size exceded."); window.location.href="admin_content_amenities.php"; </script>';
    }
  }
?>