<?php

    //mysqli_select_db($success, "nschuakuay");
    if(mysqli_select_db($success, "nschuakuay") == FALSE)
    {
        echo "Kuay";
    }
    mysqli_set_charset($success, "utf8_unicode_520_ci");
    $iduser = $_SESSION['id'];
    $struser = mysqli_query($success, "SELECT * FROM members WHERE id = $iduser");
    if($struser == FALSE) 
    { 
        echo "5555";
        die(mysqli_error()); // TODO: better error handling
    }

    while($task = mysqli_fetch_array($struser))
    {
        $rankOfUser = $task["level"];
        $expOfUser = $task["exp"];
        $binaryTask = $task["task"];
        echo "<script> rankOfUser = $rankOfUser;</script>";
        echo "<script> expOfUser = $expOfUser; </script>";
        for($loop = 0; $loop < 20; $loop++)
        {
            echo "<script> binaryTask[$loop] = '$binaryTask[$loop]'; </script>";
        }
    }

    $strtask = mysqli_query($success, "SELECT * FROM task ");
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
    // $subject = $_POST['username']; /// choose subject
    $subject = 0;

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
        echo "<script> problem[$loop] = '$problem[$loop]';</script>";
        echo "<script> dataChoiceA[$loop] = '$choiceA[$loop]';</script>";
        echo "<script> dataChoiceB[$loop] = '$choiceB[$loop]';</script>";
        echo "<script> dataChoiceC[$loop] = '$choiceC[$loop]';</script>";
        echo "<script> dataChoiceD[$loop] = '$choiceD[$loop]';</script>";
        echo "<script> checkAnswer[$loop] = '$checkAnswer[$loop]'</script>";
        echo "<script> rank[$loop] = $rank[$loop];</script>";
        echo "<script> rank10[$loop] = $rank10[$loop];</script>";
        echo "<script> pass[$loop] = $pass[$loop];</script>";
        echo "<script> alluser[$loop] = $alluser[$loop];</script>";
        echo "<script> countProblem++; </script>";
    }

    echo "<script>subject = $subject</script>";


?>