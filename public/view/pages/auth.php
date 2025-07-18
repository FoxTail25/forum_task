<?php
$authForm = file_get_contents('view/template/auth.html');
if(!empty($_POST['login'])){
	$login = $_POST['login'];
	if(strlen($login) > 1) {
		$authForm .= '<p>есть логин</p>';
	}
} 

if(!empty($_POST['password'])){
	$pass = $_POST['password'];
	if(strlen($pass) > 1) {
		
		$authForm .= '<p>есть пароль</p>';
	}
}

return $authForm;
?>