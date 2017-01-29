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
			$idd = $row["username"];
			echo "<script> teap[$i][$count] = '$idd'; </script>";
			$count++;
		} 
	}
?>
<script>
    function clickLeader(subject)
    {
    	var SubjectName = ['Math','Physics','Chemistry','Biology','English','Social Study','Thai'];
    	document.getElementById("leaderSubject").innerHTML = SubjectName[subject];
	  	document.getElementById("leaderBoard0").innerHTML = "<marquee scrollamount='10'><img src=img/crown.png>"+teap[subject][0]+"<img src=img/crown.png><marquee>";
	  	document.getElementById("leaderBoard1").innerHTML = "<img src=img/monarchy.png>"+teap[subject][1]+"<img src=img/monarchy.png>";
	  	document.getElementById("leaderBoard2").innerHTML = "<img src=img/rook.png>"+teap[subject][2]+"<img src=img/rook.png>";
	}

</script>
