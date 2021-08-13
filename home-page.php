<?php 
 include "config.php";
	session_start();
	$userId = isset($_SESSION['uid']) ? $_SESSION['uid'] : ""; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include 'tittle.php';?>
</head>
<body>

	<h1><?php include 'top-heading.php';?></h1>

	<span><p><a href="view-profile.php">Click here</a> to view your profile</p></span>
	
	<button onclick="location.href='shop-products.php'">Shop Products</button>
	<br><br>
	<span><p style="color:green;text-align:center;background: mediumvioletred;">Click here to <a href="notice.php">View notice</a></p></span>
	<?php 
	 include 'logout-include.php' ?>
	 <?php 
	 include 'footer.php' ?>
	
	

</body>
</html>