<?php
include "connect.php";
include "script.php";
include "contest_list_fetch.php";

?>
    <html class="no-js" lang="en" dir="ltr">

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
    </head>

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
                                            <li class='islogged' data-open='infoModal'><span data-tooltip aria-haspopup='true' data-options='disable_for_touch:true' class='has-tip' title='Lv : Coin : Exp : '><a>".$_SESSION['username']."</a></span></li>
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
                <div class="large-12 medium-12 small-12 profile-container columns">
                    Username :<br>
                    Level : <br>
                    Exp : <br>
                    Coins : <br>

                </div>
            </div>
            <button class="close-button" data-close aria-label="Close Accessible Modal" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <br>
        <div class="row expanded lead-head">
            <div class="head">
                Contest
            </div>
        </div>
        <!-- MAIN CONTENT-->
        <div class="task-container">
            <div class="row expanded">
                <div class="select-sbj expanded">
                    <div class="sbj">
                        <div class="large-1 columns math "><a  onclick="table(0)">Math</a></div>
                        <div class="large-2 columns phys"><a   onclick="table(1)">Physics</a></div>
                        <div class="large-2 columns chem"><a   onclick="table(2)">Chemistry</a></div>
                        <div class="large-2 columns bio"><a    onclick="table(3)">Biology</a></div>
                        <div class="large-2 columns eng"><a    onclick="table(4)">English</a></div>
                        <div class="large-2 columns social"><a onclick="table(5)">Social Study</a></div>
                        <div class="large-1 columns thai"><a   onclick="table(6)">Thai</a></div>
                    </div>
                </div>
            </div>
            <div class="row expanded table">
                <table>
                    <thead>
                        <tr>
                            <th width="50">#</th>
                            <th width="850">Contest </th>
                            <th width="200">Start</th>
                            <th width="200">Finish</th>
                            <th width="100">Writer</th>
                        </tr>
                    </thead>
                    <tbody id='tbody'>

                       
                    </tbody>
                </table>
            </div>
        </div>
       
        <script src="js/vendor/jquery.js"></script>
        <script src="js/vendor/what-input.js"></script>
        <script src="js/vendor/foundation.js"></script>
        <script src="js/app.js"></script>
        <!-- NOT DISPLAY-->
        <div id="dom-target-0" style="display: none;">
            <?php table(0);?>
        </div>
        <div id="dom-target-1" style="display: none;">
            <?php table(1);?>
        </div>
        <div id="dom-target-2" style="display: none;">
            <?php table(2);?>
        </div>
        <div id="dom-target-3" style="display: none;">
            <?php table(3);?>
        </div>
        <div id="dom-target-4" style="display: none;">
            <?php table(4);?>
        </div>
        <div id="dom-target-5" style="display: none;">
            <?php table(5);?>
        </div>
        <div id="dom-target-6" style="display: none;">
            <?php table(6);?>
        </div>

    </body>

    </html>