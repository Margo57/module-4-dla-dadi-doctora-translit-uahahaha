<?php 

header("Content-type: text/html; charset=utf8");

require_once "db.php";


if (isset($_POST['go-signup'])) {

	$textError = "";
	$flagWell = true;

	//проверка все ли поля заполнены
	foreach ($_POST as $key => $value) {
		if (!isset($_POST[$key])) {
			$flagWell = false;
			break;
		}
	}

	//проверка все ли поля с файлами заполнены
	if (!$_FILES['avatar']['name'] || !$_FILES['img_room']['name'][0]) $flagWell = false;

	if (!$flagWell) {
		$textError = "Заполните все обязательные поля!";
	} else {

		$login = trim(htmlspecialchars($_POST['login']));
		$link->query("SELECT login FROM `users` WHERE login = '{$login}'");
		$flagWell = $link->affected_rows < 1;
		
        if (!$flagWell) {
        	$textError = "Пользователь с таким именем уже существует, попробуйте заного!";
        } else {

		$first_name = trim(htmlspecialchars($_POST['first_name']));
		$last_name = trim(htmlspecialchars($_POST['last_name']));
		$email = trim(htmlspecialchars($_POST['email']));
		$phone = trim(htmlspecialchars($_POST['phone']));
		$address = trim(htmlspecialchars($_POST['address']));
		$info = trim(htmlspecialchars($_POST['info']));
		$pass = md5(trim(htmlspecialchars($_POST['pass'])));
		$avatar = $_FILES['avatar'];
		$img_room = $_FILES['img_room'];

		//Добавление аватарки
		$avatarDir = "users/avatar";
		@mkdir($avatarDir, 0777);
		$avatar_tmp = $avatar['tmp_name'];

		if (is_uploaded_file($avatar_tmp)) {

			$avatar_name = iconv(mb_detect_encoding( basename($avatar['name'])),'windows-1251',"$avatarDir/$login-".basename($avatar['name']));
			move_uploaded_file($avatar_tmp, $avatar_name);
			$avatar_name =iconv('windows-1251', 'UTF-8', $avatar_name);
		}

		//Добавление фотографий квартиры
		$imgRoomDir = "users/img-room";
		$imgRoom_name_arr = "";
		@mkdir($imgRoomDir, 0777);

		for ($i = 0; $i < count($img_room['name']); $i++) {

			$imgRoom_tmp = $img_room['tmp_name'][$i];

			if (is_uploaded_file($imgRoom_tmp)) {

				$imgRoom_name = iconv(mb_detect_encoding( basename($img_room['name'][$i])),'windows-1251',"$imgRoomDir/$login-".basename($img_room['name'][$i]));

				while (file_exists($imgRoom_name)) {
					$exp = strrpos($imgRoom_name, '.');
					$imgRoom_name = substr($imgRoom_name, 0, $exp)."-".rand(1 , 1000000000).substr($imgRoom_name, $exp);
				}

				//загружаем файл с названием вида логин-исходное_название_изображения[-рандомное число].расширение
				move_uploaded_file($imgRoom_tmp, $imgRoom_name);

				$imgRoom_name = iconv('windows-1251', 'UTF-8', $imgRoom_name);
			}
			//если это первый элемент, то не ставим перед ним запятую
			$imgRoom_name_arr .= ($i < 1) ? $imgRoom_name : ",".$imgRoom_name;
		}		

		$link->query("INSERT INTO users(login, first_name, last_name, email, phone, pass, avatar, address, img_room, info) VALUES ('{$login}','{$first_name}','{$last_name}','{$email}','{$phone}','{$pass}','{$avatar_name}','{$address}','{$imgRoom_name_arr}','{$info}')");

		if ($link->affected_rows == 1) {
			echo "Отправка выполнена";
		} else {
			echo "Ничего нет вышло(";
		}
	}
}
echo $textError;
}


		