<!DOCTYPE html>
<?php
include "connect.php";
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPassion : Be passioned by learning</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="img/foundation-icons/foundation-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/css101.css">
</head>
<script type="text/javascript">
var count = 0;
$(function() {
    $('p#add_field').click(function() {
        count += 1;
        $('#container').append(
            '<strong>Problem #' + count + '</strong><br />' + 
            'ProblemContent<br>' + '<textarea rows="4" cols="50" name="task[]"></textarea><br>' + 
            'A:' + '<input id="cA_' + count + '" name="choiceA[]' + '" type="text" />' + 
            'B:' + '<input id="cB_' + count + '" name="choiceB[]' + '" type="text" />' + 
            'C:' + '<input id="cC_' + count + '" name="choiceC[]' + '" type="text" />' + 
            'D:' + '<input id="cD_' + count + '" name="choiceD[]' + '" type="text" />' + 
            'Key:' + '<input id="key_' + count + '" name="key[]' + '" type="text" />' + 
            'Editorial Upload: ' + '<input id="file_' + count + '" name="uploadfile[]' + '" type="file" />' + '<br>');

    });
});
</script>

<body>
    <!-- NAVIGATOR -->

        <div data-sticky-container>
            <div class="sticky" data-sticky data-options=" marginTop: 0; stickyOn: small;">
                <div class="top-bar">
                    <div class="top-bar-left">
                        <ul class="dropdown" data-dropdown-menu>
                            <p class="menu-text"><img src="img/passion.png">&nbsp;&nbsp;<a href="index.php">EXPassion</a>
                                <?php
                                    if (isset($_SESSION['username']))
                                    {
                                    echo "<a class='dummy-nav-to'></a>
                                          <a href='task.php' class='dummy-nav-to'>Task</a>
                                          <a href='contest_list.php' class='nav-to'>Contest</a>";
                                          if($_SESSION["upload"]==1)
                                        {
                                            echo" <a href='upload.php' class='nav-to'>Upload</a>";
                                        }  
                                    }  
                                ?>

                            </p>
                        </ul>

                    </div>
                    <div class="top-bar-right">
                        
                            <?php

                                if(!isset($_SESSION['username']))
                                {
                                    echo    "<ul class='menu menu-ld'><ul class='inline-list hide-for-small-only account-action'>
                                                <li><a data-open='myModal'>Login</a></li>
                                                <li><a data-open='regModal'>Signup</a></li>
                                            </ul></ul>";
                                }
                                else if (isset($_SESSION['username']))
                                {
                                    echo "<ul class='menu-l menu inline-list'><ul class='inline-list hide-for-small-only account-action'>
                                            <li class='islogged' data-open='infoModal'><span data-tooltip aria-haspopup='true' data-options='disable_for_touch:true' class='has-tip' title='Lv : Coin : Exp : ' id = \"showscore\" ><a>".$_SESSION['username']."</a></span></li>
                                            <li><span data-tooltip aria-haspopup='true' class='has-tip' data-disable-hover='false' tabindex='1' title='Logout' onclick='location=\"logout.php\"'><a><i class='fi-lock'></i></a></span></li>
                                            </ul>;
                                        </ul></ul>";
                                }
                            ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- REVEAL -->
        <div id="myModal" class="large reveal" data-reveal aria-labelledby="login or sign up" aria-hidden="true" role="dialog" data-animation-in="fade-in" data-animation-out="fade-out">
            <div class="row">
                <div class="large-6 columns auth-plain">
                    <div class="signup-panel left-solid">
                        <p class="welcome">Registered Users</p>
                        <form name="form1" id="form" action="check_login.php" enctype="multipart/form-data" method="POST">
                            <div class="row collapse">
                                <div class="small-2  columns log-icon">
                                    <span class="prefix"><i class="fi-torso-female fi-lock-b"></i></span>
                                </div>
                                <div class="small-10  columns">
                                    <input type="text" name="username" id="username" placeholder="username">
                                </div>
                            </div>
                            <div class="row collapse">
                                <div class="small-2 columns log-icon">
                                    <span class="prefix"><i class="fi-lock fi-lock-b"></i></span>
                                </div>
                                <div class="small-10 columns ">
                                    <input type="password" name="password" id="password" placeholder="password">
                                </div>
                            </div>
                            <button class="button" type="submit" name="submit">Log In </button>
                        </form>
                    </div>
                </div>
                    <div class="large-6 columns auth-plain">
                        <div class="signup-panel newusers">
                            <p class="welcome"> New User?</p>
                            <p>By creating an account with us, you will be able to move through the checkout process faster, view and track your orders, and more.</p>
                            <br>
                            <a class="button " data-open='regModal'>Sign Up</a></br>
                        </div>
                    </div>
            </div>
            <button class="close-button" data-close aria-label="Close Accessible Modal" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div id="regModal" class="large reveal" data-reveal aria-labelledby="Register" aria-hidden="true" data-animation-in="fade-in" data-animation-out="fade-out">
            <div class="row expanded">
                 <h1 class="welcome">Register Todas</h1>
                <div class="large-12 medium-12 small-12 large-centered columns">
                       
                        <form name="regForm" id="form" action="in_regis.php" enctype="multipart/form-data" method="POST">
                                <legend>Username</legend>
                                <input type="text" name="username" id="username" placeholder="username" class="small-10">
                                <legend>Password</legend>
                                <input type="password" name="password" id="password" placeholder="password" class="small-10">
                                <button class="button" type="submit" name="submit">Submit</button>
                        </form>
                </div>
            </div>
            <button class="close-button" data-close aria-label="Close Accessible Modal" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div id="infoModal" class="medium reveal" data-reveal aria-labelledby="info" aria-hidden="true" data-animation-in="fade-in" data-animation-out="fade-out">
            <div class="row expanded">
                <h1 class="welcome">Profile</h1>
             </div>
            <div class="row expanded">
                <div class="large-12 medium-12 small-12 profile-container columns" id = "profile_user">
                    Username :<br>
                    Level : <br>
                    Exp : <br>
                    Coins : <br>

                </div>
            </div>
            <script src="profile_user.js"></script>
            <button class="close-button" data-close aria-label="Close Accessible Modal" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <div class="upload-container">
        <h1>New Contest</h1>
        <div class="upload-content">
            <?php
            //If form was submitted
            if (isset($_POST['btnSubmit'])) {
                //create instance of database class
                include('connect_upload.php');
                $mydb = new mysqli($servername, $username, $password);
                
                if (mysqli_connect_errno()) {
                    printf("Connect failed: %s\n", mysqli_connect_error());
                    exit();
                }
                if(mysqli_select_db($mydb, "expassion"))
                    echo "yes\n";
                else echo "no\n";
                /* return name of current default database */
                if ($result = mysqli_query($mydb, "SELECT DATABASE()")) {
                    $row = mysqli_fetch_row($result);
                    printf("Default database is %s.\n",$row[0]);
                    mysqli_free_result($result);
                }
                //Check if user has actually added additional task to prevent a php error
                if ($_POST['task']) {
                    
                    $contest_name = $_POST['contest_name'];
                    $subject = $_POST['category'];
                    $contest_start = $_POST['contest_start'];
                    $contest_end = $_POST['contest_end'];
                    $writer = $_SESSION['username'];
                    echo "$contest_name "."$subject<br>"; 
                    $sql_contest = "INSERT INTO contest (name, grouptask, start, end, writer) VALUES ('$contest_name', '$subject', '$contest_start', '$contest_end', '$writer')";
                    if($mydb->query($sql_contest)){
                        echo "contest added!";
                    }
                    else echo "no contest added!  "."$mydb->error";
                    //get last inserted userid
                    $inserted_contest_id = $mydb->insert_id;
                    
                    //Loop through added task
                    $i = 0;
                    $id_list = array();
                    $inserted_task_id;
                    foreach ( $_POST['task'] as $val ) {
                        $task = $_POST['task'][$i];
                        $cA = $_POST['choiceA'][$i];
                        $cB = $_POST['choiceB'][$i];
                        $cC = $_POST['choiceC'][$i];
                        $cD = $_POST['choiceD'][$i];
                        $key = $_POST['key'][$i];
                        $i++;
                        /*//Insert into websites table
         
                        */
                        $sql_task = "INSERT INTO task (subject, grouptask, task, choiceA, choiceB, choiceC, choiceD, checkAnswer)
                                    VALUES ('$subject', '$inserted_contest_id', '$task', '$cA', '$cB', '$cC', '$cD', '$key')";
                        if($mydb->query($sql_task)){
                            echo "task added!";
                            $inserted_task_id = $mydb->insert_id;
                            array_push($id_list, $inserted_task_id);
                        }
                        else echo "Task add Error :  "."$mydb->error";

                    }
                    //upload editorail files
                    $i = 1;
                    foreach ($_FILES["uploadfile"]["error"] as $key => $error) {
                        $upload = 1;
                        if ($_FILES['uploadfile']['type'][$key] != "pdf") {
                            echo "Problem $i : File type must be PDF!";
                            $upload = 0;
                        }
                        if ($_FILES["uploadfile"]["size"][$key] > 500000) {
                            echo "Problem $i : Sorry, your file is too large.";
                            $upload = 0;
                        }
                        if ($error == UPLOAD_ERR_OK && $upload) {
                            $tmp_name = $_FILES["uploadfile"]["tmp_name"][$key];
                            // basename() may prevent filesystem traversal attacks;
                            // further validation/sanitation of the filename may be appropriate
                            $name = $id_list[$i-1];
                            echo "name is $name";
                            move_uploaded_file($tmp_name, "pdf/$name");
                            echo "file $i Upload!! ";
                        }
                        else{
                            echo "file $i not Upload!";
                        }
                        $i++;
                    }
                } else {
                
                    echo "Please add at least ine task";
                    
                }
                echo "<h2>Contets Added, <strong>" . count($_POST['task']) . "</strong> task(s) by this user!</h2>";
                
                //disconnect mysql connection
                $mydb->close();
            }
        ?>
        <?php if (!isset($_POST['btnSubmit'])) { ?>
        <form name="taskform" method="post" action="">
            <label for="name">Contest:</label>
            <input type="text" name="contest_name" id="contest" />
            <div class="spacer"></div>
            <label for="name">Subject:</label>
            <select id="category-select" name="category">
                <option value="">select subject</option>
                <?php
                    $subject_name = array();
                    $subject_name = ['Mathemetics','Physics','Chemistry','Biology','English','Social Study','Thai'];
                    for($i = 0; $i < 7; $i++)
                    {
                        $subject_sql = "SELECT  * FROM members ORDER BY rating$i DESC LIMIT 10 ";
                        $subject_result = mysqli_query($success,$subject_sql);
                        $countt = 0;
                        while($roww = mysqli_fetch_assoc($subject_result))
                        {
                            if($roww["username"]==$_SESSION["username"])
                            {
                                echo "<option value=".$i.">".$subject_name[$i]."</option>";
                                break;
                            }
                        } 
                    }
                ?>   
            </select>
            <label for="name">Contest Start:</label>
            <input type="datetime-local" name="contest_start" />
            <label for="name">Contest End:</label>
            <input type="datetime-local" name="contest_end" />
            <div class="spacer"></div>
            <div class="form-margin">
            <div id="container">
                <p id="add_field"><a href="#"><span>&raquo; Add problems.....</span></a></p>
            </div>
            </div>
        </div>
        <div class="spacer "></div>
        <input id="go" name="btnSubmit" type="submit" value="Submit" class="btn" />
        </form>
        <?php } ?>
    </div>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
</body>

</html>