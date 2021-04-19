<?php
$database_name="mysql:host=localhost;dbname=restaurant"; 
$user="root";
$password="";
$options=array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8');//to support arabic
try
{
	$connection=new PDO($database_name,$user,$password,$options);
}
catch(PDOException $e)
{
	echo $e->getMessage();
	
}
?>