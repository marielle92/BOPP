<?php
	require 'connection.php';

	if($_FILES['photo']['error'] == UPLOAD_ERR_NO_FILE) {
    $msg = $cn->error;
    echo '<script> alert("ERROR' . $msg .'"); window.location.href="admin_content_home.php"; </script> '; 
  }
  else {
    // Where the file is going to be placed
    //http://localhost/BOPP3/images/
    /* Add the original filename to our target path.  
    Result is "uploads/filename.extension" */
    $target_path = "content/home/" . basename($_FILES['photo']['name']);

    if(move_uploaded_file($_FILES['photo']['tmp_name'], $target_path)) {
      $newDescription = $_POST["newDescription"];
      $photo = (string) basename( $_FILES['photo']['name']);
        
      $uploadHomeSql = "INSERT INTO tbl_home (imageName, imageDescription) VALUES ('$photo', '$newDescription')";
      if ($cn->query($uploadHomeSql) === TRUE) {
        echo '<script> alert("Photo uploaded."); window.location.href="admin_content_home.php"; </script>';
      }
      else {
        $msg = $cn->error;
        echo '<script> alert("ERROR' . $msg . '"); window.location.href="admin_content_home.php"; </script> ';
      }  
    }
    else{
      echo '<script> alert("Error upload. Maximun size exceded."); window.location.href="admin_content_home.php"; </script>';
    }
  }
?>