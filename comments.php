<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/styles.css">
		<title>Профиль пользователя</title>
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
				<div class="title">Профиль пользователя</div>
				<div class="item hr_bottom"></div>
				<div class="item left item-full">
					<div class="msg_item">
						<div class="msg_right">Рейтинг: 4.7</div>
						<div class="msg_left">
							<div class="msg_img">
								<img src="/module4/img/cat.jpg">
							</div>
						</div>
						<div class="msg_center">
							<div class="msg_from"><a href="/comments">Ваня Стручков</a></div>
							<div class="msg_text">Комментариев: 228</div>
							<div class="msg_rating">Сколько звёзд поставите пользователю? 1 2 3 4 5</div>
							<div class="showInfo">Показать инфу о пользователе</div>
							<div class="profileInfo">
								<p>Телефон: 797564</p>
								<p>Почта: фывфывфыв</p>
								<p>Адрес: фывфывфыв</p>
								<p>Информация о себе: фывфывфы</p>
							</div>
							<div class="msg_attach">
								<img src="/module4/img/house.jpg" alt="Хата"><img src="/img/house.jpg" alt="Хата"><img src="/img/house.jpg" alt="Хата">
							</div>
							<div class="msg_send"><a href="#">Отправить сообщение</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="listCard list-full">
				<div class="title">Комментарии</div>
				<div class="item hr_bottom"></div>
				<div class="item left item-full">
					<form class="send_comments">
						<textarea placeholder="Введите комментарий"></textarea>
						<input type="submit" value="Отправить">
					</form>
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