<?php
//local DB-Credentials
$host = "localhost";
$user = "root";
$dbpwd = "root"; //change to nothing if using windows
$dbName = "a_chilli_db";



define('IMAGE_FOLDER', 'chillidb');
define('IMAGE_PATH', 'assets/images/' . IMAGE_FOLDER); //change to your root --> i think its a bit strange that it has to be this short for me, it should be the one down under... check if this works for you
//define('IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/Modulprojekt_5204/src/assets/images/' . IMAGE_FOLDER); 