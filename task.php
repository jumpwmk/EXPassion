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

    <div class="row">
        <div class="large-12 columns">
            <legend id = "problemtask"></legend>
            <input type="radio" name="setOfChoice" id="choiceA" required><label for="AAAA"><p onclick = "check(0)" id = "dataChoiceA"> </p></label></br>
            <input type="radio" name="setOfChoice" id="choiceB"><label for="BBBB"><p onclick = "check(1)" id = "dataChoiceB"> </p></label></br>
            <input type="radio" name="setOfChoice" id="choiceC"><label for="CCCC"><p onclick = "check(2)" id = "dataChoiceC"> </p></label></br>
            <input type="radio" name="setOfChoice" id="choiceD"><label for="DDDD"><p onclick = "check(3)" id = "dataChoiceD"> </p></label></br>
            <a onclick="checkTask()" class="button expanded" >Submit !!!</a>
            <a onclick="reload()" class="button expanded" >Reload !!!</a>
            <p id = "score"></p>
        </div>
    </div>

    <script src="setElement.js"></script>

    <?php
        include 'connectphpjump.php';
    ?>

    <script src="problemtask.js"></script>

    <?php 
        include 'updatescore.php';
    ?> 

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
</html>

