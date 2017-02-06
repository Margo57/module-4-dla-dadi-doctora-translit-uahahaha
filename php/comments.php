<?php 

header("Content-type: text/html; charset=utf8");

//session_start();

require_once "db.php";

if (isset($_POST['go-comment'])) {
$textError = "Гооо";
	$textError = "";
	$flagWell = true;

	//проверка все ли поля заполнены
	foreach ($_POST as $key => $value) {
		if (!isset($_POST[$key])) {
			$flagWell = false;
			break;
		}
	}

	if (!$flagWell) {
		$textError = "Заполните все обязательные поля!";
	} else {
		$id_user = $_POST['id_user'];
		$id_author = $_POST['id_author'];
		$text_comment = trim(htmlspecialchars($_POST['text_comment']));
		$time_comment = date("H:i:s");


		$link->query("UPDATE `users` SET `comments_sum` = `comments_sum` + 1 WHERE id='{$id_user}'");


		$link->query("INSERT INTO comments(id_user, id_author, text_comment, time_comment) VALUES ('{$id_user}','{$id_author}','{$text_comment}','{$time_comment}')");

		if ($link->affected_rows == 1) {
			echo "Отправка выполнена";
		} else {
			echo "Ничего нет вышло(";
		}
}
echo $textError;
}
		