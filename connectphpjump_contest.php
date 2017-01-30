<?php
    $contest_id = $_GET['contest_id'];
    $subject_id = $_GET['subject_id'];

    //mysqli_select_db($success, "nschuakuay");
    
    mysqli_set_charset($success, "utf8_unicode_520_ci");
    $idUser = $_SESSION['id'];
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
        echo "<script> rankOfUser = $rankOfUser;</script>";
        echo "<script> EXPOfUser = $expOfUser; </script>";
        for($loop = 0; $loop < 20; $loop++)
        {
            echo "<script> binaryTask[$loop] = '$binaryTask[$loop]'; </script>";
        }
    }

    $strtask = mysqli_query($success, "SELECT * FROM task WHERE grouptask = $contest_id");
    if($strtask == FALSE) 
    { 
        die(mysqli_error()); // TODO: better error handling
    }


    //problem set

    $countProblem = 1;
    $problem = array();
    $choiceA = array();
    $choiceB = array();
    $choiceC = array();
    $choiceD = array();
    $checkAnswer = array();
    $index = array();
    // $subject = $_POST['username']; /// choose subject

    while($task = mysqli_fetch_array($strtask))
    {
        $problem[$countProblem] = $task["task"];
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
        echo "<script> countProblem++; </script>";
    }

    echo "<script>subject = $subject</script>";

    
    $strcontest = mysqli_query($success, "SELECT * FROM contest WHERE ID = $contest_id");
    if($strcontest == FALSE) 
    { 
        echo "5555";
        die(mysqli_error()); // TODO: better error handling
    }

    while($contest = mysqli_fetch_array($strcontest))
    {
        $datetime = $contest["end"];
        echo "<script>y = '$datetime[0]'+'$datetime[1]'+'$datetime[2]'+'$datetime[3]';</script>";
        echo "<script>m = '$datetime[5]'+'$datetime[6]';</script>";
        echo "<script>d = '$datetime[8]'+'$datetime[9]';</script>";
        echo "<script>h = '$datetime[11]'+'$datetime[12]';</script>";
        echo "<script>mi = '$datetime[14]'+'$datetime[15]';</script>";
        echo "<script>s = '$datetime[17]'+'$datetime[18]';</script>";
        echo "<script>m = parseInt(m) - 1;</script>";
    }

?>