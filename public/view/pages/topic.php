<?php

	$topic_id = $_SESSION['user']['topic_id'];
	
    if(isset($_POST['new_message'])){
		$user_id = $_SESSION['user']['id'];
		$message = $_POST['new_message'];
		$slug = time();
		$query = "INSERT INTO messages (slug, text, topic_id, user_id) VALUES ('$slug', '$message', '$topic_id', '$user_id')";
		mysqli_query($link, $query);
		$_POST['new_message'] = null;
		unset($_POST['new_message']);
		header("Location: /page/$params[slug1]");
    }

	if(isset($_SESSION['user']['role'])){
		
		if($_SESSION['user']['role'] == 'moder' or $_SESSION['user']['role'] == 'moder'){
			$content .= "<h5 class=\"text-center\">$params[slug1]
			
			<button type=\"button\" class=\"btn btn-danger\">Удалить тему</button>
			
			</h5>";
		}

	} else {
		$content .= "<h5 class=\"text-center\">$params[slug1]</h5>";
	}
	
	$query = "SELECT 
	messages.text,
	messages.slug,
	user.name as user_name 
	FROM 
	messages
	LEFT JOIN
	user 
	ON user.id = messages.user_id
	WHERE messages.topic_id = '$topic_id'";
	$res = mysqli_query($link, $query);
	for($data = []; $row = mysqli_fetch_assoc($res); $data[]= $row);
	if(count($data)) {
		$message = file_get_contents('view/template/message.html');
		foreach($data as $elem) {
			$message1 = str_replace('{{ user }}', $elem['user_name'], $message);
			$message2 = str_replace('{{ time }}', $elem['slug'], $message1);
			$message3 = str_replace('{{ message }}', $elem['text'], $message2);
			$content .= $message3;
		}
	} else {
		$content .='<p class="text-center">Здесь пока ещё нет сообщений</p>';
	}

	if(isset($_SESSION['user']['auth'])) {
		$form = file_get_contents('view/template/messag_form.html');
		$content .= $form;
	}
?>