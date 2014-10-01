<?php
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Home - <?php echo($global_platform['name']);?></title>
        <link rel="stylesheet" href="css/foundation.css" />
        <script src="js/vendor/modernizr.js"></script>
    </head>
    <body>
        <!--Nav-->
        <nav class="top-bar" data-topbar role="navigation">
          <!--Title area-->
          <ul class="title-area">
            <li class="name">
              <h1><a href="#"><?php echo($global_platform['name']);?></a></h1>
            </li>
             <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
            <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
          </ul>
          <!--Topbar section-->
          <section class="top-bar-section">
            <!-- Right Nav Section -->
            <ul class="right">
              <li class="has-dropdown">
                <a href="#">Channels</a>
                <ul class="dropdown">
                  <li><a href="#">First link in dropdown</a></li>
                  <li class="active"><a href="#">Active link in dropdown</a></li>
                  <li class="has-dropdown">
                    <a href="#">Other channels</a>
                    <ul class="dropdown">
                        <li><a href="#">Minecraft</a></li>
                        <li><a href="#">Minecraft</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
            <!-- Left Nav Section -->
            <ul class="left">
              <li class="active"><a href="#">Home</a></li>
            </ul>
          </section>
        </nav>
        <!--Content & Off-canevas-->
        <div class="off-canvas-wrap" data-offcanvas>
          <div class="inner-wrap">
            <!--Navbar-->
            <nav class="tab-bar">
              <section class="left-small">
                <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
              </section>
              <section class="middle tab-bar-section">
                <h1 class="title">Homepage</h1>
              </section>
            </nav>
            <!-- Off Canvas Menu -->
            <aside class="left-off-canvas-menu">
                <!--<h1><?php echo($global_platform['name']);?></h1>-->
                <ul class="off-canvas-list">
                    <li><label>My account</label></li>
                    <li><a href="account/profile.php"><?php echo($lang['profile']);?></a></li>
                    <li><a>Channels</a></li>
                    <li><a>Events</a></li>
                    <li><a>Team</a></li>
                    <li><a href="account/rank.php">Rank</a></li>
                    <li><a>Options</a></li>
                </ul>
            </aside>
            <!-- Content -->
            <div class="row">
              <div class="small-11 small-centered columns">
                <br/>
                <div class="alerts">
                    <div data-alert class="alert-box">
                      <h4>You are connected</h4>
                      <p>It's a little ostentatious, but useful for important content.</p>
                    <a href="#" class="close">&times;</a>
                    </div>
                    <div data-alert class="alert-box secondary">
                      <h5>This site uses HTML5 and CSS3</h5>
                      <p>If your browser don't support them, please update.</p>
                      <a href="#" class="close">&times;</a>
                    </div>
                    <!--<div class="panel callout radius">
                      <h4>You are connected</h4>
                      <p>It's a little ostentatious, but useful for important content.</p>
                    </div>-->
                    <!--<div class="panel">
                      <h5>This site uses HTML5 and CSS3</h5>
                      <p>If your browser don't support them, please update.</p>
                    </div>-->
                </div>
                <header>
                    <h1 id="header-welcome">Welcome to <?php echo($global_platform['name']);?> <span class="label [radius round]"><?php echo($global_platform['version']);?></span></h1>
                    <p id="header-description"><?php echo($global_platform['description']);?></p>
                </header>
                <div class="lives modals">
                    <div id="livemodal1" class="reveal-modal" data-reveal>
                      <h2>Name of your livestream</h2>
                      <p class="lead">By <b>Yourusername</b></p>
                      <p>I'm a cool paragraph that lives inside of an even cooler modal. Wins!</p>
                      <a class="close-reveal-modal">&#215;</a>
                    </div>
                </div>
                <div class="lives list">
                    <div class="row" data-equalizer>
                      <div id="live_1" class="large-6 columns panel" data-equalizer-watch>
                        <h2>Name of your livestream</h2>
                        <p class="lead">By <b>Your username</b></p>
                        <a href="#" data-reveal-id="livemodal1">More about this live</a>
                      </div>
                      <div id="live_2" class="large-6 columns panel" data-equalizer-watch>
                        <h2>Name of your livestream</h2>
                        <p class="lead">By <b>Your username</b></p>
                        <a href="#" data-reveal-id="livemodal2">More about this live</a>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <!-- Close the off-canevas menu -->
            <a class="exit-off-canvas"></a>
          </div>
        </div>
        <!--Scripts-->
        <script src="js/vendor/jquery.js"></script>
        <script src="js/foundation.min.js"></script>
        <script src="js/foundation/foundation.topbar.js"></script>
        <script src="js/foundation/foundation.offcanvas.js"></script>
        <script src="js/foundation/foundation.joyride.js"></script>
        <script src="js/vendor/jquery.cookie.js"></script>
        <script>
            $(document).foundation();
        </script>
    </body>
</html>