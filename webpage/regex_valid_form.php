<?php
	$pattern="";
	$text="";
	$replaceText="";
	$replacedText="";
	$quick="quick";
	$patternformail='/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/';
	$phone_number='+998-91-973-0888';
	$test="Twinkle, twinkle, little (star),  
		   How I wonder what you are.             
		   Up above the world so high,            
		   Like a diamond in the sky."; 

	$match="Not checked yet.";
	$quickText="not cheched yet.";
	$checkmail=0;
	$checkphone=0;
	$remove_space="";
	$money="";
	$multispaces="";
	$extracttext="";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$pattern=$_POST["pattern"];
	$text=$_POST["text"];
	$replaceText=$_POST["replaceText"];

	$replacedText=preg_replace($pattern, $replaceText, $text);

	$remove_space=preg_replace('/[ ]/', "", $text);

	$checkmail=preg_match($patternformail, $remove_space);

	$checkphone=preg_match('/^\+[0-9]{3}-[0-9]{2}-[0-9]{3}-[0-9]{4}$/', $phone_number);

	$money=preg_replace('/[^0-9\.\,]/', "", $text);

	$multispaces=preg_replace('/\s+/', "", $test);

	$extracttext=preg_replace('/\(|\)/', "", $test);

	if(preg_match($pattern, $text)) {
		$match="Match!";
	} else {
		$match="Does not match!";
	}

	if (strpos($text, $quick)) {
		$quickText="quick exist";
	}
	else{
		$quickText="quick not exist";
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Valid Form</title>
</head>
<body>
	<form action="regex_valid_form.php" method="post">
		<dl>
			<dt>Pattern</dt>
			<dd><input type="text" name="pattern" value="<?= $pattern ?>"></dd>

			<dt>Text</dt>
			<dd><input type="text" name="text" value="<?= $text ?>"></dd>

			<dt>Replace Text</dt>
			<dd><input type="text" name="replaceText" value="<?= $replaceText ?>"></dd>

			<dt>Output Text</dt>
			<dd><?=	$match ?></dd>

			<dt>Word Checker</dt>
			<dd><?=	$quickText ?></dd>

			<dt>Email Checker</dt>
			<dd><?=	$checkmail ?></dd>

			<dt>Phone validation</dt>
			<dd><?=	$checkphone ?></dd>

			<dt>New line deleted</dt>
			<dd><?=	$test ?></dd>

			<dt>Delete scopes</dt>
			<dd><?=	$extracttext ?></dd>

			<dt>Replaced Text</dt>
			<dd> <code><?=	$replacedText ?></code></dd>

			<dt>Space deleter</dt>
			<dd> <code><?=	$remove_space ?></code></dd>

			<dt>Number</dt>
			<dd> <code><?=	$money ?></code></dd>

			<dt>&nbsp;</dt>
			<dd><input type="submit" value="Check"></dd>
		</dl>

	</form>
</body>
</html>
