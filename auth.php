<?php
session_start();

require_once('include/db.php');

// if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
if ( isset($_POST['email']) && isset($_POST['password']) )
{
	try {
		$sql = "SELECT id, username, email FROM users WHERE email = :email AND password = :password";
		$stmt = $conn->prepare($sql);
		// $stmt->bindValue('email', );
		// $stmt->bindValue('password', sha1());
		$stmt->execute(array(
			':email' => $_POST['email'],
			':password' => sha1($_POST['password'])
		));
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		if ( $user )
		{
			//სწორად ჩაწერა
			$_SESSION['is_logged'] = 1;
			$_SESSION['email'] = $user['email'];
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['username'] = $user['username'];
			$_SESSION['ff'] = sha1($user['id'] . uniqid() . rand(1, 100000));
			header('Location: index.php');
		}
		else
		{
			$_SESSION['message'] = 'error';
			header('Location: login.php');
		}
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}