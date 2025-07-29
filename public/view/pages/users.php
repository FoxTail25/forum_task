<?php
include('db/connect.php');

if(isset($_POST['user_ban'])) {
	$userId = $_POST['user_id'];
	if($_POST['user_ban']) {
		$userBan = 0;
	}else {
		$userBan = 1;
	};

	$query = "UPDATE user SET ban = '$userBan' WHERE id = '$userId'";
	mysqli_query($link, $query);

	$_POST['user_id'] = null;
	$_POST['user_ban'] = null;
	unset($_POST['user_id']);
	unset($_POST['user_ban']);
	header('Location:/page/users');
	die();
}
if(isset($_POST['user_role'])) {
	$userId = $_POST['user_id'];
	$role = $_POST['user_role'];
	if($role == 'user') {
		$userRole = 1;
	} else if ($role == 'moder') {
		$userRole = 2;
	} else {
		$userRole = 3;
	}
	
	$query = "UPDATE user SET role_id = '$userRole' WHERE id = '$userId'";
	mysqli_query($link, $query);

	$_POST['user_id'] = null;
	$_POST['user_role'] = null;
	unset($_POST['user_id']);
	unset($_POST['user_role']);
	header('Location:/page/users');
	die();
}


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
$con .= '<thead><tr><th>user_id</th><th>user_name</th><th>ban</th><th>change_ban</th>';
($_SESSION['user']['role'] == 'moder') ? $con .= '<th>user_role</th>':'';
($_SESSION['user']['role'] == 'admin') ? $con .= '<th>user_role change_role</th>':'';
$con .= '</tr></thead>';
$con .= '<tbody>';

foreach($data as $user){

	$con .= '<tr>';
		$con .= "<td>$user[user_id]</td>";
		$con .= "<td>$user[user_name]</td>";

		$con .= $user['user_ban'] ? "<td>да</td>" :"<td>нет</td>";

		$con .= '<td><form method="POST">
		<input class="d-none" name="user_id" value="'.$user['user_id'].'">
		<input class="d-none" name="user_ban" value="'.$user['user_ban'].'">';

		$con .= $user['user_ban'] ? '<input type="submit" value="разбанить">' : '<input type="submit" value="забанить">';

		$con .= '</form></td>';
		if($_SESSION['user']['role'] == 'moder') {

			$con .= "<td>$user[user_role]</td>";
		}

		if($_SESSION['user']['role'] == 'admin') {
		$con .= '<td>
		<form method="POST">
		<input class="d-none" name="user_id" value="'.$user['user_id'].'">
		<select name="user_role">
			<option ';  $con .= ($user['user_role'] == 'user') ? 'selected':''; $con .= '>user</option>
			<option ';  $con .= ($user['user_role'] == 'moder') ? 'selected':''; $con .= '>moder</option>
			<option ';  $con .= ($user['user_role'] == 'admin') ? 'selected':''; $con .= '>admin</option>
		</select>
		<input type="submit" value="Применить">
		</form>
		</td>';
	}
		$con .= '</tr>';

}
$con .= '</tbody>';
$con .= '</table>';
return $con;
?>
