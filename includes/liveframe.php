<?php
session_start();
include("../config.php");

if(isset($_GET["liveid"])){
    $live["id"] = $_GET["liveid"];
} else {
    $live["id"] = "default";
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Liveframe</title>
        <link rel="stylesheet" href="../css/foundation.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="liveframe.css">
    </head>
    <body>
        <section class="livestream_viewport">
            <section class="navbar">
                <div class="container">
                    <div class="row">
                        <div class="medium-4 columns title"><h4>Open livestream platform</h4></div>
                        <div class="medium-8 columns text">Hello <strong>@user</strong>, you are currenty watching the live of <strong>Streamer</strong> on <strong>Game</strong></div>
                    </div>
                </div>             
            </section>
            <section class="overlays">
                <section class="starting">
                    <div class="row">
                        <div class="large-6 columns large-centered title">
                            <h1>Please stand by</h1>
                            <p>Livestream starting in <span class="timeremain">20s</span></p>
                        </div>
                    </div>        
                </section>
                <section class="pause">
                    <div class="container">
                        <div class="row">
                            <div class="large-4 columns sidebar">
                                <h2>Streamer on game</h2>
                                <p>Stats of this livestream :</p>
                                <ul class="livestream_stats">
                                    <li>Current livestream duration : <span class="duration">45mins</span></li>
                                    <li>Pepole watching : <span class="viewers">2000</span></li>
                                    <li>Messages sended : <span class="messages">4000</span></li>
                                    <li>Likes : <span class="likes">2000</span></li>
                                </ul>
                            </div>
                            <div class="large-6 columns title">
                                <h1>Let's take a break !</h1>
                                <p>Livestream is paused by the streamer : come back in <span class="timeremain">20s</span></p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="error">
                    <div class="container">
                        <div class="row">
                            <div class="large-4 small-12 columns sidebar">
                                <div class="container">
                                    <h2>Want to report this error ?</h2>
                                    <p>Use this form to report this error</p>
                                    <form action="../account/report.php?type=livestream" method="post">
                                        <input type="text" name="livestream" placeholder="Enter the livestream you are watching">
                                        <textarea name="description" placeholder="Describes the error in some paragraphs"></textarea>
                                        <input type="submit" value="Send this report">
                                    </form> 
                                </div>
                            </div>
                            <div class="large-6 small-12 columns title">
                                <div class="container">
                                    <h1>Ooops ! Something goes wrong</h1>
                                    <h4>Opl has got an error. You can reload the page, or report this error</h4>
                                </div>
                            </div> 
                        </div> 
                    </div>
                </section>
            </section>
            <section class="player" style="display: none;">
                <iframe frameborder="0" width="480" height="270" src="//www.dailymotion.com/embed/video/x25eyo8" allowfullscreen></iframe>
            </section>
        </section>
    </body>
</html>


