<script>
    function clickLeader(){
  	var KUYALL = 	'<?php $sql = "SELECT id, username ,password FROM members";
					$result = mysqli_query($success,$sql);
					while($row = mysqli_fetch_assoc($result))
					{
						echo $row["id"]." ".$row["username"]." ".$row["password"]."<br>";
					} ?>';
  	document.getElementById("leaderBoard").innerHTML = KUYALL;
	}

	function randomC(){
		var randomColor = Math.floor(Math.random()*16777215).toString(16);
		document.write("randomColor");
	}

</script>
