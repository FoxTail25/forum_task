<?php
$authForm = file_get_contents('view/template/auth.html');


if (!empty($_POST['login']) and !empty($_POST['password'])) {
	require 'db/connect.php'; 
	$login = $_POST['login'];
	$password = $_POST['password'];
	$query = "SELECT * FROM user WHERE name='$login' AND pass='$password'";
	$user = mysqli_fetch_assoc(mysqli_query($link, $query));

}

if(!empty($user)) {
	header('Location: /');
	$_SESSION['user']['auth'] = true;
	$_SESSION['user']['name'] = $_POST['login'];
	die();
} else {
	
	return $authForm;
}

?>