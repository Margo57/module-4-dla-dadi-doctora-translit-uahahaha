<?php 

header("Content-type: text/html; charset=utf8");

require_once "db.php";

if (isset($_POST['ratingNum']) <= 5 && isset($_POST['idUser']) && isset($_POST['idAuthor'])) {

	$ratingNum = $_POST['ratingNum'];
	$idUser = $_POST['idUser'];
	$idAuthor = $_POST['idAuthor'];

	$sql = $link->query("SELECT rating, rating_sum, rating_user_selected FROM users WHERE id='{$idUser}'");

	while ($row = $sql -> fetch_assoc()) {
		$dataRating = $row;
	}

	$dataRating['rating'] = ($dataRating['rating'] * $dataRating['rating_sum'] + $ratingNum) / ++$dataRating['rating_sum'];
	$dataRating['rating_user_selected'] .= $dataRating['rating_user_selected'] != "" ? ",".$idAuthor : $idAuthor;
	
	$sql = $link->query("UPDATE `users` SET rating = '{$dataRating['rating']}', rating_sum = '{$dataRating['rating_sum']}', rating_user_selected='{$dataRating['rating_user_selected']}' WHERE id='{$idUser}'");
		
		if ($sql) {
			header("Location: /module4/search.php");
		} else {
			echo "Ничего нет вышло(";
		}


} else {
	echo "Не получилось проголосовать, попробуйте позже.";
}