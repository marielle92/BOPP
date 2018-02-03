<?php
	session_start();
?>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	
		$_SESSION["referenceNumber"] = $_POST["referenceNumber"];
		$_SESSION["firstName"] = $_POST["firstName"];
		$_SESSION["middleName"] = $_POST["middleName"];
		$_SESSION["lastName"] = $_POST["lastName"];
		$_SESSION["birthday"] = $_POST["birthday"];
		$_SESSION["add_country"] = $_POST["add_country"];
		$_SESSION["add_city"] = $_POST["add_city"];
		$_SESSION["add_others"] = $_POST["add_others"];
		$_SESSION["contactNumber"] = $_POST["contactNumber"];

		echo $_SESSION["firstName"];

		

	?>
</body>
</html>