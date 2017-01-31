<?php
    
    /// choose subject
    if(!$_GET['subject_id'])
        $subject = 0;
    else
        $subject = $_GET['subject_id'];

    if(!$_SESSION['id'])
        header("location: index.php");
    else
        $idUser = $_SESSION['id'];
    
    //mysqli_select_db($success, "nschuakuay");
    mysqli_set_charset($success, "utf8_unicode_520_ci");

    $struser = mysqli_query($success, "SELECT * FROM members WHERE id = $idUser");
    if($struser == FALSE) 
    { 
        echo "5555";
        die(mysqli_error()); // TODO: better error handling
    }

    while($task = mysqli_fetch_array($struser))
    {
        $rankOfUser = $task["level$subject"];
        $expOfUser = $task["exp$subject"];
        $binaryTask = $task["task"];
        $coin = $task["coin"];
        echo "<script> coin = $coin; </script>";
        echo "<script> rankOfUser = $rankOfUser;</script>";
        echo "<script> expOfUser = $expOfUser; </script>";
        for($loop = 0; $loop < 20; $loop++)
        {
            echo "<script> binaryTask[$loop] = '$binaryTask[$loop]'; </script>";
        }
    }

    $strtask = mysqli_query($success, "SELECT * FROM task WHERE subject = $subject");
    if($strtask == FALSE) 
    { 
        die(mysqli_error()); // TODO: better error handling
    }


    //problem set

    $countProblem = 1;
    $problem = array();
    $rank = array();
    $rank10 = array();
    $pass = array();
    $alluser = array();
    $choiceA = array();
    $choiceB = array();
    $choiceC = array();
    $choiceD = array();
    $checkAnswer = array();
    $index = array();

    while($task = mysqli_fetch_array($strtask))
    {
        $problem[$countProblem] = $task["task"];
        $rank[$countProblem] = $task["rank"];
        $rank10[$countProblem] = $task["rank10"];
        $pass[$countProblem] = $task["pass"];
        $alluser[$countProblem] = $task["alluser"];
        $choiceA[$countProblem] = $task["choiceA"];
        $choiceB[$countProblem] = $task["choiceB"];
        $choiceC[$countProblem] = $task["choiceC"];
        $choiceD[$countProblem] = $task["choiceD"];
        $checkAnswer[$countProblem] = $task["checkAnswer"];
        $index[$countProblem] = $task["ID"];
        $countProblem++;
    }

    for($loop = 1; $loop < $countProblem; $loop++)
    {
        echo "<script> index[$loop] = $index[$loop];</script>";
        echo "<script> problem[index[$loop]] = '$problem[$loop]';</script>";
        echo "<script> dataChoiceA[index[$loop]] = '$choiceA[$loop]';</script>";
        echo "<script> dataChoiceB[index[$loop]] = '$choiceB[$loop]';</script>";
        echo "<script> dataChoiceC[index[$loop]] = '$choiceC[$loop]';</script>";
        echo "<script> dataChoiceD[index[$loop]] = '$choiceD[$loop]';</script>";
        echo "<script> checkAnswer[index[$loop]] = '$checkAnswer[$loop]'</script>";
        echo "<script> rank[index[$loop]] = $rank[$loop];</script>";
        echo "<script> rank10[index[$loop]] = $rank10[$loop];</script>";
        echo "<script> pass[index[$loop]] = $pass[$loop];</script>";
        echo "<script> alluser[index[$loop]] = $alluser[$loop];</script>";
        echo "<script> countProblem++; </script>";
    }

    echo "<script>subject = $subject;</script>";


?>