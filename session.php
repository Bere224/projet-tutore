<?php
session_start();

$is_connected=false;

if(isset($_SESSION['login_id']))
{
	$is_connected=true;
}

function is_connected()
{
	global $is_connected;
	return $is_connected;
}

?>