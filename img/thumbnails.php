<?php
session_start();
include("../config.php");

if(isset($_GET['id'])) {
    $req = mysql_query('SELECT * FROM olp_thumbnails WHERE id="'.$_GET['id'].'"');
    $result = mysql_fetch_array($req);
    $tojson['id']=$result['id'];
    $tojson['src']=$result['src'];
    $tojson['isSvg']=$result['isSvg'];
    $tojson['media']=$result['media'];
    $tojson['liveid']=$result['liveid'];
    $tojson['type']=$result['type'];
    $json= json_encode($tojson);
    echo($json);
}
?>

