<?php
require_once('include/db.php');

$lastTweetId = (!isset($_GET['lastTweetId']) || !is_numeric($_GET['lastTweetId'])) ?
	0 :
	$_GET['lastTweetId'];

if ( $lastTweetId == 0 ) die();

try {
	$sql = "SELECT tweets.id, tweets.content, tweets.user_id, unix_timestamp(tweets.add_date) as add_date,
			users.username
		FROM tweets 
		JOIN users ON tweets.user_id = users.id
		WHERE tweets.id > :lastTweetId
		ORDER BY id DESC";

	$stmt = $conn->prepare($sql);
	$stmt->execute(array(':lastTweetId' => $lastTweetId));

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