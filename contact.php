<?php
$connect = mysql_connect("localhost","root","");
if(!$connect) die("connection not established".mysql_error());
mysql_select_db("contact",$connect);

function testinput($text)
{

	$text = trim($text);
	$text = htmlspecialchars($text);
	$text = stripslashes($text);
	return $text;
}


if($_SERVER["REQUEST METHOD"]=="POST")
{
$name   = testinput($_POST["name"]);
$tel    = testinput($_POST["tel"]);
$email  = testinput($_POST["email"]);
$msg    = $_POST["msg"];
}

// update database

INSERT INTO contact(username,phone,email,message)
VALUES('$name','$tel','$email','$msg');


// mail function

mail("ashutosh11939@gmail.com",$subject,$msg,"From: $email\n");
?>