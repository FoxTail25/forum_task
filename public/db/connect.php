<?php
$host = 'MySQL-8.0';
$login = 'root';
$password ='';
$base = 'forum_task';

$link = mysqli_connect($host, $login, $password, $base);
mysqli_query($link, "SET NAMES 'utf8'");
?>