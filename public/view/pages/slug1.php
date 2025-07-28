<?php

$content = '';
if($params['slug1'] == 'auth') {
    $content .= include('auth.php');
} else if($params['slug1'] == 'reg') {
    $content .= include('reg.php');
} else if($params['slug1'] == 'logoff') {
    require('logoff.php');
} else if($params['slug1'] == 'users') {
    $content .= include('users.php');
} else {
    include('db/connect.php');


    $query = "SELECT * FROM topics";
    $res = mysqli_query($link, $query);
    for($data=[]; $row = mysqli_fetch_assoc($res); $data[] = $row);
    $dataSlug = [];
    foreach($data as $elem) {
        $dataSlug[] = $elem['slug'];
        if($elem['slug'] == $params['slug1']) {
            $_SESSION['user']['topic_id'] = $elem['id'];
        }
    }
    if(in_array($params['slug1'], $dataSlug)) {
      include('topic.php');
    } 
}



$content .='<p class="text-center"><a href="/">вернуться на главную</a></p>';

return ['title' => 'slug1', 'content' => $content];
?>