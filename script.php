<script type="text/javascript">
    function clickLeader(){
  	var KUYALL = 	'<?php $sql = "SELECT id, username ,password FROM members";
					$result = mysqli_query($success,$sql);
					while($row = mysqli_fetch_assoc($result))
					{
						echo $row["id"]." ".$row["username"]." ".$row["password"]."<br>";
					} ?>';
  	document.getElementById("leaderBoard").innerHTML = KUYALL;
}
</script>
