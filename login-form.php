<?php 
	require 'DbConnect.php';
	require 'DbRead.php';
	include "config.php";
	$userName = $password = "";
	$isValid = true;
	$userNameErr = $passwordErr = $errorMessage= "";
	$uid = "";

	if(isset($_COOKIE['uid'])) {
		$uid = $_COOKIE['uid'];
	}

	if($_SERVER['REQUEST_METHOD'] === "POST") {
		$userName = $_POST['username'];
		$password = $_POST['password'];
		if(empty($userName)) {
			$userNameErr = "User name can not be empty!";
			$isValid = false;
		} 
 		if(empty($password)) {
			$passwordErr = "Password can not be empty!";
			$isValid = false;
		}
		if($isValid) {
			if(strlen($userName)>10)
			{
				$userNameErr="Username max size 10!";
				$isValid=false;

			}
			if(strlen($password)>8){
				$passwordErr="Password max size 8!";
				$isValid=false;
			}
			if($isValid){
			$userName=test_input($userName);
			$password=trim(htmlspecialchars($password));
			$user_data = login($userName,$password);
			// $found = false;
			

			if($user_data) {
				if(isset($_POST['rememberme'])) {
					setcookie("uid", $userName, time() + 60*60*24*30);
				}
				session_start();
				$_SESSION['username'] = $userName;

				header("Location: home-page.php");
			}
			else{
				$errorMessage ="Login failed...!";
			}
		 }
		}
	}
	function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
   
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include 'tittle.php';?>
	
</head>
<body>
	

	<h1 style="background-color:MediumSeaGreen;"><?php include 'top-heading.php';?>

	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" 
		name="loginForm" onsubmit="return isValid()">
		<fieldset>
			<legend>Login Form:</legend>

			<label for="username">Username:</label>
			<input type="text" name="username" id="username" value="<?php echo $userName; ?>">
			<span style="color:red"id="userNameErr"><?php echo $userNameErr; ?></span>

			<br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<span style="color:red" id="passwordErr"><?php echo $passwordErr; ?></span>

			<br><br>

			<input type="checkbox" name="rememberme" id="rememberme">
			<label for="rememberme">Remember Me:</label>

			<br><br>

			<input type="submit" name="submit" value="login">
		</fieldset>
	</form>

	<br>
	<p style="color: red;" id="errorMessage"><?php echo $errorMessage ?> </p>

	<p>New user? <a href="registration-form.php">Click here</a> for registration.</p>
	<?php 
	 include 'footer.php' ?>
	 </h1>

</body>
</html>