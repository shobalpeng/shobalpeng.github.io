<?php
$id=$_GET["id"];
$info=file_get_contents("http://www.miguvideo.com/gateway/playurl/v1/play/playurl?contId=$id&rateType=4");
preg_match('/"url":"(.*?)"/i',$info,$sn);
$playurl=$sn[1];
$url=str_replace(array("\u002F"),'/',$playurl);
header('location:'.urldecode($playurl));
?>
