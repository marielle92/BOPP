<?php
  $cn = mysqli_connect('localhost', 'root', '', 'blueoasis');
	if($_GET['update'] == true && $_GET['rid']){
    $rid = $_GET['rid'];
    $sql = "SELECT * FROM tbl_reservation where id = " . $rid;
  	$result = $cn->query($sql);
  	$row = $result->fetch_assoc();
  	echo json_encode($row);
  }
?>