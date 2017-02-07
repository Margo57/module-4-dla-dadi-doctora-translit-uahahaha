<?php 

header("Content-type: text/html; charset=utf8");

require_once "db.php";

$sql = $link->query("SELECT * FROM `users` WHERE id = '1'");

while ($row = $sql -> fetch_array()) {
	$arrayData = $row;
}

$imgRoomAll = explode(',', $arrayData['img_room']);


if (isset($_POST['go-lk'])) {

	$textError = "";
	$flagWell = true;

	//проверка все ли поля заполнены
	foreach ($_POST as $key => $value) {
		if ($key != 'pass' && !isset($_POST[$key])) {
			$flagWell = false;
			break;
		}
	}

	if (!$flagWell) {
		$textError = "Заполните все обязательные поля!";
	} else {

		$login = trim(htmlspecialchars($_POST['login']));

		if ($login != $arrayData['login']) {
			$link->query("SELECT login FROM `users` WHERE login = '{$login}'");
			$flagWell = $link->affected_rows < 1;
		}
		
        if (!$flagWell) {
        	$textError = "Пользователь с таким именем уже существует, попробуйте заного!";
        } else {

			$first_name = trim(htmlspecialchars($_POST['first_name']));
			$last_name = trim(htmlspecialchars($_POST['last_name']));
			$email = trim(htmlspecialchars($_POST['email']));
			$phone = trim(htmlspecialchars($_POST['phone']));
			$address = trim(htmlspecialchars($_POST['address']));
			$info = trim(htmlspecialchars($_POST['info']));
			$pass = $_POST['pass'] ? md5(trim(htmlspecialchars($_POST['pass']))) :  $arrayData['pass'];

			$avatar = $_FILES['avatar'];
			$img_room = $_FILES['img_room'];


			if (isset($_POST['del'])) {
				$del = $_POST['del'];
				foreach ($del as $key => $value) {
					unlink(iconv('UTF-8', 'windows-1251', $imgRoomAll[$value]));
					unset($imgRoomAll[$value]);
				}
			}
			if (end($imgRoomAll) == '') array_pop($imgRoomAll);
			$imgRoomAll = implode(',', $imgRoomAll);	

		//Добавление фотографий квартиры
		if (!$img_room['name'][0]) {

			echo "Изображений нет";

		} else {

			echo "Изображение(я) есть";


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
				$imgRoomAll = $imgRoom_name.",".$imgRoomAll;
			}
		}

		//Добавление аватарки
		if (!$avatar['name']) {

			$avatar_name = $arrayData['avatar'];

		} else {
			
			$avatarDir = "users/avatar";
			@mkdir($avatarDir, 0777);
			$avatar_tmp = $avatar['tmp_name'];

			if (is_uploaded_file($avatar_tmp)) {

				unlink(iconv('UTF-8', 'windows-1251', $arrayData['avatar']));

				$avatar_name = iconv(mb_detect_encoding( basename($avatar['name'])),'windows-1251',"$avatarDir/$login-".basename($avatar['name']));
				move_uploaded_file($avatar_tmp, $avatar_name);
				$avatar_name =iconv('windows-1251', 'UTF-8', $avatar_name);
			}
		}


		$link2 = $link->query("UPDATE `users` SET login = '{$login}', first_name = '{$first_name}', last_name='{$last_name}', email='{$email}', phone='{$phone}', pass='{$pass}', avatar='{$avatar_name}', address='{$address}', img_room='{$imgRoomAll}', info='{$info}' WHERE id='1'");
		
		if ($link2) {
			echo "Отправка выполнена";
		} else {
			echo "Ничего нет вышло(";
		}
	}
}
echo $textError;
}
		