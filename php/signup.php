<?php 

header("Content-type: text/html; charset=utf8");

session_start();

require_once "db.php";


if (isset($_POST['go-signup'])) {

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
		$pass = md5(trim(htmlspecialchars($_POST['pass'])));

		$avatar = $_FILES['avatar'];
		$img_room = $_FILES['img_room'];

		if (!$img_room['name'][0]) {

			echo "Изображений нет";

		} else {

			echo "Изображение есть";

			$imgRoomDir = "users/img-room";
			$imgRoom_name_arr = "";
			@mkdir($imgRoomDir, 0777);

			if (count($img_room['name']) > 1) {

			echo "Изображений больше 1";

				for ($i = 0; $i < count($img_room['name']); $i++) {

					$imgRoom_tmp = $img_room['tmp_name'][$i];

					if (is_uploaded_file($imgRoom_tmp)) {

						$imgRoom_name = iconv(mb_detect_encoding( basename($img_room['name'][$i])),'windows-1251',"$imgRoomDir/".basename($img_room['name'][$i]));

						move_uploaded_file($imgRoom_tmp, $imgRoom_name);
						$imgRoom_name =iconv('windows-1251', 'UTF-8', $imgRoom_name);
					}

					$imgRoom_name_arr .= $imgRoom_name.",";
				}

			} else {

				echo "Изображение одно";

				$imgRoom_tmp = $img_room['tmp_name'][0];

				if (is_uploaded_file($imgRoom_tmp)) {

					$imgRoom_name_arr = iconv(mb_detect_encoding( basename($img_room['name'][0])),'windows-1251',"$imgRoomDir/".basename($img_room['name'][0]));

					move_uploaded_file($imgRoom_tmp, $imgRoom_name_arr);
					$imgRoom_name_arr =iconv('windows-1251', 'UTF-8', $imgRoom_name_arr);
				}

			}
		}

		if ($avatar['tmp_name']) {

			$avatarDir = "users/avatar";

			@mkdir($avatarDir, 0777);

			$avatar_tmp = $avatar['tmp_name'];

			if (is_uploaded_file($avatar_tmp)) {

				$avatar_name = iconv(mb_detect_encoding( basename($avatar['name'])),'windows-1251',"$avatarDir/".basename($avatar['name']));
				move_uploaded_file($avatar_tmp, $avatar_name);
				$avatar_name =iconv('windows-1251', 'UTF-8', $avatar_name);
			}

		}


		$link->query("INSERT INTO users(login, first_name, last_name, email, phone, pass, avatar, address, img_room, info) VALUES ('{$login}','{$first_name}','{$last_name}','{$email}','{$phone}','{$pass}','{$avatar_name}','{$address}','{$imgRoom_name_arr}','{$info}')");

			
	}
		
	if ($link->affected_rows == 1) {
		echo "Отправка выполнена";
	} else {
		echo "Ничего нет вышло(";
	}
	}

		