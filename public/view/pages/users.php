<?php

if(isset($_POST['user_id'])) {
	$userId = $_POST['user_id'];
	if($_POST['user_ban']) {
		$userBan = 0;
	}else {
		$userBan = 1;
	};

	// var_dump($_POST);
	include('db/connect.php');

	$query = "UPDATE user SET ban = '$userBan' WHERE id = '$userId'";
	mysqli_query($link, $query);

	$_POST['user_id'] = null;
	$_POST['user_ban'] = null;
	unset($_POST['user_id']);
	unset($_POST['user_ban']);
	header('Location:/page/users');
	die();
}



include('db/connect.php');
$query = "SELECT
user.id as user_id, 
user.name as user_name,
user_role.role as user_role,
user.ban as user_ban
FROM 
user
LEFT JOIN
user_role
ON user_role.id = user.role_id
";

$db_answer = mysqli_query($link, $query);

for($data = []; $row = mysqli_fetch_assoc($db_answer); $data[]=$row);

$con = "<h1>Таблица пользователей</h1>";

$con .= '<table>';
$con .= '<thead><tr><th>user_id</th><th>user_name</th><th>user_role</th><th>user_ban</th><th>change_ban</th></tr></thead>';
$con .= '<tbody>';

foreach($data as $user){

	$con .= '<tr>';
		$con .= "<td>$user[user_id]</td>";
		$con .= "<td>$user[user_name]</td>";
		$con .= "<td>$user[user_role]</td>";

		if($user['user_ban']) {
			$con .= "<td>да</td>";
		} else {
			$con .= "<td>нет</td>";
		}

		$con .= '<td><form method="POST">
		<input class="d-none" name="user_id" value="'.$user['user_id'].'">
		<input class="d-none" name="user_ban" value="'.$user['user_ban'].'">';

		if($user['user_ban']) {
			$con .= '<input type="submit" value="разбанить">';
		} else {
			$con .= '<input type="submit" value="забанить">';
		}

		$con .= '</form></td>';
		$con .= '</tr>';

}
$con .= '</tbody>';
$con .= '</table>';
return $con;
?>
