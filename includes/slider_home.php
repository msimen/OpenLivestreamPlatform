<?php
session_start();
include("../config.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Home slider - <?php echo($global_platform['name']);?></title>
        <link rel="stylesheet" type="text/css" href="../css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="../css/demo.css" />
		<link rel="stylesheet" type="text/css" href="../css/component.css" />
        <script src="../js/modernizr.custom.js"></script>
    </head>
    <body>
        <!--Slideshow-->
        <div class="slideshow" id="slideshow">
			<ol class="slides">
				<li class="current">
					<div class="description">
						<h2><?php echo($lang['welcome']);?> to <?php echo($global_platform['name']);?></h2>
						<p><?php echo($global_platform['description']);?></p>
					</div>
					<div class="tiltview col">
						<a href="#"><iframe width="443" height="322" src="../about.php"><img src="../img/1_screen.jpg"/></iframe></a>
						<a href="#"><iframe width="443" height="322" src="../watch.php"><img src="../img/2_screen.jpg"/></iframe></a>
					</div>
				</li>
				<li>
					<div class="description">
						<h2>CSS Animations</h2>
						<p>We are using 12 different animations for showing and hiding the items of a slide. The animations are defined by randomly adding data-attributes called <code>data-effect-in</code> and <code>data-effect-out</code> for every slide. </p>
					</div>
					<div class="tiltview row">
						<a href="http://pexcil.com/"><img src="../img/3_mobile.jpg"/></a>
						<a href="http://foodsense.is/"><img src="../img/4_mobile.jpg"/></a>
					</div>
				</li>
                <li>
					<div class="description">
						<h2>User interface</h2>
						<p>The user inteface allows you to edit your profile, informations, perferances.</p>
					</div>
					<div class="tiltview row">
						<a href="http://pexcil.com/"><img src="../img/3_mobile.jpg"/></a>
						<a href="http://foodsense.is/"><img src="../img/4_mobile.jpg"/></a>
					</div>
				</li>
                <li>
					<div class="description">
						<h2>Actual event : Event</h2>
						<p>This is the event slide</p>
					</div>
					<div class="tiltview">
						<a href="http://pexcil.com/"><img src="../img/3_mobile.jpg"/></a>
						<a href="http://foodsense.is/"><img src="../img/4_mobile.jpg"/></a>
					</div>
				</li>
			</ol>
		</div>
        <!--Scripts-->
        <script src="js/classie.js"></script>
		<script src="js/tiltSlider.js"></script>
        <script>
			new TiltSlider(document.getElementById('slideshow'));
		</script>
    </body>
</html>
