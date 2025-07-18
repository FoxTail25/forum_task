<?php

$content = '';
if($params['slug1'] == 'auth') {
    $content .= include('auth.php');
}
if($params['slug1'] == 'reg') {
    $content .= include('reg.php');
}
if($params['slug1'] == 'logoff') {
    require('logoff.php');
}


$content .='<p class="text-center"><a href="/">вернуться на главную</a></p>';

return ['title' => 'slug1', 'content' => $content];
?>