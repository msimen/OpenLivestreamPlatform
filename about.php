<?php
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo($lang['about']);?> - <?php echo($global_platform['name']);?></title>
        <link rel="stylesheet" href="css/foundation.css" />
        <link rel="stylesheet" href="css/style.css" />
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
                <li class="active"><a href="#"><?php echo($lang['about']);?></a></li>
            </ul>
          </section>
        </nav>
        <!--Content-->
        <div class="content">
            <div class="row">
                <div class="small-14 small-centered columns">
                    <section id="main" class="main">
                        <h1>About <?php echo($global_platform['name']);?></h1>
                        <p><?php echo($global_platform['description']);?></p>
                    </section>
                    <section id="streamers" class="streamers">
                        <h1>The <?php echo($global_platform['name']);?>'s streamers</h1>
                        <p></p>
                        <section class="streamerslist">
                            <?php
                            $req=mysql_query("SELECT * FROM olp_users WHERE rank='streamer' or rank='admin'");
                            while ($results = mysql_fetch_array($req))
                            {
                            ?>
                            <section class="streamersquare" style="background: <?php if($results['avatar']!=NULL) { echo("url('".$results['avatar']."')");}?>; background-size: cover; ">
                                <span class="title"><?php echo($results['username']);?></span>
                                <span>Streamer</span>
                            </section>
                            <?php
                            }
                            ?>
                        </section>
                    </section>
                    <section id="games" class="games">
                        <h1>The games</h1>
                        <p>This is the list of all the games we are playing</p>
                        <section class="gameslist">
                            <?php
                            $req=mysql_query("SELECT * FROM olp_games");
                            while ($results = mysql_fetch_array($req))
                            {
                            ?>
                            <section class="game" style="background : <?php if($results['poster']!=NULL) { echo("url('".$results['poster']."')");}?>; background-size: cover;">
                                <span class="title"><?php echo($results['name']);?></span>
                                <span class="author"><?php echo($results['creator']);?></span>
                                <span class="website"><a href="<?php echo($results['website']);?>"><?php echo($results['website']);?></a></span>
                                <span class="description"><?php echo($results['description']);?></span>   
                            </section>
                            <?php
                            }
                            ?>
                        </section>
                    </section>
                </div>
            </div>
        </div>
        <script src="js/vendor/jquery.js"></script>
        <script src="js/foundation.min.js"></script>
        <script>
            $(document).foundation();
        </script>
    </body>
</html>
