<?php
	require 'connection.php';

	if(isSet($_POST["galleryId"])) {
		$galleryId = $_POST["galleryId"];

		$deleteGallerySql = "DELETE FROM tbl_gallery WHERE id='$galleryId'";
		if ($cn->query($deleteGallerySql) === TRUE) {
			echo '<script> alert("Photo deleted.");  window.location.href="admin_content_gallery.php";</script>';
	  }
	  else {
	    $msg = $cn->error;
	    echo '<script> alert("ERROR' . $msg . '"); window.location.href="admin_content_gallery.php"; </script> ';
	  }
	}
?>