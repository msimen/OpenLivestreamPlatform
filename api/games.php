<?php
session_start();
include("../config.php");

if(isset($_GET['game'])) {
    if(file_exists("games/".$_GET['game'].".xml")) {
        $json = simplexml_load_file("games/".$_GET['game'].".xml");
    } else {
        $json = "404 not found";
    }
} else {
    $json = "require ?game=";
}

$json = json_encode($json);
echo($json);
?>

