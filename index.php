<?php
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo($lang['home']);?> - <?php echo($global_platform['name']);?></title>
        <link rel="stylesheet" href="css/foundation.css" />
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
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
                <li><a href="streamers.php">Streamers</a></li>
                <li><a href="livestreams.php">Livestreams</a></li>
                <li><a href="about.php"><?php echo($lang['about']);?></a></li>
                <li class="has-dropdown">
                    <a href="#"><?php echo($lang['channels']);?></a>
                    <ul class="dropdown">
                        <?php
                        $req = mysql_query('SELECT * FROM olp_channels WHERE type="main" ORDER BY id LIMIT 0, 10');
                        while ($global_channels_list = mysql_fetch_array($req))
                        {
                        ?>
                        <li><a href="watch.php?id=<?php echo($global_channels_list['id']);?>"><?php echo($global_channels_list['name']);?></a></li>
                        <?php
                        }
                        ?>
                        <!--<li><a href="#">First link in dropdown</a></li>
                        <li class="active"><a href="#">Active link in dropdown</a></li>-->
                        <li class="has-dropdown">
                        <a href="#">Streamers's channels</a>
                        <ul class="dropdown">
                            <?php
                            $req = mysql_query('SELECT * FROM olp_channels WHERE type="streamer" ORDER BY id');
                            while ($global_channels_list = mysql_fetch_array($req))
                            {
                            ?>
                            <li><a href="watch.php?id=<?php echo($global_channels_list['id']);?>"><?php echo($global_channels_list['name']);?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Left Nav Section -->
            <ul class="left">
              <li class="active"><a href="#"><?php echo($lang['home']);?></a></li>
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
                    <li><label><?php echo($lang['myaccount']);?></label></li>
                    <li><a href="account/profile.php"><?php echo($lang['profile']);?></a></li>
                    <li><a href="channels.php"><?php echo($lang['channels']);?></a></li>
                    <li><a><?php echo($lang['events']);?></a></li>
                    <li><a><?php echo($lang['team']);?></a></li>
                    <li><a href="account/rank.php"><?php echo($lang['rank']);?></a></li>
                    <li><a href="account/settings.php"><?php echo($lang['options']);?></a></li>
                </ul>
            </aside>
            <!-- Content -->
            <div class="row">
              <div class="small-14 small-centered columns">
                <br/>
                <!--Alerts-->
                <div class="alerts">
                    <?php if(isset($_GET['source']) and $_GET['source']=="login_0") {?>
                    <div data-alert class="alert-box">
                      <h4>You are connected</h4>
                      <p>It's a little ostentatious, but useful for important content.</p>
                    <a href="#" class="close">&times;</a>
                    </div>
                    <?php }?>
                    <?php if(isset($global_user['username'])) {?>
                    <div data-alert class="alert-box">
                      <h4><?php echo($lang['welcome']);?>, <?php echo($global_user['username']);?></h4>
                      <p><?php echo($lang['youareconnected']);?></p>
                    <a href="#" class="close">&times;</a>
                    </div>
                    <?php }?>
                    <div data-alert class="alert-box secondary">
                      <h5><?php echo($lang['thisisteuseshtml5css3']);?></h5>
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
                <!--Home slideshow-->
                <iframe height="680px" width="100%" src="includes/slider_home.php">Chargement...</iframe>
                <!--Lives modal-->
                <div class="lives modals">
                    <div id="livemodal1" class="reveal-modal" data-reveal>
                      <h2>Name of your livestream</h2>
                      <p class="lead">By <b>Yourusername</b></p>
                      <p>I'm a cool paragraph that lives inside of an even cooler modal. Wins!</p>
                      <a class="close-reveal-modal">&#215;</a>
                    </div>
                </div>
                <!--Live list-->
                <div class="lives list">
                    <div class="row" data-equalizer>
                        <?php
                        $req = mysql_query('SELECT * FROM olp_livestreams ORDER BY id LIMIT 0, 10');
                        while ($global_live_list = mysql_fetch_array($req))
                        {
                        ?>
                        <div id="live_<?php echo($global_live_list['id']);?>" class="large-6 columns panel" data-equalizer-watch>
                            <h2><?php echo($global_live_list['name'])?></h2>
                            <?php
                                $global_live_list_streamer = mysql_fetch_array(mysql_query('SELECT username FROM olp_users WHERE id="'.$global_live_list['streamer'].'"'));
                            ?>
                            <p class="lead">By <b><?php echo($global_live_list_streamer['username']);?></b></p>
                            <a href="#" data-reveal-id="livemodal1">More about this live</a>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
              </div>
            </div>
            <!-- Close the off-canevas menu -->
            <a class="exit-off-canvas"></a>
          </div>
        </div>
        <!--Scripts-->
        <script src="js/classie.js"></script>
		<script src="js/tiltSlider.js"></script>
        <script>
			new TiltSlider(document.getElementById('slideshow'));
		</script>
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