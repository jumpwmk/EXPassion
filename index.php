<?php
include "connect.php";
include "script.php";
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
        <!-- HERO SECTION -->
        <div class="hero">
                <div class="orbit-container">
                    <div class="orbit-container" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
                        <ul class="orbit-container">
                            <li class="orbit-slide is-active">
                                <img class="orbit-img-top" src="img/underconstruction.jpg">
                            </li>
                        </ul>
                        <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span> &#9664;&#xFE0E;</button>
                        <button class="orbit-next"><span class="show-for-sr">Next Slide</span> &#9654;&#xFE0E;</button>
                     
                    </div>
                </div>
        </div>
        <!-- MAIN CONTENT -->
        <br>
        <div class="main-content">
            <div class="sell-direct">
                <div class="row expanded">
                    <div class="small-12 medium-2 large-3 columns philo-box">
                        <img src="img/books.png">
                        <br>
                        <div class="row">
                            <h2 class="philo">Task</h2></div>
                    </div>
                    <div class="small-12 medium-2 large-3 columns philo-box">
                        <img src="img/exam.png">
                        <br>
                        <div class="row">
                            <h2 class="philo">Train your self</h2></div>
                    </div>
                    <div class="small-12 medium-2 large-3 columns philo-box">
                        <img src="img/business.png">
                        <br>
                        <div class="row">
                            <h3 class="philo">Compete with the others<h2></div>
                    </div>
                    <div class="small-12 medium-2 large-3 columns philo-box">
                      <img src="img/medal.png"><br>
                      <div class="row"> <h3 class="philo">Earn acheivement<h2> </div>
                    </div>
                </div>
            </div>
            <!-- LeaderBoard -->
            <div class="row expanded lead-head">
                <div class="head">
                    Leaderboard
                </div>
            </div>
            <div class="leaderboard">
                <div class="row expanded">
                    <div class="large-3 medium-3 small-3 columns lead-menu">
                        <br>
                        <div class="row math"   ><a onclick="clickLeader(0)" class="leader-text">Math</a></div>
                        <div class="row phys"   ><a onclick="clickLeader(1)" class="leader-text">Physics</a></div>
                        <div class="row chem"   ><a onclick="clickLeader(2)" class="leader-text">Chemistry</a></div>
                        <div class="row bio"    ><a onclick="clickLeader(3)" class="leader-text">Biology</a></div>
                        <div class="row eng"    ><a onclick="clickLeader(4)" class="leader-text">English</a></div>
                        <div class="row social" ><a onclick="clickLeader(5)" class="leader-text">Social Study</a></div>
                        <div class="row thai"   ><a onclick="clickLeader(6)" class="leader-text">Thai</a></div>
                    </div>
                    <div class="large-9 medium-9 small-9 columns leader-text">
                        <div class="row expanded lead-subject" >
                                <div class="head" id="leaderSubject">
                                    Let's see who get this.
                                </div>
                            </div>
                        <div class="rank">
                            
                            <div class="row expanded rank1">
                                <div class="large-3 medium-3 small-3 columns">&nbsp;</div>
                                 <div class="large-6 medium-6 small-6 columns">
                                    <p class="seat1">No.1</p>
                                </div>
                                <div class="large-3 medium-3 small-3 columns">&nbsp;</div>
                                
                                 <div class="large-12 medium-12 small-12 columns"  id="leaderBoard0">
                                </div>
                                
                            </div>
                            <div class="large-6 medium-6 small-6 columns">
                                 <p class="seat23">No.2</p>
                            </div>
                            <div class="large-6 medium-6 small-6 columns">
                                 <p class="seat23">No.3</p>
                            </div>
                            <div class="large-6 medium-6 small-6 columns rank2" id="leaderBoard1">

                            </div>
                            <div class="large-6 medium-6 small-6 columns  rank3" id="leaderBoard2">

                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <script src="js/vendor/jquery.js"></script>
        <script src="js/vendor/what-input.js"></script>
        <script src="js/vendor/foundation.js"></script>
        <script src="js/app.js"></script>
    </body>

    </html>