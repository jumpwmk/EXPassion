<script>
	var teap = [];
	for(var i = 0; i < 7; i++)
		teap[i] = [];
</script>

<?php
	for($i = 0; $i < 7; $i++)
	{
		$sql = "SELECT  * FROM members ORDER BY rating$i DESC LIMIT 3 ";
		$result = mysqli_query($success,$sql);
		$count = 0;
		while($row = mysqli_fetch_assoc($result))
		{
			$idd = $row["id"];
			echo "<script> teap[$i][$count] = $idd; </script>";
			$count++;
		} 
	}
?>
<script>
    function clickLeader(subject)
    {
	  	document.getElementById("leaderBoard0").innerHTML = teap[subject][0];
	  	document.getElementById("leaderBoard1").innerHTML = teap[subject][1];
	  	document.getElementById("leaderBoard2").innerHTML = teap[subject][2];
	}

</script>
