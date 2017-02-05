<?php 

header("Content-type: text/html; charset=utf8");

session_start();

require_once "./php/db.php";


$sql = $link->query("SELECT * FROM `users` WHERE id = '1'");

while ($row = $sql -> fetch_array()) {
	$arrayData = $row;
}


$imgRoomAll = explode(',', $arrayData['img_room']);
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
							<?php foreach ($imgRoomAll as $key => $value) :?>
								<?php if ($imgRoomAll[$key] != "") :?>
									<img src="/module4/php/<?=$imgRoomAll[$key];?>" alt="Фото квартиры-<?=$key;?>" width="100">
									<label>
										Удалить
										<input type="checkbox" form="form-lk" name="del[]" value="<?=$key;?>">
									</label>
								<?php endif;?>
							<?php endforeach;?>
						</div>

					<form id="form-lk" method="POST" action="/module4/php/lk.php" enctype="multipart/form-data">		
						<input type="text" name="login" placeholder="Логин" value="<?=$arrayData['login'];?>">
						<input type="text" name="first_name" placeholder="Имя" value="<?=$arrayData['first_name'];?>">
						<input type="text" name="last_name" placeholder="Фамилия" value="<?=$arrayData['last_name'];?>">
						<input type="email" name="email" placeholder="Email" value="<?=$arrayData['email'];?>">
						<input type="password" name="pass" placeholder="Пароль">
						<input type="tel" name="phone" placeholder="Телефон"  value="<?=$arrayData['phone'];?>">
						<p>Загрузите фото профиля</p>
						<input type="file" name="avatar">
						<input type="text" name="address" placeholder="Адрес" value="<?=$arrayData['address'];?>">
						<p>Загрузите фото жилья</p>
						<input type="file" name="img_room[]" multiple>
						<textarea  name="info" placeholder="Информация о себе"><?=$arrayData['info'];?></textarea>
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