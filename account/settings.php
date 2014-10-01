<?php
session_start();
include("../config.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Settings - <?php echo($global_platform['name']);?></title>
        <link rel="stylesheet" href="../css/foundation.css" />
        <script src="../js/vendor/modernizr.js"></script>
    </head>
    <body>
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
