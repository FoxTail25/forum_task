<?php 
include('db/connect.php');
$query = "SELECT
-- user.id, user.name, user_role.role as r,
-- *
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

// var_dump($data);

$con = "<h1>Таблица пользователей</h1>";

$con .= '<form method="POST">';
$con .= '<table>';
$con .= '<thead><tr><th>user_id</th><th>user_name</th><th>user_role</th><th>user_ban</th><th>change</th></tr></thead>';
$con .= '<tbody>';
foreach($data as $user){
	$ban = $user['user_ban'];
	$neban = !$ban;
	$con .= '<tr>';	
	$con .= "<td>$user[user_id]</td>"
	."<td>$user[user_name]</td>"
	."<td>$user[user_role]</td>"
	// ."<td>$user[user_ban]</td>";
	."<td><select>
	<option value=\"$ban\">нет</option>
	<option value=\"$neban\">да</option>
	</select></td>";
	$con .= '</tr>';
}
$con .= '</tbody>';
$con .= '</table>';
$con .= '</form>';
return $con;
?>
<!-- 

$con = "<h1>Таблица пользователей</h1>";
$con .= '<table>';
$con .= '<thead><tr><th>user_id</th><th>user_name</th><th>user_role</th><th>user_ban</th></tr></thead>';
$con .= '<tbody>';
foreach($data as $user){
	$ban = $user['user_ban'];
	$neban = !$ban;
	$con .= '<tr>';	
	$con .= "<td>$user[user_id]</td>"
	."<td>$user[user_name]</td>"
	."<td>$user[user_role]</td>"
	// ."<td>$user[user_ban]</td>";
	."<td><select>
	<option value=\"$ban\">нет</option>
	<option value=\"$neban\">да</option>
	</select></td>";
	$con .= '</tr>';
}
$con .= '</tbody>';
$con .= '</table>'; -->