<?php 
session_start();

if (!isset($_POST['ff'])  || $_POST['ff'] != $_SESSION['ff'])
{
	header('location:index.php');
	die();
}
$_SESSION['is_logged'] = 0;
header('location:index.php');
 ?>