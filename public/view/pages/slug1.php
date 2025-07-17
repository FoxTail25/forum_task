<?php

$content = '';
if($params['slug1'] == 'auth' or $params['slug1'] == 'auth') {
    $authForm = file_get_contents('view/template/auth.html');
    $content .=$authForm;
}
$content .='<a href="/">вернуться на главную</a>';

return ['title' => 'slug1', 'content' => $content];
?>