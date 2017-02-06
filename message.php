<?php require("header.php"); ?>
<?php 
$idUser = $_GET['idUser'] ? $_GET['idUser'] : false; //берём id пользователя на страницу которого перешли
$idAuthor = $_SESSION['user_id']; //берём id пользователя из сессии

if (!$idUser) header("Location: /module4/search.php");

//выборка данных о пользователе
$sql = $link->query("SELECT  first_name, last_name, email, phone, avatar, address, img_room, info, rating, rating_user_selected, comments_sum  FROM users WHERE id='{$idUser}'");
while ($row = $sql -> fetch_assoc()) {
	$dataUser = $row;
}
$dataUser['img_room'] = explode(',', $dataUser['img_room']);
$dataUser['rating_user_selected'] = explode(',', $dataUser['rating_user_selected']);

//выборка сообщений диалога
$sql = $link->query("SELECT first_name, last_name, avatar, text_message, time_message FROM messages, users WHERE users.id=messages.id_author AND messages.id_author = '{$idAuthor}' AND messages.id_user = '{$idUser}' OR users.id=messages.id_author AND messages.id_author = '{$idUser}' AND messages.id_user = '{$idAuthor}' ORDER BY time_message DESC");

if ($link->affected_rows >= 1) {
	while ($row = $sql -> fetch_all(MYSQLI_ASSOC)) {
		$dataMessages = $row;
	}
}

?>
<style type="text/css">
	#content .form-rating {
		width: auto;
		display: inline-block;
	}
	.form-rating input {
		display: none;
	}
</style>
		<div id="content">
			<div class="listCard list-full">
				<div class="title">Профиль пользователя</div>
				<div class="item hr_bottom"></div>
				<div class="item left item-full">
						<div class="msg_item">
							<div class="msg_right">Рейтинг: <?=$dataUser['rating'];?></div>
							<div class="msg_left">
								<div class="msg_img">
									<img src="/module4/php/<?=$dataUser['avatar'];?>" alt="<?=$dataUser['login'];?>-avatar">
								</div>
							</div>
							<div class="msg_center">
								<div class="msg_from"><?=$dataUser['first_name'];?> <?=$dataUser['last_name'];?></div>
								<div class="msg_text">Комментариев: <?=$dataUser['comments_sum'];?></div>
								<div class="msg_rating">
									<?php if ($idUser == $idAuthor) :?>
										Себе оценку ставить нельзя.
										<?php elseif (in_array($idAuthor, $dataUser['rating_user_selected'])): ?>
											Вы уже поставили оценку этому пользователю.
										<?php else : ?>
											Сколько звёзд поставите пользователю?
											<form  method="post" action="/module4/php/rating.php" class="form-rating">
												<input type="hidden" name="idUser" value="<?=$idUser;?>">
												<input type="hidden" name="idAuthor" value="<?=$idAuthor;?>">
												<label>1<input type="radio" name="ratingNum" value="1" onchange="form.submit();"></label>
												<label>2<input type="radio" name="ratingNum" value="2" onchange="form.submit();"></label>
												<label>3<input type="radio" name="ratingNum" value="3" onchange="form.submit();"></label>
												<label>4<input type="radio" name="ratingNum" value="4" onchange="form.submit();"></label>
												<label>5<input type="radio" name="ratingNum" value="5" onchange="form.submit();"></label>
											</form>
										<?php endif; ?>
								</div>
								<div class="showInfo">Показать инфу о пользователе</div>
								<div class="profileInfo">
									<p>Телефон: <?=$dataUser['phone'];?></p>
									<p>Почта: <?=$dataUser['email'];?></p>
									<p>Адрес: <?=$dataUser['address'];?></p>
									<p>Информация о себе: <?=$dataUser['info'];?></p>
								</div>
								<div class="msg_attach">
									<?php foreach ($dataUser['img_room'] as $images => $image) :?>
										<?php if ($image != "") :?>
											<img src="/module4/php/<?=$image;?>" alt="Фото квартиры-<?=$image;?>" width="100">
										<?php endif;?>
									<?php endforeach;?>
								</div>
								<div class="msg_send"><a href="#">Отправить сообщение</a></div>
							</div>
						</div>
				</div>
			</div>
			<div class="listCard list-full">
				<div class="title">Диалог с пользователем</div>
				<div class="item hr_bottom"></div>
				<div class="item left item-full">
					<form class="send_comments" id="form-message" method="POST" action="/module4/php/message.php" >
						<input type="hidden" name="id_user" value="<?=$idUser;?>">
						<input type="hidden" name="id_author" value="<?=$idAuthor;?>">
						<textarea placeholder="Введите сообщение" name="text_message" require></textarea>
						<input type="submit" value="Отправить" name="go-message">
					</form>
					<?php if (isset($dataMessages)) :?>
						<?php foreach ($dataMessages as $messages => $message) :?>
						<div class="msg_item">
							<div class="msg_right"><?=$message['time_message'];?></div>
							<div class="msg_left">
								<div class="msg_img">
									<img src="/module4/php/<?=$message['avatar'];?>" alt="<?=$message['first_name']."-".$message['last_name'];?>">
								</div>
							</div>
							<div class="msg_center">
								<div class="msg_from"><?=$message['first_name']." ".$message['last_name'];?></div>
								<div class="msg_text"><?=$message['text_message'];?></div>
							</div>
						</div>
					<?php endforeach;?>
				<?php else: ?>
					<p>У вас ещё нет диалога с данным пользователем. Оставьте первое сообщение.</p>
				<?php endif; ?>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script> 
		<script type="text/javascript" src="/module4/script.js"></script>
	</body>
</html>