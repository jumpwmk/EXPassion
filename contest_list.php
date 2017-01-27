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
                        <p class="menu-text"><img src="img/passion.png">&nbsp;&nbsp;<a href="index.php">EXPassion</a></p>
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
                                            <li class='islogged'>Hi! ".$_SESSION['username']."</li>
                                            <li><span data-tooltip aria-haspopup='true' class='has-tip' data-disable-hover='false' tabindex='1' title='Logout' onclick='location=\"logout.php\"'><i class='fi-lock'></i></span></li>
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
                        <a href="#" class="button ">Sign Up</a></br>
                    </div>
                </div>
            </div>
            <button class="close-button" data-close aria-label="Close Accessible Modal" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div id="regModal" class="large reveal" data-reveal aria-labelledby="Register" aria-hidden="true" data-animation-in="fade-in" data-animation-out="fade-out">
            <div class="row">
                <div class="small-6 large-centered columns">
                    <h1 class="welcome">Register Todas</h1>
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
        <br>
        <div class="row expanded lead-head">
            <div class="head">
                Sorry sorry I'm sorry sorry...
            </div>
        </div>
        <!-- MAIN CONTENT-->
        <div class="task-container">
            <div class="row expanded table">
                <table>
                    <thead>
                        <tr>
                            <th width="50">#</th>
                            <th>Contest </th>
                            <th width="150">Start</th>
                            <th width="150">Finish</th>
                            <th width="100">Participants</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
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