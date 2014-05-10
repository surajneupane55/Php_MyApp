<?php

$dsn= 'mysql:dbname=learninAJOKuZbI1;host=eu-cdbr-azure-west-a.cloudapp.net';
$user = 'bba50076bec1f7';
$password = '0ddbbb61';
 $opt = array(
    PDO::ATTR_ERRMODE             => PDO::ERRMODE_EXCEPTION,
    // other options 
);
try 
{
 
	$dbh = new PDO($dsn, $user, $password,$opt);
} 



  
/*    $dsn = 'mysql:dbname=Php_Project;host=localhost';
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
  */
    
   
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
