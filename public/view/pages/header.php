<?php


	if(!isset($_SESSION['auth'])) {
	$header = file_get_contents('view/template/header.html');
	$name = 'Anonim';
	$firstLetter = $name[0];
	$entereButton = '
	<a href="/page/auth" class="ps-2">
    <button class="btn btn-sm btn-outline-primary" type="submit">Войти</button>
	</a>
	';
	}
	$header = str_replace('{{ user name }}', $name , $header);
	$header = str_replace('{{ first letter }}', $firstLetter, $header);
	
	if($url != '/page/auth' and $url != '/page/register') {
		$header = str_replace('{{ entere button }}', $entereButton, $header);
	} else {
		$header = str_replace('{{ entere button }}', '', $header);
	}
	return $header;
?>



