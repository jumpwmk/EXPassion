<?php
    $counttask = $_COOKIE["counttask"];
    $idUser = 2;
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