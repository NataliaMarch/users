<?php

include_once './library/DBConnect.php';
$dbC = new DBConnect();
$users = $dbC->getAllUsers();
$table_of_users = '<table> <tr> <th>id</th><th>login</th> <th>email</th> <th>delete user</th></tr>';
for ($i = 0; $i < count($users); $i++) {
    $table_of_users.='<tr>';
    $table_of_users.='<td>' . $users[$i]["id"] . '</td>';
    $table_of_users.='<td>' . $users[$i]["login"] . '</td>';
    $table_of_users.='<td>' . $users[$i]["email"] . '</td>';
    $table_of_users.='<td><form method="POST"  action="json.php">';
    $table_of_users.="<input type='submit' value='delete'/> <input type='hidden' name=" . $i . " value='" . $users[$i]["id"] . "'/>";
    $table_of_users.='</form>';
    $table_of_users.='</td>';
    $table_of_users.='</tr>';
}
$table_of_users.='</table>';
if (isset($_SESSION['user'])) {
    echo 'Please log in first!';
} else {
    echo $table_of_users;
}
