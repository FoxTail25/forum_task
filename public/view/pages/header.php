<?php

$header = file_get_contents('view/template/header.html');
	
if(!isset($_SESSION['user']['auth'])) {
	$name = 'Anonim';
	$role = 'guest';
} else {
	$name = $_SESSION['user']['name'];
	$role = $_SESSION['user']['role'];

}
$firstLetter = $name[0];
$entereButton = '
<a href="/page/auth" class="ps-2">
<button class="btn btn-sm btn-outline-primary" type="submit">Войти</button>
</a>
';
$exitButton = '
<a href="/page/logoff" class="ps-2">
<button class="btn btn-sm btn-outline-primary" type="submit">выйти</button>
</a>
';
	if($role == 'moder') {
		$bgColor = 'bg-success';
	} else if ($role == 'admin'){
		$bgColor = 'bg-danger';
	} else {
		$bgColor = 'bg-primary';
	}
	
	$header = str_replace('{{ bg-color }}', $bgColor , $header);
	$header = str_replace('{{ user role }}', $role , $header);
	$header = str_replace('{{ user name }}', $name , $header);
	$header = str_replace('{{ first letter }}', $firstLetter, $header);
	
	if($url != '/page/auth' and $url != '/page/reg') {
		if(!isset($_SESSION['user']['auth'])) {
			$header = str_replace('{{ entere button }}', $entereButton, $header);
		} else {
			$header = str_replace('{{ entere button }}', $exitButton, $header);
		}
	} else {
		$header = str_replace('{{ entere button }}', '', $header);
	}
	return $header;
?>



