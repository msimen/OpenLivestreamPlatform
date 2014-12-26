<?php
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo($lang['channels'])?> - <?php echo($global_platform['name'])?></title>
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
                <li class="active"><a href="#"><?php echo($lang['channels']);?></a></li>
            </ul>
          </section>
        </nav>
        <!--Content-->
        <div class="content">
            <div class="row">
                <!--Selection form-->
                <div class="small-3 columns">
                    <h1>Selection</h1>
                    <div class="row">
                        <div class="large-12 columns">
                            <form action="channels.php" method="post">
                                <section>
                                    <label>Select by title
                                        <input type="text" name="title" placeholder="Enter the title of the channel..." />
                                    </label>
                                </section>
                                <section>
                                    <label>Select by game
                                    <select name="game">
                                        <option value="all">Everything</option>
                                        <option value="mc">Minecraft</option>
                                        <option value="df">Dofus</option>
                                        <option value="lol">League of legends</option>
                                        <option value="wd">Watch_dogs</option>
                                    </select>
                                    </label>
                                </section>
                                <section>
                                    <label>Livestream now ?</label>
                                    <input type="radio" name="livenow" value="true" id="livenowtrue"><label for="livenowtrue">Yes</label>
                                    <input type="radio" name="livenow" value="false" id="livenowfalse"><label for="livenowfalse">No</label>
                                </section>
                                <section>
                                    <button type="submit">Submit</button>
                                </section>
                            </form>
                        </div>
                    </div>
                  </div>
                <!--Channels list-->
                <div class="small-9 columns">
                    <h1>Channels availaible :</h1>
                    <div class="channelslist">
                        <?php
                        if(isset($_POST['title']) and $_POST['title']!=NULL) {
                            $req=mysql_query('SELECT * FROM olp_channels WHERE name="'.$_POST['title'].'"');
                        } else {
                            $req=mysql_query("SELECT * FROM olp_channels");
                        }
                        while ($global_channels_list = mysql_fetch_array($req))
                        {
                        ?>
                        <section class="channelslistcomponent">
                            <?php
                            $owner = mysql_query('SELECT * FROM olp_users WHERE id="'.$global_channels_list['owner'].'"');
	                        $owner = mysql_fetch_array($owner);
                            $global_channels_list['owner'] = $owner['username'];
                            ?>
                            <h1><?php echo($global_channels_list['name'])?></h1>
                            <h4>By <i><?php echo($global_channels_list['owner']);?></i></h4>
                            <p><?php echo($global_channels_list['description'])?></p>
                            <section class="islive">
                                <h3 class="on"><a href="watch.php?id=<?php echo($global_channels_list['id']);?>">Online</a></h3>
                            </section>
                        </section>
                        <?php
                        }
                        ?>
                        <!--Sample-->
                        <!--<section class="channelslistcomponent">
                            <h1>Nom du live</h1>
                            <h4>By <i>JORYS55</i></h4>
                            <p>Description</p>
                            <section class="islive">
                                <h3 class="on">Online</h3>
                            </section>
                        </section>-->
                    </div>
                </div>
            </div>
        </div>
        <!--Scripts-->
        <script src="js/vendor/jquery.js"></script>
        <script src="js/foundation.min.js"></script>
        <script>
            $(document).foundation();
        </script>
    </body>
</html>
