<?php

	$server="localhost";
	$username="root";
	$password="";
	$dbname="msa";

	$conn = new mysqli($server, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die();
	}

?>