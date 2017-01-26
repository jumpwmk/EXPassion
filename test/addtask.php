<?php  
	include 'connect.php';
	$conn = new mysqli($servername, $username, $password);
	if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}

	if(mysqli_select_db($conn, "nschuakuay"))
		echo "yes\n";
	else echo "no\n";

	/* return name of current default database */
	if ($result = mysqli_query($conn, "SELECT DATABASE()")) {
	    $row = mysqli_fetch_row($result);
	    printf("Default database is %s.\n",$row[0]);
	    mysqli_free_result($result);
	}
	
	$prob = $_POST["Z"];
	$choiceA = $_POST["A"];
	$choiceB = $_POST["B"];
	$choiceC = $_POST["C"];
	$choiceD = $_POST["D"];
	$ansKey = $_POST["key"];



	$sql = "INSERT INTO task (task, choiceA, choiceB, choiceC, choiceD, checkAnswer)
	VALUES ('$prob', '$choiceA', '$choiceB', '$choiceC', '$choiceD', '$ansKey')";

	if (mysqli_query($conn, $sql) === TRUE) {
    echo "New record created successfully" . "<br>";
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

    $conn -> close();
}



?>