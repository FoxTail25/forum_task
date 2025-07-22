<?php
require('db/connect.php');

$title = 'home title';
$content = '';
$err = null;
if(isset($_POST['new_topic'])){
	$query_check = "SELECT * FROM topics WHERE name = '$_POST[new_topic]'";
	$res = mysqli_fetch_assoc(mysqli_query($link, $query_check));
	if(isset($res)) {
		$err = 'Такая тема уже есть';
	} else {
		$query_ad = "INSERT INTO topics (slug, name) VALUES ('$_POST[new_topic]', '$_POST[new_topic]')";
		mysqli_query($link, $query_ad);
		$_POST['new_topic'] = null;
		unset($_POST['new_topic']);
		header('Location: /');
		die();
	}
}


$query = "SELECT * FROM topics";
$res = mysqli_query($link, $query);
for($data =[]; $row = mysqli_fetch_assoc($res); $data[] = $row);

$content .= '<div class="text-center">
	<h3>
		Практика на движок в PHP
	</h3>
	<h4 class="text-secondary">
		Реализуйте форум с обязательной регистрацией. Зарегистрованный пользователь может создавать темы, отвечать в них. Кроме обычных пользователей должны быть еще и модераторы, которые могут удалять любые темы и банить пользователей, а также администратор сайта, который имеет доступ к админке.
	</h4>
</div>';

$content .= '<div><h5 class="text-center">Список тем</h5>';

if(count($data) > 0) {
foreach($data as $elem){
	$content .= "<a class=\"ps-2\" href=\"page/$elem[slug]\">$elem[name]</a>";
}
} else {
	$content .= "<p class=\"text-center\">Темы пока отсутствуют :(</p>";
}
if(isset($_SESSION['user'])) {
	if(!$err) {

		$content .= '<h6>Создать новую тему</h6>
		<form method="POST">
		<label>Новая тема
		<input type="text" name="new_topic">
		</label>
		<input type="submit" value="создать">
		</form>';
		} else {
			$content .= "<p>Такая тема уже есть</p>";
			$content .= "<a href=\"/\">Попробовать ещё раз</a>";
		}
} 
$content .='</div>';

return ['title' => $title, 'content'=> $content];
?>

