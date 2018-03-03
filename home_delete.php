<?php
	require 'connection.php';

	if(isSet($_POST["homeId"])) {
		$homeId = $_POST["homeId"];
		
		$deleteHomeSql = "DELETE FROM tbl_home WHERE id='$homeId'";
		if ($cn->query($deleteHomeSql) === TRUE) {
			echo '<script> alert("Photo deleted.");  window.location.href="admin_content_home.php";</script>';
	  }
	  else {
	    $msg = $cn->error;
	    echo '<script> alert("ERROR' . $msg . '"); window.location.href="admin_content_home.php"; </script> ';
	  }
	}
?>