<?php 

header("Content-type: text/html; charset=utf8");

//session_start();

require_once "./php/db.php";


$sql = $link->query("SELECT * FROM `users`");


while ($row = $sql -> fetch_all(MYSQLI_ASSOC)) {
	$dataUsers = $row;
}



?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/module4/styles.css">
		<title>Найти вписку</title>
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
				<div class="title">Все пользователи</div>
				<div class="item hr_bottom"></div>
				<div class="item left item-full">
					<div class="sort">Сортировать по: <span class="dotted">рейтингу</span><span class="dotted">адресу</span><span class="dotted">имени</span></div>

					<?php foreach ($dataUsers as $users => $user) : ?>
						<?php $user['img_room'] = explode(',', $user['img_room']); ?>
						<div class="msg_item">
							<div class="msg_right">Рейтинг: <?=$user['rating'];?></div>
							<div class="msg_left">
								<div class="msg_img">
									<img src="/module4/php/<?=$user['avatar'];?>" alt="<?=$user['login'];?>-avatar">
								</div>
							</div>
							<div class="msg_center">
								<div class="msg_from"><a href="/module4/comments.php"><?=$user['first_name'];?> <?=$user['last_name'];?></a></div>
								<div class="msg_text">Комментариев: <?=$user['comments_sum'];?></div>
								<div class="msg_rating">Сколько звёзд поставите пользователю? 1 2 3 4 5</div>
								<div class="showInfo">Показать инфу о пользователе</div>
								<div class="profileInfo">
									<p>Телефон: <?=$user['phone'];?></p>
									<p>Почта: <?=$user['email'];?></p>
									<p>Адрес: <?=$user['address'];?></p>
									<p>Информация о себе: <?=$user['info'];?></p>
								</div>
								<div class="msg_attach">
									<?php foreach ($user['img_room'] as $images => $image) :?>
										<?php if ($image != "") :?>
											<img src="/module4/php/<?=$image;?>" alt="Фото квартиры-<?=$image;?>" width="100">
										<?php endif;?>
									<?php endforeach;?>
								</div>
								<div class="msg_send"><a href="#">Отправить сообщение</a></div>
							</div>
						</div>
					<?php endforeach;?>


				</div>
			</div>
		</div>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script> 
		<script type="text/javascript" src="/module4/script.js"></script>
	</body>
</html>