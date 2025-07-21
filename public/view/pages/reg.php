<?php


if(!empty($_POST['login'])) {
	if(!empty($_POST['email'])) {
		if(!empty($_POST['pass'])) {
			if(!empty($_POST['checkpass'])) {
				addUserDataInDB($_POST);
				header('Location: /');
				$_SESSION['user']['auth'] = true;
				$_SESSION['user']['name'] = $_POST['login'];
				die();
			} else {
				return '<p>повторный пароль не введён</p>
				<p><a href="/page/reg">заново</a></p>';			
			}
		} else {
			return '<p> не указан пароль</p>
			<p><a href="/page/reg">заново</a></p>';	
		}
	} else {
		// $_POST = null;
		return '<p> не указан емаил</p>
		<p><a href="/page/reg">заново</a></p>';
	}
} else {
	return file_get_contents('view/template/reg.html');
}

function addUserDataInDB($userDataArr) {

include('db/connect.php');
$query = "INSERT INTO user (name, email, pass) VALUE('$userDataArr[login]', '$userDataArr[email]', '$userDataArr[pass]')";
mysqli_query($link, $query) or die(mysqli_error($link));
}
?>