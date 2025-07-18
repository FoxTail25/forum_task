<?php
$host = 'MySQL-8.0';
$login = 'root';
$password ='';
$base = 'forum_task';

$db_forum_task_link = mysqli_connect($host, $login, $password, $base);
mysqli_query($db_forum_task_link, "SET NAMES 'utf8'");
?>