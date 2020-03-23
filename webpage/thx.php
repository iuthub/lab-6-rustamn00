<?php 
	session_start();
	$name=isset($_SESSION["name"])?$_SESSION["name"]:"";
	$email=isset($_SESSION["email"])?$_SESSION["email"]:"";
	$username=isset($_SESSION["username"])?$_SESSION["username"]:"";
	$password=isset($_SESSION["password"])?$_SESSION["password"]:"";
	$passwordconf=isset($_SESSION["passwordconf"])?$_SESSION["passwordconf"]:"";
	$dateOfBirth=isset($_SESSION["dateOfBirth"])?$_SESSION["dateOfBirth"]:"";
	$gender=isset($_SESSION["gender"])?$_SESSION["gender"]:"";
	$maritalSt=isset($_SESSION["maritalSt"])?$_SESSION["maritalSt"]:"";
	$address=isset($_SESSION["address"])?$_SESSION["address"]:"";
	$city=isset($_SESSION["city"])?$_SESSION["city"]:"";
	$postalCode=isset($_SESSION["postalCode"])?$_SESSION["postalCode"]:"";
	$homePhone=isset($_SESSION["homePhone"])?$_SESSION["homePhone"]:"";
	$mobilePhone=isset($_SESSION["mobilePhone"])?$_SESSION["mobilePhone"]:"";
	$cardNum=isset($_SESSION["cardNum"])?$_SESSION["cardNum"]:"";
	$cardExpire=isset($_SESSION["cardExpire"])?$_SESSION["cardExpire"]:"";
	$monthSalary=isset($_SESSION["monthSalary"])?$_SESSION["monthSalary"]:"";
	$url=isset($_SESSION["url"])?$_SESSION["url"]:"";




	$namePattern = "/[a-zA-Z{2,}]/";
	$emailPattern="/^[a-zA-Z0-9.,_-]*@[a-zA-Z0-9]*\.[a-zA-Z0-9]*/";
	$usernamePattern = "/^.{5,}/";
	$passwordPattern = "/^.{8,}/";
	$dateOfBirthPattern="/^\d{2}\.\d{2}\.\d{4}/";
	$postalCodePattern="/\d{6}/";
	$homePhonePattern="/\d{9}/";
	$mobilePhonePattern="/\d{9}/";
	$cardNumPattern="/\d{16}/";
	$cardExpirePattern="/^\d{2}\.\d{2}\.\d{4}/";
	$monthSalaryPattern="/^UZS[\d{1,3}\,]*\.\d{2}/";
	$urlPattern="/^http:\/\/[a-z]*\.[a-z]*/";






	$isPost = $_SERVER["REQUEST_METHOD"] == "POST";
	$isValid = TRUE;

	if($isPost){
		$name = $_REQUEST["name"];
		$email = $_REQUEST["email"];
		$username = $_REQUEST["username"];
		$password = $_REQUEST["password"];
		$passwordconf=$_REQUEST["passwordconf"];
		$dateOfBirth=$_REQUEST["dateOfBirth"];
		$gender=$_REQUEST["gender"];
		$address=$_REQUEST["address"];
		$city=$_REQUEST["city"];
		$maritalSt=$_REQUEST["maritalSt"];
		$postalCode=$_REQUEST["postalCode"];
		$homePhone=$_REQUEST["homePhone"];
		$mobilePhone=$_REQUEST["mobilePhone"];
		$cardNum=$_REQUEST["cardNum"];
		$cardExpire=$_REQUEST["cardExpire"];
		$monthSalary=$_REQUEST["monthSalary"];
		$url=$_REQUEST["url"];


		$_SESSION["name"] =$name;
		$_SESSION["email"]=$email;
		$_SESSION["username"]=$username;
		$_SESSION["password"]=$password;
		$_SESSION["passwordconf"]=$passwordconf;
		$_SESSION["dateOfBirth"]=$dateOfBirth;
		$_SESSION["gender"]=$gender;
		$_SESSION["city"]=$city;
		$_SESSION["maritalSt"]=$maritalSt;
		$_SESSION["postalCode"]=$postalCode;
		$_SESSION["homePhone"]=$homePhone;
		$_SESSION["mobilePhone"]=$mobilePhone;
		$_SESSION["cardNum"]=$gender;
		$_SESSION["cardExpire"]=$cardExpire;
		$_SESSION["monthSalary"]=$monthSalary;
		$_SESSION["url"]=$url;

	}

 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<h1>Registration Form</h1>
		<form action="thx.php" method="post">
			<p>
				This form validates user input and then displays "Thank You" page.
			</p>
			
			<hr />
			
			<h2>Please, fill below fields correctly</h2>
			<dl>
				<dt>Name</dt>
				<dd>
					<input type="text" name="name" value="<?= $name ?>" />
					<?php 
						if($isPost && !preg_match($namePattern, $name)){
							$isValid = FALSE;
						
					 ?>
					 	<span>Please, provide proper name</span>
					 <?php } ?>
				</dd>



				<dt>Email</dt>
				<dd>
					<input type="text" name="email" value="<?= $email ?>" />
					<?php 
						if($isPost && !preg_match($emailPattern, $email)){
							$isValid = FALSE;
					 ?>
					 	<span>Please, provide proper email</span>
					 <?php } ?>
				</dd>



				<dt>Username</dt>
				<dd>
					<input type="text" name="username" value="<?= $username ?>">
					<?php 
						if($isPost && !preg_match($usernamePattern, $username)){
							$isValid=FALSE;
					?>
						<span>Pelase, provide a proper username (no less than 5 characters</span>
					<?php } ?>

				</dd>



				<dt>Password</dt>
				<dd>
					<input type="text" name="password" value="<?= $password ?>">
					<?php 
						if($isPost && !preg_match($passwordPattern, $password)){
							$isValid=FALSE;
					?>
						<span>Pelase, provide a proper password (no less than 8 characters)</span>
					<?php } ?>

				</dd>



				<dt>Confirm password</dt>
				<dd>
					<input type="text" name="passwordconf" value="<?= $passwordconf ?>">
					<?php 
						if($isPost && (strcmp($password, $passwordconf)!=0)){
							$isValid=FALSE;
					?>
						<span>You entered wrong password</span>
					<?php } ?>
				</dd>
				


				<dt>Date of birth</dt>
				<dd>
					<input type="text" name="dateOfBirth" value="<?= $dateOfBirth ?>">
					<?php 
						if($isPost && !preg_match($dateOfBirthPattern, $dateOfBirth)){
							$isValid=FALSE;
					 ?>
					 	<span>Please provide a proper form of Birth Date</span>
					 <?php } ?>
				</dd>



				<dt>Gender</dt>
				<dd>
					<input type="radio" name="gender" value="male" />Male
					<input type="radio" name="gender" value="female" />Female
				</dd>

				<dt>Marital Status</dt>
				<dd>
					<input type="radio" name="maritalSt" value="single" />Single
					<input type="radio" name="maritalSt" value="married" />Married
					<input type="radio" name="maritalSt" value="divorced" />Divorced
					<input type="radio" name="maritalSt" value="widowed" />Widowed
				</dd>


				
				<dt>Address</dt>
				<dd>
					<input type="text" name="address" value <?= $address?> />
					<?php 
						if($isPost && strlen($address) == 0){
							$isValid=FALSE;
					?>
						<span>Fill the address please</span>
					<?php } ?>
				</dd>



				<dt>City</dt>
				<dd>
					<input type="text" name="city" value="<?= $city ?>">
					<?php 
						if($isPost && strlen($city) == 0){
							$isValid=FALSE;
					 ?>
					 	<span>Please fill the city</span>
					 <?php } ?>
				</dd>



				<dt>Postal Code</dt>
				<dd>
					<input type="text" name="postalCode" value="<?= $postalCode ?>">
					<?php 
						if($isPost && !preg_match($postalCodePattern, $postalCode)){
							$isValid=FALSE;
					 ?>
					 	<span>Please provide a proper form of Postal Code</span>
					 <?php } ?>
				</dd>



				<dt>Home Phone</dt>
				<dd>
					<input type="text" name="homePhone" value="<?= $homePhone ?>">
					<?php 
						if($isPost && !preg_match($homePhonePattern, $homePhone)){
							$isValid=FALSE;
					 ?>
					 	<span>Please provide a proper form of Home Phone</span>
					 <?php } ?>
				</dd>



				<dt>Mobile Phone</dt>
				<dd>
					<input type="text" name="mobilePhone" value="<?= $mobilePhone ?>">
					<?php 
						if($isPost && !preg_match($mobilePhonePattern, $mobilePhone)){
							$isValid=FALSE;
					 ?>
					 	<span>Please provide a proper form of Mobile Phone</span>
					 <?php } ?>
				</dd>



				<dt>Credit Card Expire Date</dt>
				<dd>
					<input type="text" name="cardExpire" value="<?= $cardExpire ?>">
					<?php 
						if($isPost && !preg_match($cardExpirePattern, $cardExpire)){
							$isValid=FALSE;
					 ?>
					 	<span>Please provide a proper form of Credit Card Expire Date</span>
					 <?php } ?>
				</dd>



				<dt>Credit Card Number</dt>
				<dd>
					<input type="text" name="cardNum" value="<?= $cardNum ?>">
					<?php 
						if($isPost && !preg_match($cardNumPattern, $cardNum)){
							$isValid=FALSE;
					 ?>
					 	<span>Please provide a proper form of Credit Card Number</span>
					 <?php } ?>
				</dd>



				<dt>Monthly Salary</dt>
				<dd>
					<input type="text" name="monthSalary" value="<?= $monthSalary ?>">
					<?php 
						if($isPost && !preg_match($monthSalaryPattern, $monthSalary)){
							$isValid=FALSE;
					 ?>
					 	<span>Please provide a proper form of Monthly salary</span>
					 <?php } ?>
				</dd>



				<dt>Web Site URL</dt>
				<dd>
					<input type="text" name="url" value="<?= $url ?>">
					<?php 
						if($isPost && !preg_match($urlPattern, $url)){
							$isValid=FALSE;
					 ?>
					 	<span>Please provide a proper form of Web Site URL</span>
					 <?php } ?>
				</dd>




				
			</dl>
			
			<div>
				<input type="submit" name="submit" value="Register" />
				
			</div> 
	</form>
	</body>
</html>