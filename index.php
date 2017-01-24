<?php
include "connect.php";
include "script.php";
?>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foundation for Sites</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>
    <!-- NAVIGATOR -->
  <div class="top-bar-container" data-sticky-container>
    <div class="sticky" data-sticky data-options=" marginTop: 0; stickyOn: small;">
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
          




        </div>
    </div>
  </div>
</div>
    <!-- HERO SECTION -->

    <div class="row collapse expanded">

          <div class="orbit-container">
            <div class="orbit-container" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
                <ul class="orbit-container">
                    <li class="orbit-slide is-active">
                        <img class="orbit-img-top" src="img/KorMoo.jpg" alt="Food">
                         <figcaption class="orbit-caption">Delicious!</figcaption>
                    </li>
                    <li class="orbit-slide is-active">
                        <img class="orbit-img-top" src="img/KahMoo.jpg" alt="Food">
                         <figcaption class="orbit-caption">Delicious!!</figcaption>
                    </li>
                </ul>
                <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span> &#9664;&#xFE0E;</button>
                <button class="orbit-next"><span class="show-for-sr">Next Slide</span> &#9654;&#xFE0E;</button>
                <nav class="orbit-bullets">
                  <button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
                  <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
                  <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
                  <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
                </nav>
            </div>
          </div>

    </div>
  
    <!-- MAIN CONTENT -->
    <div class="main-content">
      <div class="sell-direct">
        <div class="row expanded">
          <div class="small-12 medium-2 large-3 columns philo">
            Study<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          </div>
          <div class="small-12 medium-2 large-3 columns philo">
            Train your self
          </div>
          <div class="small-12 medium-2 large-3 columns philo">
            compete with the others
          </div>
          <div class="small-12 medium-2 large-3 columns philo">
            earn acheivement
          </div>
        </div>
      </div>
      <div class="leaderboard">
        <div class="row expanded">
          <div class="large-3 medium-3 small-3 columns lead-menu">
            <div class="row"><a onclick="clickLeader()">Math</a></div>
            <div class="row"><a href="http://www.google.co.th">Physics</a></div>
            <div class="row"><a href="">Chemistry</a></div>
            <div class="row"><a href="">Biology</a></div>
            <div class="row"><a href="">English</a></div>
            <div class="row"><a href="">Social Study</a></div>
          </div>
          <div class="large-9 medium-3 small-3 columns" id="leaderBoard">
            <h1>leaderBoard Here!</h1>
          </div>
        </div>
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
    <script src="js/vendor/app.js"></script>
  </body>
</html>
