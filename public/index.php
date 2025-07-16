<?php
$url = $_SERVER['REQUEST_URI'];
$layout = file_get_contents('view/template/layout.html');
$header = require('view/pages/header.php');


$route = '^/$';
if(preg_match("#$route#", $url, $params)){
	$page = include 'view/pages/home.php';
}
$route = '^/page/(?<slug1>[a-zA-Z0-9_-]+)$';
if(preg_match("#$route#", $url, $params)){
	$page = include 'view/pages/slug1.php';
}

if(!isset($page)){
	$page = include 'view/pages/404.php';
}

$layout = str_replace('{{ header in layout }}', $header, $layout);
$layout = str_replace('{{ title in layout }}', $page['title'], $layout);
$layout = str_replace('{{ content in layout }}', $page['content'], $layout);

echo $layout;

?>