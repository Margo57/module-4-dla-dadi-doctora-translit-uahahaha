<?php 

header("Content-type: text/html; charset=utf8");

session_start();

require_once "db.php";


$sql = $link->query("SELECT * FROM `users` WHERE id = '31'");

while ($row = $sql -> fetch_array()) {
	$arrayData = $row;
}
$img_room_array = explode(',', $arrayData['img_room']);


if (isset($_POST['go-lk'])) {

	if (isset($_POST['login']) 
		&& isset($_POST['first_name'])
		&& isset($_POST['last_name'])
		&& isset($_POST['email'])
		&& isset($_POST['phone'])
		&& isset($_POST['address'])
		&& isset($_POST['info'])
		) {

		$login = trim(htmlspecialchars($_POST['login']));
		$first_name = trim(htmlspecialchars($_POST['first_name']));
		$last_name = trim(htmlspecialchars($_POST['last_name']));
		$email = trim(htmlspecialchars($_POST['email']));
		$phone = trim(htmlspecialchars($_POST['phone']));
		$address = trim(htmlspecialchars($_POST['address']));
		$info = trim(htmlspecialchars($_POST['info']));
		$del = $_POST['del'];

		$pass = $_POST['pass'] ? md5(trim(htmlspecialchars($_POST['pass']))) :  $arrayData['pass'];


		if (isset($_POST['del'])) {
			$del = $_POST['del'];

		
			for ($i = 0; $i < count($del); $i++) {

					unset($img_room_array[$del[$i]]);

			}
		}
		$img_room_array = implode(',',$img_room_array);	


		$avatar = $_FILES['avatar'];
		$img_room = $_FILES['img_room'];

		if (!$img_room['name'][0]) {

			echo "Изображений нет";
			$imgRoom_name_arr = $img_room_array;

		} else {

			echo "Изображение есть";

			$imgRoomDir = "users/img-room";
			@mkdir($imgRoomDir, 0777);

			if (count($img_room['name']) > 1) {

			echo "Изображений больше 1";

				for ($i = 0; $i < count($img_room['name']); $i++) {

					$imgRoom_tmp = $img_room['tmp_name'][$i];

					if (is_uploaded_file($imgRoom_tmp)) {

						$imgRoom_name = iconv(mb_detect_encoding( basename($img_room['name'][$i])),'UTF-8',"$imgRoomDir/".basename($img_room['name'][$i]));

						move_uploaded_file($imgRoom_tmp, $imgRoom_name);
					}

					$imgRoom_name_arr .= $imgRoom_name.",";
				}

			} else {

				echo "Изображение одно";

				$imgRoom_tmp = $img_room['tmp_name'][0];

				if (is_uploaded_file($imgRoom_tmp)) {

					$imgRoom_name_arr = iconv(mb_detect_encoding( basename($img_room['name'][0])),'UTF-8',"$imgRoomDir/".basename($img_room['name'][0]));

					move_uploaded_file($imgRoom_tmp, $imgRoom_name_arr);
				}


				$imgRoom_name_arr .= ",".$img_room_array;

			}
		}

		if ($avatar['tmp_name']) {

			$avatarDir = "users/avatar";

			@mkdir($avatarDir, 0777);

			$avatar_tmp = $avatar['tmp_name'];

			if (is_uploaded_file($avatar_tmp)) {

				$avatar_name = iconv(mb_detect_encoding( basename($avatar['name'])),'UTF-8',"$avatarDir/".basename($avatar['name']));
				move_uploaded_file($avatar_tmp, $avatar_name);

			}

		} else {

			$avatar_name = $arrayData['avatar'];

		}


		$link2 = $link->query("UPDATE `users` SET login = '{$login}', first_name = '{$first_name}', last_name='{$last_name}', email='{$email}', phone='{$phone}', pass='{$pass}', avatar='{$avatar_name}', address='{$address}', img_room='{$imgRoom_name_arr}', info='{$info}' WHERE id='31'");
		
		if ($link2) {
			echo "Отправка выполнена";
		} else {
			echo "Ничего нет вышло(";
		}
	}
}

		