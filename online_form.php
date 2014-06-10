<?php
$connect = mysql_connect("localhost","root","");
if(!$connect) die ("connection not established".mysql_error());

mysql_select_db("forms",$connect);


function testinput($data)
{
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = trim($data);
	return $data; 
}


if($_SERVER['REQUEST METHOD'] == "POST")
{
$firstname   = testinput($_POST['$firstname']);
$lastname    = testinput($_POST['$lastname']);
$currentyear = testinput($_POST['$currentyear']);
$email       = testinput($_POST['$email']);
$contact     = testinput($_POST['tel']);
$yearsjoined = testinput($_POST['$yearsjoined']);
$fees        = testinput($_POST['$fees']);
}

$_SESSION['firstname'] = $firstname;
$_SESSION['lasttname'] = $lasttname;
$name = $_SESSION['firstname'] . "" . $_SESSION['firstname'];

if(!is_numeric($contact)) {header("location: fill_form.html?error=1");exit;}

//Update database

	$query = "INSERT INTO form(name,currentyear,email,contact,yearsjoined,fees)
		VALUES('$name','$currentyear','$email','$contact','$yearsjoined','$fees');";
	$sql = mysql_query($query);

	if(!$sql)
		{
			echo mysql_error();
			exit;
		}
	mysql_close($connect);
	header("location : index.html");
	exit;

	else
	{
		echo "Your response has been recorded";
		header("location : index.html");
	}

?>