<?php 
$s = $_GET['s'];
 ?>
 <?php
require_once('include/db.php');

try {
	$sql = "SELECT tweets.id, tweets.content, tweets.user_id, unix_timestamp(tweets.add_date) as add_date,
			users.username
		FROM tweets 
		JOIN users ON tweets.user_id = users.id
		WHERE tweets.content LIKE ?
		ORDER BY id DESC";

		$stmt = $conn->prepare($sql);
		$stmt->execute(array("%$s%"));

	$tweets = array();
	while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) )
	{
		$row['date'] = date('d/m/Y H:i', $row['add_date']);
		$tweets[] = $row;
	}

	echo json_encode($tweets);
}
catch ( PDOException $e )
{
	echo $e->getMessage();
}