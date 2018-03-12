<?php
  require 'connection.php';
	if($_GET['update'] == true && $_GET['rid']){
    $rid = $_GET['rid'];
    $sql = "SELECT * FROM tbl_user where id = " . $rid;
  	$result = $cn->query($sql);
  	$row = $result->fetch_assoc();
  	echo json_encode($row);
  }
?>