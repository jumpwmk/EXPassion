<?php
  include "connect.php";

  while( 1 )
  {
    $contest = 0;

    $strcontest = mysqli_query($success, "SELECT * FROM contest WHERE status = 0");
    if($strcontest == FALSE) 
    { 
        die(mysqli_error()); // TODO: better error handling
    }
    while($chkcontest = mysqli_fetch_array($strcontest))
    {
      $datetime = $chkcontest["end"];
      $date1 =  date_create($datetime) -> format('Y-m-d H:i:s');
      $date2 = date_create('now') -> format('Y-m-d H:i:s');
      if( $date1 < $date2)
      {
        $contest = $chkcontest["ID"];
      }
    }

    if($contest == 0)
    {
      continue;
    }

    $subject = 0;
    $IDproblem = array();
    $user = array();
    $rating = array();
    $score = array();
    $countuser = 0;
    $alluser = array();
    $pass = array();
    $p = array(array());
    $rank = array();
    $rank10 = array();
    $expected = array();
    $real = array();
    $coin = array();
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
      $rank[$countProblem] = $task["rank"];
      $rank10[$countProblem] = $task["rank10"];
      $countProblem++;
    }

    echo "$countProblem";

    $struser = mysqli_query($success, "SELECT * FROM members WHERE contest$contest >= 0 ORDER BY rating$subject DESC");
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
      $binaryTask = $result["task"];
      $coin[$countuser] = $result["coin"];
      for($loop = 0; $loop < $countProblem; $loop++)
      {
          $alluser[$loop]++;
          if($binaryTask[$IDproblem[$loop]] == '1')
          	$pass[$loop]++;
      }
      $countuser++;
    }

    for($i = 0; $i < $countProblem; $i++)
    {
      $rank[$i] = round(100 - round(($pass[$i]*100)/$alluser[$i]));
      $rank10[$i] = round($rank[$i]/5);
    }

    for($i = 0; $i < $countuser; $i++)
    {
      $binaryTask = $task["task"];
      for($loop = 0; $loop < $countProblem; $loop++)
      {
          if($binaryTask[$IDproblem[$loop]] == '1')
          {
            $coin[ $i ] += 25 * $rank10[ $loop ];
          }
      }
    }

    // //update rating by jumpwmk

    for($i = 0; $i < $countuser; $i++)
    {
      for($j = 0; $j < $countuser; $j++)
      {
        $p[ $i ][ $j ] = 1/(1 + pow(10.0,($rating[$j] - $rating[$i])/400.0));
      }
      $expected[ $i ] = 1;
    }  

    for($i = 0; $i < $countuser; $i++)
    {
      for($j = 0; $j < $countuser; $j++)
      {
        $expected[ $i ] += $p[ $j ][ $i ];
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

      $tmp = $cntuser + 1;
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
      $mean = pow(pow($real[ $i ],1.6487212707) * $expected[ $i ],3.71828182846);
      $leftbsearch = 0; 
      $rightbsearch = 5000;
      while($rightbsearch - $leftbsearch > pow(10,-5))
      {
        $mid = ($rightbsearch + $leftbsearch)/2;
        $tmprating = 1;
        for($j = 0; $j < $countuser; $j++)
        {
          $tmprating += 1/(1 + pow(10.0,($mid - $rating[$j])/400.0));
        }
        
        if($tmprating == $mean)
        {
          $leftbsearch = $mid;
          break;
        }
        if($tmprating < $mean)
        {
          $rightbsearch = $mid;
        }
        else
        {
          $leftbsearch = $mid;
        }
      }
      $change[ $i ] = ($leftbsearch - $rating[ $i ])/3.00;
      echo '<p>'."$rating[$i] $temp[$i] $mean $leftbsearch".'</p>';
    }

    for($i = 0; $i < $countuser; $i++)
    {
      $rating[ $i ] = $rating[ $i ] + $change[ $i ];
      $rating[ $i ] = floor($rating[ $i ]);
      $mean = $mean = pow($real[ $i ] * $expected[ $i ],0.50);
      // echo '<p>'."$i $rating[$i] $temp[$i] $real[$i] $expected[$i] $mean".'</p>'; /// debug
    }



    for($i = 0; $i < $countuser; $i++)
    {
    	$mysql = "UPDATE members SET rating$subject = $rating[$i] WHERE ID = $user[$i]";
      if (mysqli_query($success, $mysql)){}
      else echo "bug";

      $mysql = "UPDATE members SET coin = $coin[$i] WHERE ID = $user[$i]";
      if (mysqli_query($success, $mysql)){}
      else echo "bug";
    }

    for($i = 0; $i < $countProblem; $i++)
    {
      echo '<p>'."$alluser[$i]".'</p>';
    	$mysql = "UPDATE task SET alluser = $alluser[$i] WHERE ID = $IDproblem[$i]";
      if (mysqli_query($success, $mysql)){}
      else echo "bug";

     	$mysql = "UPDATE task SET pass = $pass[$i] WHERE ID = $IDproblem[$i]";
      if (mysqli_query($success, $mysql)){}
      else echo "bug";

      $mysql = "UPDATE task SET rank = $rank[$i] WHERE ID = $IDproblem[$i]";
      if (mysqli_query($success, $mysql)){}
      else echo "bug";

      $mysql = "UPDATE task SET rank10 = $rank10[$i] WHERE ID = $IDproblem[$i]";
      if (mysqli_query($success, $mysql)){}
      else echo "bug";

    }

    $mysql = "UPDATE contest SET status = 1 WHERE ID = $contest";
    if (mysqli_query($success, $mysql)){}
    else echo "bug";
  
    sleep(1);

  }

?>