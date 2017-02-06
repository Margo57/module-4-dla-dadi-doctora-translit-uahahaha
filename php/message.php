<?php 

header("Content-type: text/html; charset=utf8");

require_once "db.php";

if (isset($_POST['go-message'])) {

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
		$text_message = trim(htmlspecialchars($_POST['text_message']));
		$time_message = date('Y-m-d H:i:s');


		$link->query("INSERT INTO messages(id_user, id_author, text_message, time_message) VALUES ('{$id_user}','{$id_author}','{$text_message}','{$time_message}')");

		if ($link->affected_rows == 1) {
			header('Location: /module4/search.php');
		} else {
			echo "Ничего нет вышло(";
		}
}
echo $textError;
}
		