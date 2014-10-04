<?php
session_start();
include("../config.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Rank - <?php echo($global_platform['name']);?></title>
        <link rel="stylesheet" href="../css/foundation.css" />
        <script src="../js/vendor/modernizr.js"></script>
    </head>
    <body>
        <?php
        //If changes
        if(isset($_GET['new'])) {
            if($_GET['new']=="default") {
                mysql_query('UPDATE olp_users SET rank="default" WHERE id="'.$_SESSION['id'].'"');
                $global_user['rank']="default";
            }
            if($_GET['new']=="modo") {
                mysql_query('UPDATE olp_users SET rank="modo" WHERE id="'.$_SESSION['id'].'"');
                $global_user['rank']="modo";
            }
            if($_GET['new']=="streamer") {
                mysql_query('UPDATE olp_users SET rank="streamer" WHERE id="'.$_SESSION['id'].'"');
                $global_user['rank']="streamer";
            }
            if($_GET['new']=="admin") {
                mysql_query('UPDATE olp_users SET rank="admin" WHERE id="'.$_SESSION['id'].'"');
                $global_user['rank']="admin";
            }
        }
        ?>
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
                <li><a href="../index.php">Back to main page</a></li>
            </ul>
            <!-- Left Nav Section -->
            <ul class="left">
                <li><a href="../index.php">Home</a></li>
                <li class="active"><a href="#">Rank</a></li>
            </ul>
          </section>
        </nav>
        <br/>
        <!--Content-->
        <div class="row">
            <div class="row" data-equalizer>
                <div class="large-3 columns panel" data-equalizer-watch>
                    <ul class="pricing-table">
                        <li class="title">Standard</li>
                        <li class="price">Default rank</li>
                        <li class="description">The rank by default</li>
                        <li class="bullet-item">Watch livestreams</li>
                        <li class="bullet-item">Use chat</li>
                        <li class="bullet-item">Edit your profile</li>
                        <li class="cta-button"><a class="button <?php if($global_user['rank']=="default") {echo("disabled");}?>" href="rank.php?new=default">Select</a></li>
                    </ul>
                </div>
                <div class="large-3 columns panel" data-equalizer-watch>
                    <ul class="pricing-table">
                        <li class="title">Moderator</li>
                        <li class="price">Modo's rank</li>
                        <li class="description">The rank for moderators</li>
                        <li class="bullet-item">Watch livestreams</li>
                        <li class="bullet-item">Moderate chat</li>
                        <li class="bullet-item">Ban/Kick users</li>
                        <li class="cta-button"><a class="button <?php if($global_user['rank']=="modo") {echo("disabled");}?>" href="rank.php?new=modo">Select</a></li>
                    </ul>
                </div>
                <div class="large-3 columns panel" data-equalizer-watch>
                    <ul class="pricing-table">
                        <li class="title">Streamer</li>
                        <li class="price">Streamer's rank</li>
                        <li class="description">The rank for streamers</li>
                        <li class="bullet-item">Create, edit livestreams</li>
                        <li class="bullet-item">Chat admin</li>
                        <li class="bullet-item">User Channel</li>
                        <li class="cta-button"><a class="button <?php if($global_user['rank']=="streamer") {echo("disabled");}?>" href="rank.php?new=streamer">Select</a></li>
                    </ul>
                </div>
                <div class="large-3 columns panel" data-equalizer-watch>
                    <ul class="pricing-table">
                        <li class="title">Administator</li>
                        <li class="price">Admins's rank</li>
                        <li class="description">The rank for the site administrators</li>
                        <li class="bullet-item">Full control</li>
                        <li class="bullet-item">Chat admin</li>
                        <li class="bullet-item">Ban/Kick users</li>
                        <li class="cta-button"><a class="button <?php if($global_user['rank']=="admin") {echo("disabled");}?>" href="rank.php?new=admin">Select</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--Scripts-->
        <script src="../js/vendor/jquery.js"></script>
        <script src="../js/foundation.min.js"></script>
        <script src="../js/foundation/foundation.topbar.js"></script>
        <script src="../js/foundation/foundation.offcanvas.js"></script>
        <script src="../js/foundation/foundation.joyride.js"></script>
        <script src="../js/vendor/jquery.cookie.js"></script>
        <script>
            $(document).foundation();
        </script>
    </body>
</html>
