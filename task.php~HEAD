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
        /// problem with 4 choice
    </script>

    <div class="row">
        <fieldset class="large-12 columns">
            <legend id = "problem"></legend>
            <input type="radio" name="setOfChoice" id="choiceA" required><label for="AAAA"><p onclick = "check(0)" id = "dataChoiceA"> </p></label></br>
            <input type="radio" name="setOfChoice" id="choiceB"><label for="BBBB"><p onclick = "check(1)" id = "dataChoiceB"> </p></label></br>
            <input type="radio" name="setOfChoice" id="choiceC"><label for="CCCC"><p onclick = "check(2)" id = "dataChoiceC"> </p></label></br>
            <input type="radio" name="setOfChoice" id="choiceD"><label for="DDDD"><p onclick = "check(3)" id = "dataChoiceD"> </p></label></br>
            <a onclick="checkTask()" class="button expanded" >Submit !!!</a>
            <p id = "score"></p>
        </fieldset>
    </div>

    <?php
        $test = "qwertyui";
        echo "<script>var problem = $test</script>"
    ?>

    <script>
        
        /// memset element
        
        var datachoiceA = "AAAAAAAAAAA";
        var datachoiceB = "BBBBBBBBBBB";
        var datachoiceC = "CCCCCCCCCCC";
        var datachoiceD = "DDDDDDDDDDD";
        document.getElementById("problem").innerHTML = problem;
        document.getElementById("dataChoiceA").innerHTML = datachoiceA;
        document.getElementById("dataChoiceB").innerHTML = datachoiceB;
        document.getElementById("dataChoiceC").innerHTML = datachoiceC;
        document.getElementById("dataChoiceD").innerHTML = datachoiceD;
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
            var answer = 'B';
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