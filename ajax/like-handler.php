<?php
require_once "../html/session.php";
require_once "../classes/dbh.class.php";
require_once "../config/config.php";
require_once "../classes/favourites.class.php";

// get the chilliID and userID from the AJAX request
$chilliID = $_POST['chilliID'];
$userID = $_POST['userID'];

// create a new instance of the favHandling class
$fav = new favHandling($host, $user, $dbpwd, $dbName);

// call the chilliLikes method of the favHandling class with the chilliID and userID
$response = $fav->chilliLikes($userID, $chilliID);

// return the response
echo $response;
