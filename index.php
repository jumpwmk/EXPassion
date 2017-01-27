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
                        <p class="menu-text"><img src="img/passion.png">&nbsp;&nbsp;EXPassion</p>
                    </div>
                    <div class="top-bar-right">
                        <ul class="menu">
                            <?php

                                if(!isset($_SESSION['username']))
                                {
                                    echo    "<ul class='inline-list hide-for-small-only account-action'>
                                                <li><a data-open='myModal'>Login</a></li>
                                                <li><a class='signup'  data-reveal-id='myModal'>Signup</a></li>
                                            </ul>";
                                }
                                else if (isset($_SESSION['username']))
                                {
                                    echo "<ul class='inline-list hide-for-small-only account-action'>
                                            <li class='islogged'>Hi! ".$_SESSION['username']."</li>
                                            <li><span data-tooltip aria-haspopup='true' class='has-tip' data-disable-hover='false' tabindex='1' title='Logout' onclick='location=\"logout.php\"'><i class='fi-lock'></i></span></li>
                                        </ul>";
                                }
                          
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- REVEAL -->
        <div id="myModal" class="large reveal" data-reveal aria-labelledby="login or sign up" aria-hidden="true" role="dialog">
            <div class="row">
                <div class="large-6 columns auth-plain">
                    <div class="signup-panel left-solid">
                        <p class="welcome">Registered Users</p>
                        <form name="form1" id="form" action="check_login.php" enctype="multipart/form-data" method="POST">
                            <div class="row collapse">
                                <div class="small-2  columns">
                                    <span class="prefix"><i class="fi-torso-female"></i></span>
                                </div>
                                <div class="small-10  columns">
                                    <input type="text" name="username" id="username" placeholder="username">
                                </div>
                            </div>
                            <div class="row collapse">
                                <div class="small-2 columns ">
                                    <span class="prefix"><i class="fi-lock"></i></span>
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
                            <a href="#" class="button ">Sign Up</a></br>
                        </div>
                    </div>
                </div>
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
                            <h2 class="philo">Study</h2></div>
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
                        <div class="row math"   ><a onclick="clickLeader()" class="leader-text">Math</a></div>
                        <div class="row phys"   ><a class="leader-text">Physics</a></div>
                        <div class="row chem"   ><a class="leader-text">Chemistry</a></div>
                        <div class="row bio"    ><a class="leader-text">Biology</a></div>
                        <div class="row eng"    ><a class="leader-text">English</a></div>
                        <div class="row social" ><a class="leader-text">Social Study</a></div>
                    </div>
                    <div class="large-9 medium-3 small-3 columns leader-text">
                        <div class="rank" id="leaderBoard">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!-- FOOTER -->
        <footer class="footer">
            <div class="row full-width">
                <div class="small-12 medium-3 large-4 columns">
                    <p>TEST COLUMN 1 IN FOOTER</p>
                </div>
                <div class="small-12 medium-3 large-4 columns">
                    <p>TEST COLUMN 2 IN FOOTER</p>
                </div>
                <div class="small-6 medium-3 large-2 columns">
                    <p>TEST COLUMN 3 IN FOOTER (FEATURES)</p>
                    <ul class="footer-links">
                        <li><a href="#">Forums</a></li>
                        <li><a href="#">Events</a></li>
                        <li><a href="#">FAQ's</a></li>
                        <ul>
                </div>
                <div class="small-6 medium-3 large-2 columns">
                    <p>TEST COLUMN 4 IN FOOTER (FOLLOW US)</p>
                    <ul class="footer-links">
                        <li><a href="#">Github</a></li>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <ul>
                </div>
            </div>
        </footer>
        <script src="js/vendor/jquery.js"></script>
        <script src="js/vendor/what-input.js"></script>
        <script src="js/vendor/foundation.js"></script>
        <script src="js/app.js"></script>
    </body>

    </html>