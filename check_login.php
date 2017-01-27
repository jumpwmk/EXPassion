<?php
	include "connect.php";
	$usernamee = $_POST['username'];
	$passwordd = $_POST['password'];
	$strSQL = "SELECT * FROM members WHERE username = '".$usernamee."' and password = '".$passwordd."'";
	$objQuery = mysqli_query($success,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	echo mysqli_error();
	if(!$objResult and $action == "")
	{
		$message = "wrong username or password";
		echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
	}
	else
	{
		$_SESSION["username"] = $usernamee;
		$_SESSION["id"] = $objResult["id"];
		header("location:index.php");
		exit();		
	}

	mysqli_close();
?>