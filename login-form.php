<?php 
	
	require 'DbRead.php'
	$userName = $password = "";
	$isValid = true;
	$userNameErr = $passwordErr = "";
	$uid = "";
	$error="Username or Password Incorrect";

	if(isset($_COOKIE['uid'])) {
		$uid = $_COOKIE['uid'];
	}

	if(isset($_POST['submit'])) {
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
			$found=false;
			$userName=test_input($userName);
			$password=trim(htmlspecialchars($password));
			$response=login($username,$password)
			if ($response){
				session_start();
			
			$_SESSION['username']=$username;
			header("Location: home.php")
		}
		else{
			$error="Username or Password Incorrect";
		}
		// 	$user_data = read();
		// 	$user_data = json_decode($user_data,true);
		// 	foreach ((object)$user_data as $temp) {
		// 		// code...
		// 		// 	if($userName === "IAMZ1SAN" && 
		// 		// $password === "123") {
		// 		// 	$found = true;
		// 			if($temp['username']=== $userName && $temp['password']===$password){
		// 				$found = true;
		// 			    break;

		// 	}else{
					 	
		// 			 	echo $error;
		// 			 }

			
		// 	}

		// 	if($found) {
		// 		if(isset($_POST['rememberme'])) {
		// 			setcookie("uid", $userName, time() + 60*60*24*30);
		// 		}
		// 		session_start();
		// 		$_SESSION['uid'] = $userName;

		// 		header("Location: home-page.php");
		// 	}
		// 			}
		// }
	

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
	<title>Login</title>
</head>
<body>

	<h1>Login Form</h1>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<fieldset>
			<legend>Login Form:</legend>

			<label for="username">Username:</label>
			<input type="text" name="username" id="username" value="<?php echo $uid; ?>">
			<span style="color:red"><?php echo $userNameErr; ?></span>

			<br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<span style="color:red"><?php echo $passwordErr; ?></span>

			<br><br>

			<input type="checkbox" name="rememberme" id="rememberme">
			<label for="rememberme">Remember Me:</label>

			<br><br>

			<input type="submit" name="submit" value="Login">
		</fieldset>
	</form>

	<br>

	<p>New user? <a href="registration-form.php">Click here</a> for registration.</p>
	 
</body>
</html>