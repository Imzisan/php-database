<?php 
require 'DbConnect.php';

function register($username,$password,$fullName,$gender,$birthDate,$presentAddress,$permanentAddress,$mobileNo,$email){
	$conn =connect();
	$sql =$conn->prepare("INSERT INTO USERS (username,password,fullName,gender,birthDate,presentAddress,permanentAddress,mobileNo,email) VALUES (?,?,?,?,?,?,?,?,?)");
	$sql->bind_param("sssssssss",$username,$password,$fullName,$gender,$birthDate,$presentAddress,$permanentAddress,$mobileNo,$email);
	return $sql->execute();
}