<?php
require '../server.php';
ob_start();
session_start(); 
$current_file = $_SERVER['SCRIPT_NAME'];

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))
{
	$http_referer = $_SERVER['HTTP_REFERER'];
}
function loggedin()
{
	if(isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id']))
	{
		return true;
	}
	else
	{
		return false;
	}
}


function getuserfield($field)
{
	global $con;

	$query = $con->query("SELECT ".$field." FROM admins WHERE id='".$_SESSION['admin_id']."'");
	$query->execute();
	$fetch = $query->fetch();

	$return_field = $fetch[$field];

	return $return_field;	
}
?>