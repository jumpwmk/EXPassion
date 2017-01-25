<?php
    /// update alluser
    $count = $_COOKIE["alluser"];
    for($i = 0; $i < $count; $i++)
    {
        $IDproblem = $_COOKIE["alluser$i"];
        $i++;
        $update = $_COOKIE["alluser$i"];
        $mysql = "UPDATE task SET alluser = $update WHERE ID = $IDproblem";
        if (mysqli_query($con, $mysql)) 
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
        if (mysqli_query($con, $mysql)) 
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
        if (mysqli_query($con, $mysql)) 
        {
            
        }
        else 
        {
           
        }
    }

    /// update rank20
    $count = $_COOKIE["rank20"];
    for($i = 0; $i < $count; $i++)
    {
        $IDproblem = $_COOKIE["rank20$i"];
        $i++;
        $update = $_COOKIE["rank20$i"];
        $mysql = "UPDATE task SET rank20 = $update WHERE ID = $IDproblem";
        if (mysqli_query($con, $mysql)) 
        {
            
        }
        else 
        {
           
        }
    }

    $rankOfUser = $_COOKIE["rankOfUser"];
    $idUser = 1;
    $mysql = "UPDATE members SET level = $rankOfUser WHERE ID = $idUser";
    if (mysqli_query($con, $mysql)) 
    {
        
    }
    else 
    {
       
    }

    $expOfUser = $_COOKIE["expOfUser"];
    $idUser = 1;
    $mysql = "UPDATE members SET exp = $expOfUser WHERE ID = $idUser";
    if (mysqli_query($con, $mysql)) 
    {
        
    }
    else 
    {
       
    }

    $counttask = $_COOKIE["counttask"];
    $idUser = 1;
    for($i = 0; $i < $counttask; $i++)
    {
        $j = $_COOKIE["task$i"];
        $binaryTask[ $j ] = '1';
    }
    $mysql = "UPDATE members SET task = $binaryTask WHERE ID = $idUser";
    if (mysqli_query($con, $mysql)) 
    {
        
    }
    else 
    {
       
    }
?>