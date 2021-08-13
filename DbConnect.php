<?php
 function connect(){
 	$conn = new mysqli("localhost","zisan","123","wtk");

 	if($conn->connect_errno){
 		die("Database connection failed...".$conn->connect_errno);

 	}
 	return $conn ;

 }