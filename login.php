<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/module4/styles.css">
		<title>Авторизация</title>
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
				<div class="title">Авторизуйтесь для доступа к личному кабинету</div>
				<div class="item hr_bottom"></div>
				<div class="item left item-full">
					<form method="POST" action="/module4/php/login.php">
						<input type="text" name="login" placeholder="Логин">
						<input type="password" name="pass" placeholder="Пароль">
						<input type="submit" value="Войти" name="go-login">
					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script> 
		<script type="text/javascript" src="/module4/script.js"></script>
	</body>
</html>