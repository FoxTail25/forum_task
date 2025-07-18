<?php
if(!empty($_POST['login'])) {
	if(!empty($_POST['email'])) {
		if(!empty($_POST['pass'])) {
			if(!empty($_POST['checkpass'])) {
				header('Location: /');
				$_SESSION['user']['auth'] = true;
				$_SESSION['user']['name'] = $_POST['login'];
				die();
			}
		}
	}
} else {
	
	return file_get_contents('view/template/reg.html');
}
// if(isset($regForm)){

// 	return $regForm;
// }

?>