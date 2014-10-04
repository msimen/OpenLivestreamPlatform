<?php
// Include twitteroauth.php
require_once("twitteroauth.php");
 
// Api codes for twitter
define("CONSUMER_KEY", "VOTRE_CONSUMER_KEY");
define("CONSUMER_SECRET", "VOTRE_CONSUMER_SECRET");
define("ACCESS_TOKEN", "VOTRE_ACCESS_KEY");
define("ACCESS_TOKEN_SECRET", "VOTRE_ACCESS_TOKEN_SECRET");
 
// Connexion OAuth Twitter
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
 
// Get the message and send it to twitter
date_default_timezone_set("GMT");
$parameters = array("status" => $_GET['message']);
$status = $connection->post("statuses/update", $parameters);
?>
