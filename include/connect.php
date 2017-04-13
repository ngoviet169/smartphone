<?php

	$dsn = 'mysql:host=localhost;dbname=smartphone';
	// Set options
	$options = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	);
	// Create a new PDO instanace
	try {
	$db = new PDO($dsn, 'root', '', $options);
	}
	// Catch any errors
	catch (PDOException $e) {
	echo $e->getMessage();
	exit();
	}
	/*
	$dbhost = 'localhost';
	$dbname = 'smartphone';
	$username = 'root';
	$password = '';

	$conn = mysql_connect($dbhost, $username, $password);

	mysql_select_db($dbname);
	*/
?>