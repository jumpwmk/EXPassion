<?php
	include "connect.php";

	$subject = 0;
	$contest = 0;
	$IDproblem = array();
	$user = array();
	$rating = array();
	$score = array();
	$countuser = 0;
	$alluser = array();
	$pass = array();
	$countProblem = 0;

    $strtask = mysqli_query($success, "SELECT * FROM task WHERE grouptask = $contest");
    if($strtask == FALSE) 
    { 
        die(mysqli_error()); // TODO: better error handling
    }
    while($task = mysqli_fetch_array($strtask))
    {
        $IDproblem[$countProblem] = $task['ID'];
        $countProblem++;
    }

	$struser = mysqli_query($success, "SELECT * FROM contest ORDER BY rating$subject");
    if($struser == FALSE) 
    { 
        echo "5555";
        die(mysqli_error()); // TODO: better error handling
    }
    while($result = mysqli_fetch_array($struser))
    {
        $user[$countuser] = $result['id'];
        $rating[$countuser] = $result['rating$subject'];
        $score[$countuser] = $result['score$contest'];
        $binaryTask = $task["task"];
        for($loop = 0; $loop < $countProblem; $loop++)
        {
            $alluser[$loop]++;
            if($binaryTask[$IDproblem[$loop]] == '1')
            	$pass[$loop]++;
        }
        $countuser++;
    }

    //update rating
  	for($i = 0; $i < $countuser; $i++)
  	{
  		for($j = $i + 1; $j < $countuser; $j++)
  		{
  			/// ยังไม่ได้คิด
  		}
  	}  

  	for($i = 0; $i < $countuser; $i++)
  	{
	  	$mysql = "UPDATE members SET rating$subject = $rating[$i] WHERE ID = $user[$i]";
	    if (mysqli_query($success, $mysql)) 
	    {
	        
	    }
	    else 
	    {
	       
	    }
  	}

  	for($i = 0; $i < $countProblem; $i++)
  	{
	  	$mysql = "UPDATE task SET alluser = $alluser[$i] WHERE ID = IDproblem[$i]";
	    if (mysqli_query($success, $mysql)) 
	    {
	        
	    }
	    else 
	    {
	       
	   	}

	   	$mysql = "UPDATE task SET pass = $pass[$i] WHERE ID = IDproblem[$i]";
	    if (mysqli_query($success, $mysql)) 
	    {
	        
	    }
	    else 
	    {
	       
	    }
  	}

?>