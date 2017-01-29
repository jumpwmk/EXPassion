<?php
    $counttask = $_COOKIE["counttask"];
    for($i = 1; $i <= $counttask; $i++)
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
    
    $mysql = "UPDATE members SET contest$contestgroup = $counttask WHERE ID = $idUser";
    if (mysqli_query($success, $mysql)) 
    {

    }
    else 
    {
       
    }
?>