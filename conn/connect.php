<?php 

require_once('config.php');
$con = new mysqli(HOST,USERNAME,PASSWORD,DB);

$create_table = "CREATE TABLE EIC
		(
			id 			INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			studentid 	VARCHAR(30) NOT NULL,
			password    VARCHAR(100) NOT NULL,
			grade		INT(6) UNSIGNED
		)";

$con->query($create_table)

?>