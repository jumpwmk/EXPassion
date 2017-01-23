<!doctype html>

<html class="no-js" lang="en" dir="ltr">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPassion</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    </head>

     <div class="top-bar">
        <div class="top-bar-left">
          <ul class="dropdown menu" data-dropdown-menu>
            <li class="menu-text">NSCHUAKUAY</li>
            <li>
              <a href="#">One</a>
              <ul class="menu vertical">
                <li><a href="#">One</a></li>
                <li><a href="#">Two</a></li>
                <li><a href="#">Three</a></li>
              </ul>
            </li>
            <li><a href="#">Two</a></li>
            <li><a href="#">Three</a></li>
          </ul>
        </div>
        <div class="top-bar-right">
          <ul class="menu">
            <li><input type="search" placeholder="Search"></li>
            <li><button type="button" class="button">Search</button></li>
          </ul>
        </div>
    </div>

    <script>

        // problem with 4 choice
        // set element

        var problem = [];
        var rankOfProblem = [];
        var dataChoiceA = [];
        var dataChoiceB = [];
        var dataChoiceC = [];
        var dataChoiceD = [];
        var checkAnswer = [];
    
    </script>

    <div class="row">
        <fieldset class="large-12 columns">
            <legend id = "problemtask"></legend>
            <input type="radio" name="setOfChoice" id="choiceA" required><label for="AAAA"><p onclick = "check(0)" id = "dataChoiceA"> </p></label></br>
            <input type="radio" name="setOfChoice" id="choiceB"><label for="BBBB"><p onclick = "check(1)" id = "dataChoiceB"> </p></label></br>
            <input type="radio" name="setOfChoice" id="choiceC"><label for="CCCC"><p onclick = "check(2)" id = "dataChoiceC"> </p></label></br>
            <input type="radio" name="setOfChoice" id="choiceD"><label for="DDDD"><p onclick = "check(3)" id = "dataChoiceD"> </p></label></br>
            <a onclick="checkTask()" class="button expanded" >Submit !!!</a>
            <p id = "score"></p>
        </fieldset>
    </div>

    <?php
        $j = 1;
    ?>

    <script>
        document.cookie = "ID<?= $j; ?> = 50";
        <?php $j++; ?>
        document.cookie = "ID<?= $j; ?> = 60";
    </script>
    <?php
        $j = 1;
        $phpVar = $_COOKIE["ID$j"];
        $j++;
        $phpVar2 = $_COOKIE["ID$j"];
        echo "$phpVar";
    ?>
    <?php

        mysql_connect("localhost","root","jumpwmk");
        mysql_select_db("nschuakuay");
        if(mysql_select_db("nschuakuay") == FALSE)
        {
            echo "Kuay";
        }
        $strtask = mysql_query("SELECT * FROM task ");
        if($strtask == FALSE) 
        { 
            die(mysql_error()); // TODO: better error handling
        }

        //problem set

        $countProblem = 0;
        $problem = array();
        $choiceA = array();
        $choiceB = array();
        $choiceC = array();
        $choiceD = array();
        $checkAnswer = array();
        $rankOfProblem = array();

        while($task = mysql_fetch_array($strtask))
        {
            $problem[$countProblem] = $task["task"];
            $choiceA[$countProblem] = $task["choiceA"];
            $choiceB[$countProblem] = $task["choiceB"];
            $choiceC[$countProblem] = $task["choiceC"];
            $choiceD[$countProblem] = $task["choiceD"];
            $checkAnswer[$countProblem] = $task["checkAnswer"];
            $rankOfProblem[$countProblem] = $task["rank"];
            $countProblem++;
        }

        for($loop = 0; $loop < $countProblem; $loop++)
        {
            echo "<script> problem[$loop] = '$problem[$loop]';</script>";
            echo "<script> dataChoiceA[$loop] = '$choiceA[$loop]';</script>";
            echo "<script> dataChoiceB[$loop] = '$choiceB[$loop]';</script>";
            echo "<script> dataChoiceC[$loop] = '$choiceC[$loop]';</script>";
            echo "<script> dataChoiceD[$loop] = '$choiceD[$loop]';</script>";
            echo "<script> checkAnswer[$loop] = '$checkAnswer[$loop]'</script>";
        }
        $testtest = 20;
        $mysql = "UPDATE task SET rank = $phpVar WHERE ID = 1";
        if (mysql_query($mysql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($strtask);
        }
        $mysql = "UPDATE task SET rank = $phpVar2 WHERE ID = 2";
        if (mysql_query($mysql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($strtask);
        }
    ?>

    <script type="text/javascript">

        /// memset element

        var id = 0;
        var IDproblem = 0;
        document.getElementById("problemtask").innerHTML = problem[IDproblem];
        document.getElementById("dataChoiceA").innerHTML = dataChoiceA[IDproblem];
        document.getElementById("dataChoiceB").innerHTML = dataChoiceB[IDproblem];
        document.getElementById("dataChoiceC").innerHTML = dataChoiceC[IDproblem];
        document.getElementById("dataChoiceD").innerHTML = dataChoiceD[IDproblem];
        var choice = ["choiceA", "choiceB", "choiceC", "choiceD", "choiceE"];
        var alphabet = ['A', 'B', 'C', 'D', 'E'];
        var rank = 0;
        /// function blah blah
        function check(index)
        {
            document.getElementById(choice[ index ]).checked = true;
        }
        function checkTask() 
        {
            var check = [];
            for(var i = 0; i < 4; i++)
            {
                check[ i ] = document.getElementById(choice[ i ]).checked;
            }
            /// isCorrect ?
            var answer = checkAnswer[IDproblem];
            var isCorrect = false;
            for(var i = 0; i < 4; i++)
            {
                if((document.getElementById(choice[ i ]).checked == true) && (alphabet[ i ] == answer))
                    isCorrect = true;
            }
            /// update rank
            if(isCorrect == true)
                rankup();
            else
                rankdown();
            
            /// reset
            for(var i = 0; i < 4; i++)
            {
                document.getElementById(choice[ i ]).checked = false;
            }
            document.getElementById("score").innerHTML = rank;
        }
        function rankup()
        {
            rank++;
        }
        function rankdown() 
        {
            rank--;
        }
    </script>


    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
</html>