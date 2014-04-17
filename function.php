<?php
/* Connect to an MySQL database using driver invocation */
$dsn = 'mysql:dbname=Php_Project;host=localhost';
$user = 'root';
$password = 'surajnew55';
try 
{
 
	$dbh = new PDO($dsn, $user, $password);
} 
catch (PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();
}

function sanitizeString($var)
{
	$var = strip_tags($var);
	$var = htmlentities($var);
	$var = stripslashes($var);
	return mysql_real_escape_string($var);
}
?>
