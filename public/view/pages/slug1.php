<?php

$content = '';
if($params['slug1'] == 'auth' or $params['slug1'] == 'auth') {
    $authForm = file_get_contents('view/template/auth.html');
    $content .=$authForm;
}

if(isset($_POST)) {
    var_dump($_POST);
}

$content .='<p class="text-center"><a href="/">вернуться на главную</a></p>';

return ['title' => 'slug1', 'content' => $content];
?>