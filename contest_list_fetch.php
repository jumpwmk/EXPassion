<script>
	

	function table(subject) {
		var str="dom-target-"+subject;
		var div = document.getElementById(str);
    	var myData = div.textContent;
    	myData = myData.replace(/_nn/g,'<td class=\"trname\">');
    	myData = myData.replace(/_tr/g,'<tr>');
    	myData = myData.replace(/_td/g,'<td>');
    	myData = myData.replace(/_dd/g,'<\/td>');
    	myData = myData.replace(/_rr/g,'<\/tr>');
    	document.getElementById("tbody").innerHTML =myData;
	}
</script>
<?php
	function table($subject){
		global $success;
		$str = "SELECT * FROM contest WHERE grouptask = $subject "; 
		$query = mysqli_query($success,$str);
		$_final = "";
		$countt =0;
		while($_result = mysqli_fetch_array($query))
		{
			$countt +=1;
			$_final = $_final."_tr _td".$countt.
			"_dd _nn".$_result['name'].
			"_dd _td".$_result['start'].
			"_dd _td".$_result['end'].
			"_dd _td".$_result['writer'].
			"_dd _rr";
		}
		echo $_final;
	}

?>