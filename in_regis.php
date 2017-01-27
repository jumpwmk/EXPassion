<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ARIN Grader - Just a Grader..</title>
     <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="box">

<?php
include "connect.php";
$username = $_POST['username'];
$password = $_POST['password'];
	if($username !="" and $password != "")
	{

		$check = "SELECT * FROM members";
		$cQuery = $success->query($check) or die("Error check query [".$check."]");
		$c=0;
		while($cResult = mysqli_fetch_array($cQuery))
			{
				if($cResult['username']==$username)
				{
					$c=1;
					break;
				}
			}
		if($c==0)
			{
				$query = "INSERT INTO members (username,password) VALUES ('$username','$password')";
				$success->query($query) or die("Error [".$query."]");
			}
		else{
			echo "
		<script>
		alert('Error, contract administrator 주소요!!!');
		window.location.replace('index.php');
		</script>
		";
		}
	}
	else{
		echo "
		<script>
		alert('Error, contract administrator 주소요!!!');
		window.location.replace('index.php');
		</script>
		";
	}
?>
</div>
</div>
</div>
</body>
</html>
