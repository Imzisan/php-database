<?php 
 include "config.php";
	session_start();
	$userId = isset($_SESSION['uid']) ? $_SESSION['uid'] : ""; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
</head>
<body>

	<h1><?php include 'top-heading.php';?></h1>

	
	
	<br><br>
	<span><p style="color:green;text-align:center;background: mediumvioletred;">Click here to 
	<?php 
	 include 'logout-include.php' ?>
	
	

</body>
</html>