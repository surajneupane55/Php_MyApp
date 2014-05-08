<?php

/* $dsn= 'mysql:dbname=as_754979fd4dcbfcb;host=191.235.136.58';
$user = 'b2218f51d4a66e';
$password = '41aad140';
 $opt = array(
    PDO::ATTR_ERRMODE             => PDO::ERRMODE_EXCEPTION,
    // other options 
);
try 
{
 
	$dbh = new PDO($dsn, $user, $password,$opt);
} */
  



  
   $dsn = 'mysql:dbname=Php_Project;host=localhost';
$user = 'root';
$password = 'surajnew55';    
$opt = array(
    PDO::ATTR_ERRMODE             => PDO::ERRMODE_EXCEPTION,
    // other options 
);
try 
{
 
	$dbh = new PDO($dsn, $user, $password,$opt);
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
