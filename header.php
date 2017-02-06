<?php 

header("Content-type: text/html; charset=utf8");

require_once "./php/db.php";

session_start();
$authorization = false;

if (isset($_SESSION['user_id'])){
	$authorization = true;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/module4/styles.css">
		<title>Тур-жильё</title>
	</head>
	<body>
		<header>
			<div class="content">
				<div class="right">
					<div class="container">
						<?php if (!$authorization) : ?>
							<a href="/module4/login.php"><span>Вход</span></a>
							<a href="/module4/signup.php"><span>Регистрация</span></a>
							<?php else : ?>
								<form method="post" action="">
									<input type='button' class="button" name='exit' onclick='confirm("Вы действительно хотите выйти?") ? location.href = "/module4/php/exit.php" : false;' value='Выйти'/>
								</form>
							<?php endif; ?>
						</div>
					</div>

				<div class="left">
					<a href="/module4/index.php"><span class="logo">Тур-жильё</span></a>

					<?php if ($authorization) : ?>
						<a href="/module4/search.php"><span>Найти вписку</span></a>
						<a href="/module4/lk.php"><span>Личный кабинет</span></a>
					<?php endif; ?>

				</div>
			</div>
		</header>