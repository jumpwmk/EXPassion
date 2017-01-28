<?php

    /// update alluser
    $count = $_COOKIE["alluser"];
    for($i = 0; $i < $count; $i++)
    {
        $IDproblem = $_COOKIE["alluser$i"];
        $i++;
        $update = $_COOKIE["alluser$i"];
        $mysql = "UPDATE task SET alluser = $update WHERE ID = $IDproblem";
        if (mysqli_query($success, $mysql)) 
        {
            // echo "eiei";
        }
        else 
        {
            echo "kuay";
        }
    }

    /// update pass 
    $count = $_COOKIE["pass"];
    for($i = 0; $i < $count; $i++)
    {
        $IDproblem = $_COOKIE["pass$i"];
        $i++;
        $update = $_COOKIE["pass$i"];
        $mysql = "UPDATE task SET pass = $update WHERE ID = $IDproblem";
        if (mysqli_query($success, $mysql)) 
        {
            // echo "eiei";
        }
        else 
        {
           echo "kuay";
        }
    }

    /// update rank 
    $count = $_COOKIE["rank"];
    for($i = 0; $i < $count; $i++)
    {
        $IDproblem = $_COOKIE["rank$i"];
        $i++;
        $update = $_COOKIE["rank$i"];
        $mysql = "UPDATE task SET rank = $update WHERE ID = $IDproblem";
        if (mysqli_query($success, $mysql)) 
        {
            
        }
        else 
        {
           
        }
    }

    /// update rank10
    $count = $_COOKIE["rank10"];
    for($i = 0; $i < $count; $i++)
    {
        $IDproblem = $_COOKIE["rank10$i"];
        $i++;
        $update = $_COOKIE["rank10$i"];
        $mysql = "UPDATE task SET rank10 = $update WHERE ID = $IDproblem";
        if (mysqli_query($success, $mysql)) 
        {
            
        }
        else 
        {
           
        }
    }

    $rankOfUser = $_COOKIE["rankOfUser"];
    $mysql = "UPDATE members SET level$subject = $rankOfUser WHERE ID = $idUser";
    if (mysqli_query($success, $mysql)) 
    {
        
    }
    else 
    {
       
    }

    $expOfUser = $_COOKIE["expOfUser"];
    $mysql = "UPDATE members SET exp$subject = $expOfUser WHERE ID = $idUser";
    if (mysqli_query($success, $mysql)) 
    {
        
    }
    else 
    {
       
    }

    $counttask = $_COOKIE["counttask"];
    for($i = 0; $i < $counttask; $i++)
    {
        $j = $_COOKIE["task$i"];
        $binaryTask[ $j ] = '1';
    }
    $mysql = "UPDATE members SET task = $binaryTask WHERE ID = $idUser";
    if (mysqli_query($success, $mysql)) 
    {
        
    }
    else 
    {
       
    }
?>