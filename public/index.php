<?php
$url = $_SERVER['REQUEST_URI'];
$layout = file_get_contents('view/template/layout.php');
$header = require('view/template/header.php');


$route = '^/$';
if(preg_match("#$route#", $url, $params)){
	$page = include 'view/pages/home.php';
}

if(!isset($page)){
	$page = include 'view/pages/404.php';
}

$layout = str_replace('{{ header in layout }}', $header, $layout);
$layout = str_replace('{{ title in layout }}', $page['title'], $layout);
$layout = str_replace('{{ content in layout }}', $page['content'], $layout);

echo $layout;

?>