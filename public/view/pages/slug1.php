<?php

$content = '';
if($params['slug1'] == 'auth') {
    $content .= include('auth.php');
}
if($params['slug1'] == 'reg') {
    $regForm = file_get_contents('view/template/reg.html');
    $content .=$regForm;
}


$content .='<p class="text-center"><a href="/">вернуться на главную</a></p>';

return ['title' => 'slug1', 'content' => $content];
?>