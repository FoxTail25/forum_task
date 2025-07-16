<?php
	if(!isset($_SESSION['auth'])) {
	$header ='
	<div id="user_reg">
		<p>Здравствуйте анонимный пользователь!</p>
		<p>
			<a href="/page/auth"><button type="button" class="btn btn-primary w-25">войти</button></a>
		</p>
	</div>';
	}
	return $header;
?>