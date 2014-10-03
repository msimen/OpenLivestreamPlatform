<?php
/* 2014 Open livestream platform - Jorys paulin
This site is open-source : fell free to edit, add things to it.
Github source-code : https://github.com/Jorys-Paulin/openlivestreamplatform/
*/

//Session
session_start();

//MySql database connection
mysql_connect('localhost', 'root', 'aqwZSX') or die("Error connection");
mysql_select_db('openlivestreamplatform') or die("Database error");

//New messages checker

//Name of your livestream platform
$global_platform['name']="Open livestream platform";
//Version of your livestream platform
$global_platform['version']="1.0";
//Description of your livestream platform
$global_platform['description']="Open livestream platform is platform developped with PHP/MySql to create, manage and edit livestreams";
//Lang file
$global_platform['lang_file']="lang/en_EN.php";
include("lang/en_EN.php");

//Easy games integration

//Minecraft
$global_games['minecraft_enabled']=FALSE;
$global_games['minecraft_server']="Adress of the public server of your platform";
//Dofus
$global_games['dofus_enabled']=FALSE;
$global_games['dofus_server']="Adress of the public server of your platform";
//League of legends
$global_games['lol_enabled']=FALSE;
$global_games['lol_server']="Adress of the public server of your platform";
//Watchdogs
$global_games['wd_enabled']=FALSE;
$global_games['wd_server']="Adress of the public server of your platform";

//User informations
$_SESSION['id']=1;
//Get informations
$global_user = mysql_fetch_array(mysql_query('SELECT * FROM olp_users WHERE id="'.$_SESSION['id'].'"'));
$global_user['rank']=getRank(1);

//Update sessions
function updateSession() {
    $_SESSION['name']=$global_user['name'];
    $_SESSION['surname']=$global_user['surname'];
    $_SESSION['username']=$global_user['username'];
    $_SESSION['gender']=$global_user['gender'];
    $_SESSION['rank']=$global_user['rank'];
    $_SESSION['born_date']=$global_user['born_date'];
}

updateSession();
//Get User Rank
function getRank($userid) {
    $rank = mysql_fetch_array(mysql_query('SELECT rank from olp_users where id="'.$userid.'"'));
    return($rank['rank']);
}
?>