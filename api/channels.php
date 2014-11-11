<?php
session_start();
include("../config.php");

$req=mysql_query("SELECT * FROM olp_channels");
while ($global_channels_list = mysql_fetch_array($req))
{
    $owner = mysql_query('SELECT * FROM olp_users WHERE id="'.$global_channels_list['owner'].'"');
	$owner = mysql_fetch_array($owner);
    $global_channels_list['owner'] = $owner['username'];
    $tojson['name'] = $global_channels_list['name'];
    $tojson['owner'] = $global_channels_list['owner'];
    $tojson['description'] = $global_channels_list['description'];
    $json .= $tojson;
}

$json = json_encode($json, JSON_FORCE_OBJECT);
echo($json);
?>
