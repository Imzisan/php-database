<?php 
	
	 require 'DbConnect.php';	
    require 'DbInsert.php';
	include "config.php";
	// define("filepath", "user.json");
	$fullName = $userName = $password = $birthDate = $gender = $email = $mobileNo = $address  ="";
	$isValid = true;
	$fullNameErr = $userNameErr = $passwordErr = $birthDateErr =$genderErr =$emailErr = $mobileNoErr =$addressErr ="";
	$successfulMessage = $errorMessage = "";
	if($_SERVER['REQUEST_METHOD'] === "POST") {
		$fullName = $_POST['fullname'];
		$userName = $_POST['username'];
		$password = $_POST['password'];
		$birthDate= $_POST['birthDate'];
		$gender   = $_POST['gender'];
		$email    = $_POST['email'];
		$mobileNo = $_POST['mobileNo'];
		$address  = $_POST['address'];

		if(empty($fullName)) {
			$fullNameErr = "Full name can not be empty!";
			$isValid = false;
		}
		if(empty($userName)) {
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
		if(empty($address)) {
			$addressErr = "Address can not be empty!";
			$isValid = false;
		}

		
			if($isValid){
			$fullName = test_input($fullName);
			$userName = test_input($userName);
			$password = test_input($password);
			$birthDate = test_input($birthDate);
			$gender = test_input($gender);
			$email = test_input($email);
			$mobileNo = test_input($mobileNo);
			$address = test_input($address);
			
			$fileData = register($userName,$password,$fullName,$gender,$birthDate,$address,$mobileNo,$email);
			
			
		
			if($fileData) {
				$successfulMessage = "Successfully saved.";
			}
			else {
				$errorMessage = "Error while saving.";
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


	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST"  >
		<fieldset>
			<legend>Registration Form:</legend>

			<label for="fullname">Full Name:</label>
			<input type="text" name="fullname" id="fullname">
			<span style="color:red" id="fullNameErr"><?php echo $fullNameErr; ?></span>

			<br><br>

			<label for="username">Username:</label>
			<input type="text" name="username" id="username" value="<?php echo $userName; ?>">
			<span style="color:red"id="userNameErr"><?php echo $userNameErr; ?></span>

			<br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<span style="color:red" id="passwordErr"><?php echo $passwordErr; ?></span>

			<br><br>
			<label for="birthDate">Date Of Birth:</label>
			<input type="date" name="birthDate" id="birthDate">
			<span style="color:red" id="birthDateErr"><?php echo $birthDateErr; ?></span>
			<br><br>
			<label>Gender:</label>
			<input type ="radio" id="gender" name="gender" value="male">
		    <label for="male">Male</label>
		
		    <input type ="radio" id="gneder" name="gender" value="female">
		    <label for="female">Female</label>
		
		    <input type ="radio" id="gender" name="gender" value="other">
		    <label for="other">Other</label>
		    <span style="color:red" id="genderErr"><?php echo $genderErr; ?></span>

		    <br><br>
		    <label for="email"> Email: </label>
		    <input type="email" id="email" name="email">
		    <span style="color:red" id="emailErr"><?php echo $emailErr; ?></span>

		    <br><br>
		    <label for="mobileNo"> Mobile No : </label>
		    <input type="tel" id="mobileNo" name="mobileNo">
		    <span style="color:red" id="mobileNoErr"><?php echo $mobileNoErr; ?></span>

		    <br><br> 
		    <label for="address"> Address: </label>
		    <input type="text" id="address" name="address">
		    <span style="color:red" id="addressErr" ><?php echo $addressErr; ?></span>

		    <br><br>




			<input type="submit" name="submit" value="submit">
		</fieldset>
	</form>

	<p style="color:green;"><?php echo $successfulMessage; ?></p>
	<p style="color:red;" id="errorMessage"><?php echo $errorMessage; ?></p>

	<br>

	<p>Back to<a href="login-form.php">Login</a></p>
	 <?php 
	 include 'footer.php' ?>
	 
	 </h1>

	

</body>
</html>