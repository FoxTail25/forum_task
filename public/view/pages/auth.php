<?php
$authForm = file_get_contents('view/template/auth.html');


if (!empty($_POST['login']) and !empty($_POST['password'])) {
	require 'db/connect.php'; 
	$login = $_POST['login'];
	$password = $_POST['password'];
	// $query = "SELECT * FROM user WHERE name='$login' AND pass='$password'";
	$query = "SELECT
	 * 
	 FROM 
	 user 
	 LEFT JOIN 
	 user_role ON user_role.id = user.role_id
	 WHERE name='$login' AND pass='$password'";
	$user = mysqli_fetch_assoc(mysqli_query($link, $query));

}

if(!empty($user)) {
	header('Location: /');
	$_SESSION['user']['auth'] = true;
	$_SESSION['user']['name'] = $_POST['login'];
	$_SESSION['user']['id'] = $user['id'];
	$_SESSION['user']['role'] = $user['role'];
	die();
} else {
	
	return $authForm;
}

?>