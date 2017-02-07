<?php

	header("Content-type: text/html; charset=utf8");

	require_once "db.php";

	session_start(); 
	$idAuthor = $_SESSION['user_id'];

	$sql = $link->query("SELECT * FROM `users` WHERE id = '{$idAuthor}'");
	while ($row = $sql -> fetch_array()) {
		$arrayData = $row;
	}
	$imgRoomAll = explode(',', $arrayData['img_room']);

	foreach ($imgRoomAll as $images => $image) {
		unlink(iconv('UTF-8', 'windows-1251', $image));
	}
	
	unlink(iconv('UTF-8', 'windows-1251', $arrayData['avatar']));

	$link -> query("DELETE FROM users WHERE id='{$idAuthor}'");
	$link -> query("DELETE FROM comments WHERE id_user='{$idAuthor}' or id_author='{$idAuthor}'");
	$link -> query("DELETE FROM messages WHERE id_user='{$idAuthor}' or id_author='{$idAuthor}'");

	session_destroy();
?>