<?php 

header("Content-type: text/html; charset=utf8");

session_start();

require_once "./php/db.php";


$sql = $link->query("SELECT * FROM `users` WHERE id = '31'");

while ($row = $sql -> fetch_array()) {
	$arrayData = $row;
}

$img_room_array = explode(',', $arrayData['img_room']);
print_r($img_room_array);
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/module4/styles.css">
		<title>Личный кабинет</title>
	</head>
	<body>
	<header>
			<div class="content">
				<div class="right">
					<div class="container">
						<a href="/module4/login.php"><span>Вход</span></a>
						<a href="/module4/signup.php"><span>Регистрация</span></a>
					</div>
				</div>
				<div class="left">
					<a href="/module4/index.php"><span class="logo">Тур-жильё</span></a>
					<a href="/module4/search.php"><span>Найти вписку</span></a>
					<a href="/module4/lk.php"><span>Личный кабинет</span></a>
				</div>
			</div>
		</header>
		<div id="content">
			<div class="listCard list-full">
				<div class="title editInfoTitle">Редактирование личной информации</div>
				<div class="item hr_bottom"></div>
				<div class="item left item-full editInfo">
						<img src="/module4/php/<?=$arrayData['avatar'];?>" alt="Ваша аватарка" class="avatar" width="250px">
						<div class="delAcc"><a href="/module4/deleteAccount" class="button">Удалить страницу</a></div>
						<div class="houses">
						<?php for ($i=0; $i < count($img_room_array)-1; $i++) :?>
							<img src="/module4/php/<?=$img_room_array[$i];?>" alt="Фото хаты<?=$i;?>" data-i-img="<?=$i;?>">
							<label for="del-<?=$i;?>">Удалить</label>
						<?php endfor;?>

						</div>
					<form method="POST" action="/module4/php/lk.php" enctype="multipart/form-data">

						<fieldset>
							<?php for ($i=0; $i < count($img_room_array)-1; $i++) :?>
								<input type="checkbox" name="del[]" value="<?=$i;?>" id="del-<?=$i;?>">
							<?php endfor;?>
						</fieldset>
						

						<input type="text" name="login" placeholder="Логин" value="<?=$arrayData['login'];?>" required>
						<input type="text" name="first_name" placeholder="Имя" value="<?=$arrayData['first_name'];?>" required>
						<input type="text" name="last_name" placeholder="Фамилия" value="<?=$arrayData['last_name'];?>" required>
						<input type="email" name="email" placeholder="Email" value="<?=$arrayData['email'];?>" required>
						<input type="password" name="pass" placeholder="Пароль">
						<input type="tel" name="phone" placeholder="Телефон"  value="<?=$arrayData['phone'];?>" required>
						<p>Загрузите фото профиля</p>
						<input type="file" name="avatar">
						<input type="text" name="address" placeholder="Адрес" value="<?=$arrayData['address'];?>" required>
						<p>Загрузите фото жилья</p>
						<input type="file" name="img_room[]" multiple>
						<textarea  name="info" placeholder="Информация о себе" required><?=$arrayData['info'];?></textarea>
						<input type="submit" value="Войти"  name="go-lk">
					</form>

				</div>
			</div>
			<div class="listCard list-full">
				<div class="title">Сообщения</div>
				<div class="item hr_bottom"></div>
				<div class="item left item-full">
					<div class="msg_item">
						<div class="msg_right">11:13</div>
						<div class="msg_left">
							<div class="msg_img">
								<img src="/module4/img/cat.jpg">
							</div>
						</div>
						<div class="msg_center">
							<div class="msg_from">Ваня Стручков</div>
							<div class="msg_text">Привет, очень нравится твоя хата, можешь приютить?</div>
						</div>
					</div>
					<div class="msg_item">
						<div class="msg_right">11:13</div>
						<div class="msg_left">
							<div class="msg_img">
								<img src="/module4/img/cat2.jpg">
							</div>
						</div>
						<div class="msg_center">
							<div class="msg_from">Ваня Стручков</div>
							<div class="msg_text">Привет, очень нравится твоя хата, можешь приютить?</div>
						</div>
					</div>
					<div class="msg_item">
						<div class="msg_right">11:13</div>
						<div class="msg_left">
							<div class="msg_img">
								<img src="/module4/img/cat.jpg">
							</div>
						</div>
						<div class="msg_center">
							<div class="msg_from">Ваня Стручков</div>
							<div class="msg_text">Привет, очень нравится твоя хата, можешь приютить?</div>
						</div>
					</div>
					<div class="msg_item">
						<div class="msg_right">11:13</div>
						<div class="msg_left">
							<div class="msg_img">
								<img src="/module4/img/cat2.jpg">
							</div>
						</div>
						<div class="msg_center">
							<div class="msg_from">Ваня Стручков</div>
							<div class="msg_text">Привет, очень нравится твоя хата, можешь приютить?</div>
						</div>
					</div>
					<div class="msg_item">
						<div class="msg_right">11:13</div>
						<div class="msg_left">
							<div class="msg_img">
								<img src="/module4/img/cat.jpg">
							</div>
						</div>
						<div class="msg_center">
							<div class="msg_from">Ваня Стручков</div>
							<div class="msg_text">Привет, очень нравится твоя хата, можешь приютить?</div>
						</div>
					</div>
					<div class="msg_item">
						<div class="msg_right">11:13</div>
						<div class="msg_left">
							<div class="msg_img">
								<img src="/module4/img/cat2.jpg">
							</div>
						</div>
						<div class="msg_center">
							<div class="msg_from">Ваня Стручков</div>
							<div class="msg_text">Привет, очень нравится твоя хата, можешь приютить?</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script> 
		<script type="text/javascript" src="/module4/script.js"></script>
	</body>
</html>