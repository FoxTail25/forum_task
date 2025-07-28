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

$con = "<h1>hello from users!</h1>";
$con .= '<ul>';
foreach($data as $user){
	$con .= '<li>';	
	$con .= "<span class=\"ps-2\">$user[user_id]</span>"
	."<span class=\"ps-2\">$user[user_name]</span>"
	."<span class=\"ps-2\">$user[user_role]</span>"
	."<span class=\"ps-2\">$user[user_ban]</span>";
	$con .= '</li>';
}
$con .= '</ul>';
return $con;
?>