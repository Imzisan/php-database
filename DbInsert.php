<?php 

function register($userName,$password,$fullName,$gender,$birthDate,$address,$mobileNo,$email){
	$conn =connect();
	$sql =$conn->prepare("INSERT INTO USERS (userName,password,fullName,gender,birthDate,address,mobileNo,email) VALUES (?,?,?,?,?,?,?,?)");
	$sql->bind_param("ssssssis",$userName,$password,$fullName,$gender,$birthDate,
		$address,$mobileNo,$email);
	return $sql->execute();
}

?>