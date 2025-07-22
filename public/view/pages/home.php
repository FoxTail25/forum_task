<?php
$title = 'home title';
$content = '';

require('db/connect.php');

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
	$content .= "<span class=\"ps-2\">$elem[name]</span>";
}
} else {
	$content .= "<p class=\"text-center\">Темы пока отсутствуют :(</p>";
}
$content .='</div>';

return ['title' => $title, 'content'=> $content];
?>

