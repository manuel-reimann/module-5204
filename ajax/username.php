<?php
require("../config/config.php");
require("../classes/dbh.class.php");
//sanitzie user input
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
//instanciate Database Connection
$dbInst = new DatabaseConnection($host, $user, $dbpwd, $dbName);
//prepare query
$query = "SELECT username FROM users WHERE username = :username";
// prepare and execute the query, parameterized to prevent SQL injection 
$stmt = $dbInst->prepare($query);
$stmt->bindParam(':username', $username);
$stmt->execute();
$result = $stmt->fetch();
//does the email exist in the db?
if ($result) {
    // yes
    $check = true;
} else {
    // no
    $check = false;
}
//send back $check variable as json object
header('Content-Type: application/json');
echo json_encode($check);
