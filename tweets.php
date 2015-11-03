<?php
session_start();
require_once('include/db.php');

$sql = "SELECT tweets.id, tweets.content, tweets.user_id, unix_timestamp(tweets.add_date) as add_date,
		users.username
	FROM tweets 
	JOIN users ON tweets.user_id = users.id
	ORDER BY id DESC";
$stmt = $conn->query($sql);

$tweets = array();

while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) )
{
	$row['date'] = date('d/m/Y H:i', $row['add_date']);
	$tweets[] = $row;
}