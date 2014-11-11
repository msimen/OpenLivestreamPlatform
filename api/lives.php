<?php
session_start();
include("../config.php");

$req = mysql_query('SELECT * FROM olp_channels ORDER BY id');
while ($text = mysql_fetch_array($req))
{
    $tojson .= json_encode($text);
}

$json = json_encode($tojson);
echo($json);
?>