<?php
  include "connect.php";

  $subject = 0;
  $contest = 1;
  $IDproblem = array();
  $user = array();
  $rating = array();
  $score = array();
  $countuser = 0;
  $alluser = array();
  $pass = array();
  $rank = array(array());
  $expected = array();
  $real = array();
  $temp = array();
  $countProblem = 0;

  $strtask = mysqli_query($success, "SELECT * FROM task WHERE grouptask = $contest");
  if($strtask == FALSE) 
  { 
      die(mysqli_error()); // TODO: better error handling
  }
  while($task = mysqli_fetch_array($strtask))
  {
    $IDproblem[$countProblem] = $task["ID"];
    $alluser[$countProblem] = $task["alluser"];
    $pass[$countProblem] = $task["pass"];
    $countProblem++;
  }

  $struser = mysqli_query($success, "SELECT * FROM members ORDER BY rating$subject DESC");
  if($struser == FALSE) 
  { 
      echo "5555";
      die(mysqli_error()); // TODO: better error handling
  }

  while($result = mysqli_fetch_array($struser))
  {
      $user[$countuser] = $result["id"];
      $rating[$countuser] = $result["rating$subject"];
      $score[$countuser] = $result["contest$contest"];
      $binaryTask = $task["task"];
      for($loop = 0; $loop < $countProblem; $loop++)
      {
          $alluser[$loop]++;
          if($binaryTask[$IDproblem[$loop]] == '1')
          	$pass[$loop]++;
      }
      $countuser++;
  }

  // //update rating by jumpwmk

  for($i = 0; $i < $countuser; $i++)
  {
    for($j = 0; $j < $countuser; $j++)
    {
      $rank[ $i ][ $j ] = 1/(1 + pow(10.0,($rating[$j] - $rating[$i])/400.0));
    }
    $expected[ $i ] = 0;
  }  

  for($i = 0; $i < $countuser; $i++)
  {
    for($j = 0; $j < $countuser; $j++)
    {
      if( $i != $j )
        $expected[ $i ] += $rank[ $j ][ $i ];
    }
  }  

  $cntuser = 0;
  for($loop = 1; ; $loop++)
  {
    $mx = -1;
    for($i = 0; $i < $countuser; $i++)
    {
      if($mx < $score[ $i ])
        $mx = $score[ $i ];
    }
    
    if( $mx == -1 )
      break ;

    $tmp = $cntuser;
    for($i = 0; $i < $countuser; $i++)
    {
      if($mx == $score[ $i ])
      {
        $real[ $i ] = $tmp;
        $temp [ $i ] = $tmp;
        $score[ $i ] = -1;
        $cntuser++;
      }
    }
  }

  $change = array();

  //change rating
  $rating[$countuser] = $rating[$countuser - 1];
  for($i = 0; $i < $countuser; $i++)
  {
    // echo '<p>'."$i $rating[$i] $temp[$i] $real[$i] $expected[$i]".'</p>';
    $tmp = $expected[ $i ] - floor($expected[ $i ]);
    $tmp1 = $rating[ floor($expected[ $i ])];
    $tmp2 = $tmp * ($rating[ floor($expected[ $i ]) ] - $rating[ floor($expected[ $i ]) + 1 ]);
    $expected[ $i ] = floor($rating[ floor($expected[ $i ])] - $tmp * min(30,($rating[ floor($expected[ $i ]) ] - $rating[ floor($expected[ $i ]) + 1 ])));
    $real[ $i ] = $rating[ $real[ $i ] ];
    $change[ $i ] = $real[ $i ] - $expected[ $i ];
  }

  for($i = 0; $i < $countuser; $i++)
  {
    $rating[ $i ] = $rating[ $i ] + $change[ $i ]/3.00;
    $rating[ $i ] = floor($rating[ $i ]);
    echo '<p>'."$i $rating[$i] $temp[$i] $real[$i] $expected[$i]".'</p>'; /// debug
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