<?php
$title = 'home title';
$content = '<div>
	home content
</div>';
if(isset($_SESSION['auth'])) {
	$content .= "<p>Здравствуйте анонимный пользователь!</p>";
}
return ['title' => $title, 'content'=> $content];
?>
