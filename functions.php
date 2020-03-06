<?php
include 'include/config.php';
/*
Defines functions to connect to the Database, retrieve the result and 
return them. You need several functions for different questions
*/

function getDB() {
	require_once('include/config.php');
	$host = DBHOST;
	$user = DBUSER;
	$pass = DBPASS;
	$database = DBNAME;
	$connection = mysqli_connect($host, $user, $pass, $database);

	if (!$connection) { die("Connection failed: " . mysqli_connect_error()); }
	return $connection;
}

function runQuery($db, $query) {
	$query_result = mysqli_query($db, $query);
	
	if (!empty($query_result)) { return $query_result; }
	else { echo "Query failed"; }
	return null;
}

?>