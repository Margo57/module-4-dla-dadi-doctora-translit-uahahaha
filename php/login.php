<?php 

header("Content-type: text/html; charset=utf8");

session_start();

require_once "db.php";


if (isset($_POST['go-login'])) {


	if (isset($_POST['login']) && isset($_POST['pass'])) {

		$login = htmlspecialchars($_POST['login']);
		$pass = md5(htmlspecialchars($_POST['pass']));

        $sql = $link->query("SELECT login, pass FROM `users` WHERE login = '{$login}' AND pass = '{$pass}' LIMIT 1");

        if ($link->affected_rows != 1) {
        	echo "Вход не выполнен";
		} else {
			echo "Осуществляем вход";
		}
	}

	$link -> close();


}
?>
