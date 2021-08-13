<?php 
	require 'DbInsert.php';

	$fullName = $username = $password = $birthDate = $gender = $email = $mobileNo = $presentAddress  =$permanentAddress ="";
	$isValid = true;
	$fullNameErr = $userNameErr = $passwordErr = $birthDateErr =$genderErr =$emailErr = $mobileNoErr =$addressErr ="";
	$successfulMessage = $errorMessage = "";
	if($_SERVER['REQUEST_METHOD'] === "POST") {
		$fullName = $_POST['fullname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$birthDate= $_POST['birthDate'];
		$gender   = $_POST['gender'];
		$email    = $_POST['email'];
		$mobileNo = $_POST['mobileNo'];
		$presentAddress  = $_POST['presentAddress'];
		$permanentAddress  = $_POST['permanentAddress'];
		
		if(empty($fullName)) {
			$fullNameErr = "Full name can not be empty!";
			$isValid = false;
		}
		if(empty($username)) {
			$userNameErr = "User name can not be empty!";
			$isValid = false;
		}
		if(empty($password)) {
			$passwordErr = "Password can not be empty!";
			$isValid = false;
		}
		if(empty($birthDate)) {
			$birthDateErr = "Date Of Birth can not be empty!";
			$isValid = false;
		}
		if(empty($gender)) {
			$genderErr = "Gneder can not be empty!";
			$isValid = false;
		}
		if(empty($email)) {
			$emailErr = "Email can not be empty!";
			$isValid = false;
		} 
		if(empty($mobileNo)) {
			$mobileNoErr = "Mobiel No can not be empty!";
			$isValid = false;
		}
		if(empty($presentAddress)) {
			$addressErr = "Address can not be empty!";
			$isValid = false;
		}
		if(empty($permanentAddress)) {
			$addressErr = "Address can not be empty!";
			$isValid = false;
		}


		if($isValid) {
			if(strlen($username)>10){
				$userNameErr = "User name can not be empty!";
			$isValid = false;
			}
			if(strlen($password)>8){
				$passwordErr = "Password can not be empty!";
			$isValid = false;
			}
			if($isValid){
			$fullName = test_input($fullName);
			$username = test_input($username);
			$password = test_input($password);
			$birthDate = test_input($birthDate);
			$gender = test_input($gender);
			$email = test_input($email);
			$mobileNo = test_input($mobileNo);
			$presentAddress = test_input($presentAddress);
			$permanentAddress = test_input($permanentAddress);



			$resposne =register($username,$password,$fullName,$gender,$birthDate,$presentAddress,$permanentAddress,$mobileNo,$email);
			
		
			if($response) {
				$successfulMessage = "Successfully saved.";
			}
			else {
				$errorMessage = "Error while saving.";
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
	<title>Registration</title>
</head>
<body>

	<h1>Registration Form</h1>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<fieldset>
			<legend>Registration Form:</legend>

			<label for="fullname">Full Name:</label>
			<input type="text" name="fullname" id="fullname" value="<?php echo $fullName;?>">
			<span style="color:red"><?php echo $fullNameErr; ?></span>

			<br><br>

			<label for="username">Username:</label>
			<input type="text" name="username" id="username" value="<?php echo $username;?>">
			<span style="color:red"><?php echo $userNameErr; ?></span>

			<br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<span style="color:red"><?php echo $passwordErr; ?></span>

			<br><br>
			<label for="birthDate">Date Of Birth:</label>
			<input type="date" name="birthDate" id="birthDate" value="<?php echo $birthDate;?>">
			<span style="color:red"><?php echo $birthDateErr; ?></span>
			<br><br>
			<label>Gender:</label>
			<input type ="radio" id="gender" name="gender" value="male">
		    <label for="male">Male</label>
		
		    <input type ="radio" id="gneder" name="gender" value="female">
		    <label for="female">Female</label>
		
		    <input type ="radio" id="gender" name="gender" value="other">
		    <label for="other">Other</label>
		    <span style="color:red"><?php echo $genderErr; ?></span>

		    <br><br>
		    <label for="email"> Email: </label>
		    <input type="email" id="email" name="email" value="<?php echo $email;?>">
		    <span style="color:red"><?php echo $emailErr; ?></span>

		    <br><br>
		    <label for="mobileNo"> Mobile No : </label>
		    <input type="tel" id="mobileNo" name="mobileNo" value="<?php echo $mobileNo;?>">
		    <span style="color:red"><?php echo $mobileNoErr; ?></span>

		    <br><br> 
		    <label for="presentAddress"> Present Address: </label>
		    <input type="text" id="presentAddress" name="presentAddress" value="<?php echo $presentAddress;?>">
		    <span style="color:red"><?php echo $addressErr; ?></span>

		    <br><br>
		    <label for="permanentAddress"> PermanentAddress: </label>
		    <input type="text" id="permanentAddress" name="permanentAddress">
		    <span style="color:red"><?php echo $addressErr; ?></span>

		    <br><br>





			<input type="submit" name="submit" value="Register">
		</fieldset>
	</form>

	<p style="color:green;"><?php echo $successfulMessage; ?></p>
	<p style="color:red;"><?php echo $errorMessage; ?></p>

	<br>

	<p>Back to<a href="login-form.php">Login</a></p>
	

</body>
</html>