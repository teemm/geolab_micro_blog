<?php
session_start();

require_once('include/db.php');

if ( ! isset($_SESSION['is_logged']) )
{
	header("Location: login.php");
}

$content = $_POST['content'];

if ( strlen($content) == 0 || strlen($content) > 140 )
{
	$_SESSION['error'] = 1;
	$_SESSION['error_message'] = 'ტვიტი უნდა იყოს მაქსიმუმ 140 სიმბოლო';
	header("Location: index.php");
	die();
}

try {
	$sql = "INSERT INTO tweets (content, user_id) VALUES (:content, :user_id)";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue('content', $content);
	$stmt->bindValue('user_id', $_SESSION['user_id']);
	$insert = $stmt->execute();

	header("Location: index.php");
}
catch (PDOException $e)
{
	echo $e->getMessage();
}