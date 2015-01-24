<?php
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Watch - <?php echo($global_platform['name']);?></title>
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
                <li><a href="index.php"><?php echo($lang['home']);?></a></li>
                <li class="active"><a href="#">Watch a channel</a></li>
            </ul>
          </section>
        </nav>
        <!--Content-->
        <div class="content">
            <div class="row">
                <div class="small-12 small-centered columns">
                    <h1>Watch a livestream - <?php echo($global_platform['name']);?></h1>
                </div>
                <div class="small-12 small-centered columns">
                    <iframe width="100%" height="500px" src="includes/liveframe.php?id=<?php echo($_GET['id']);?>" frameborder="0"></iframe>
                </div>
            </div>
            <div class="row">
                <div class="small-4 columns">
                    <h4>About the streamer</h4>
                </div>
                <div class="small-8 columns">
                    <h4>About the livestream</h4>
                </div>
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
