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
		for($i = 0; $i < 7; $i++)
		{
			$sqll = "SELECT  * FROM members ORDER BY rating$i DESC LIMIT 10 ";
			$resultt = mysqli_query($success,$sqll);
			$countt = 0;
			while($roww = mysqli_fetch_assoc($resultt))
			{
				if($roww["username"]==$usernamee)
				{
					$_SESSION["upload"]=1;
					$countt++;
					break;
				}
				
			} 
			if($countt!=0)
				break;
		}
		header("location:index.php");
		exit();		
	}

	mysqli_close();
?>