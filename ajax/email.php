<?php
require("../config/config.php");
require("../classes/dbh.class.php");
//sanitzie user input
$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
//instanciate Database Connection
$dbInst = new DatabaseConnection($host, $user, $dbpwd, $dbName);
//prepare query
$query = "SELECT email FROM users WHERE email = :email";
// prepare and execute the query, parameterized to prevent SQL injection 
$stmt = $dbInst->prepare($query);
$stmt->bindParam(':email', $email);
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
