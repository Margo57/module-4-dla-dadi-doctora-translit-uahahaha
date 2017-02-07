<?php require("header.php"); ?>
<?php

$idAuthor = $_SESSION['user_id']; //берём id пользователя из сессии


$sql = $link->query("SELECT * FROM `users` WHERE id = '{$idAuthor}'");

while ($row = $sql -> fetch_array()) {
	$arrayData = $row;
}

$imgRoomAll = explode(',', $arrayData['img_room']);

//выборка сообщений диалога
$sql = $link->query("SELECT users.id, first_name, last_name, avatar, text_message, time_message FROM messages, users WHERE users.id=messages.id_author AND messages.id_author = '{$idAuthor}' OR users.id=messages.id_author AND messages.id_user = '{$idAuthor}' ORDER BY time_message DESC");

if ($link->affected_rows >= 1) {
	while ($row = $sql -> fetch_all(MYSQLI_ASSOC)) {
		$dataMessages = $row;
	}
}
?>

		<div id="content">
			<div class="listCard list-full">
				<div class="title editInfoTitle">Редактирование личной информации</div>
				<div class="item hr_bottom"></div>
				<div class="item left item-full editInfo">
						<img src="/module4/php/<?=$arrayData['avatar'];?>" alt="Ваша аватарка" class="avatar" width="250px">
						<div class="delAcc"><button onclick="confirm('Вы действительно хотите выйти?') ? location.href = '/module4/php/deleteAccount.php' : false;" class="button">Удалить страницу</button></div>

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
					<?php if (isset($dataMessages)) :?>
						<?php foreach ($dataMessages as $messages => $message) :?>
						<?php if ($message['id'] != $idAuthor) :?>
							<a href="/module4/message.php?idUser=<?=$message['id'];?>">
						<?php endif; ?>
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
						<?php if ($message['id'] != $idAuthor) :?></a><?php endif; ?>
					<?php endforeach;?>
				<?php endif; ?>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script> 
		<script type="text/javascript" src="/module4/script.js"></script>
	</body>
</html>