<?php 

header("Content-type: text/html; charset=utf8");

require_once "db.php";

session_start();

if (isset($_POST['go-login'])) {


	if (isset($_POST['login']) && isset($_POST['pass'])) {

		$login = htmlspecialchars($_POST['login']);
		$pass = md5(htmlspecialchars($_POST['pass']));

        $sql = $link->query("SELECT id, login FROM `users` WHERE login = '{$login}' AND pass = '{$pass}' LIMIT 1");

        while ($row = $sql -> fetch_assoc()) {
				$dataUser = $row;
		}

        if ($link->affected_rows != 1) {
        	header("Location: /module4/login.php");
		} else {
			echo "Вход выполнен";
			$_SESSION['user_id'] = $dataUser['id'];
			$_SESSION['user_login'] = $dataUser['login'];
			header("Location: /module4/lk.php");
		}
	}

	$link -> close();

}
?>
