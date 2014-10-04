<?php
session_start();
include("../config.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo($lang['login']);?> - <?php echo($global_platform['name']);?></title>
        <link rel="stylesheet" href="../css/foundation.css" />
        <script src="../js/vendor/modernizr.js"></script>
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
                <li><a href="../index.php"><?php echo($lang['backtomainpage']);?></a></li>
            </ul>
            <!-- Left Nav Section -->
            <ul class="left">
                <li><a href="../index.php"><?php echo($lang['home']);?></a></li>
                <li class="active"><a href="#">Login</a></li>
            </ul>
          </section>
        </nav>
        <?php if(isset($_POST['email']) and isset($_POST['password'])) {
            $result = mysql_fetch_array(mysql_query('SELECT * FROM olp_users WHERE email="'.$_POST['email'].'"'));
            if ($result['password'] == $_POST['password']) {
                echo('<div data-alert class="alert-box">'.$lang['beenconnected'].'<a href="#" class="close">&times;</a></div>');
            }
        } ?>
        <!--Content-->
        <div class="row">
            <div class="small-6 large-centered columns">
                <div class="pannel">
                    <h1><?php echo($lang['login']);?> - <?php echo($global_platform['name']);?></h1>
                    <form method="post" action="login.php">
                        <input type="email" placeholder="Email" name="email" required>
                        <input type="password" placeholder="Password" name="password" required>
                        <button type="submit">Login</button>
                    </form>
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
