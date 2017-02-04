<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="/module4/styles.css">
		<title>Регистрация</title>
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
				<div class="title">Зарегистрируйтесь для доступа к личному кабинету</div>
				<div class="item hr_bottom"></div>
				<div class="item left item-full">
					<form method="POST" action="php/signup.php" enctype="multipart/form-data">
						<input type="text" name="login" placeholder="Логин" >
						<input type="text" name="first_name" placeholder="Имя" >
						<input type="text" name="last_name" placeholder="Фамилия" >
						<input type="email" name="email" placeholder="Email" >
						<input type="password" name="pass" placeholder="Пароль" >
						<input type="tel" name="phone" placeholder="Телефон" >
						<p>Загрузите фото профиля</p>
						<input type="file" name="avatar" >
						<input type="text" name="address" placeholder="Адрес" >
						<p>Загрузите фото жилья</p>
						<input type="file" name="img_room[]" multiple >
						<textarea  name="info" placeholder="Информация о себе" ></textarea>
						<input type="submit" value="Войти"  name="go-signup">
					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script> 
	</body>
</html>