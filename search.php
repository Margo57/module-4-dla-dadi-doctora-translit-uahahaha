<?php require("header.php"); ?>
<?php 

$idAuthor = $_SESSION['user_id'];

$query = "SELECT id, first_name, last_name, email, phone, avatar, address, img_room, info, rating, rating_user_selected, comments_sum FROM `users`";

$sort = "";
if (isset($_GET['sort'])) {
	switch ($_GET['sort']) {
		case 'rating': 
		$sort = "ORDER BY rating DESC";
		break;
		case 'address': 
		$sort = "ORDER BY address";
		break;
		case 'name': 
		$sort = "ORDER BY first_name";
		break;
		default: 
		$sort = "";
	}
}

$sql = $link->query($query." ".$sort);

while ($row = $sql -> fetch_all(MYSQLI_ASSOC)) {
	$dataUsers = $row;
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
				<div class="title">Все пользователи</div>
				<div class="item hr_bottom"></div>
				<div class="item left item-full">
					<div class="sort">Сортировать по: <a href="?sort=rating" class="dotted">рейтингу</a><a href="?sort=address" class="dotted">адресу</a><a href="?sort=name" class="dotted">имени</a></div>

					<?php foreach ($dataUsers as $users => $user) : ?>
						<?php $user['img_room'] = explode(',', $user['img_room']); ?>
						<?php $user['rating_user_selected'] = explode(',', $user['rating_user_selected']); ?>
						<div class="msg_item">
							<div class="msg_right">Рейтинг: <?=$user['rating'];?></div>
							<div class="msg_left">
								<div class="msg_img">
									<img src="/module4/php/<?=$user['avatar'];?>" alt="<?=$user['login'];?>-avatar">
								</div>
							</div>
							<div class="msg_center">
								<div class="msg_from"><a href="/module4/comments.php?idUser=<?=$user['id'];?>"><?=$user['first_name'];?> <?=$user['last_name'];?></a></div>
								<div class="msg_text">Комментариев: <?=$user['comments_sum'];?></div>

								<div class="msg_rating">
									<?php if ($user['id'] == $idAuthor) :?>
										Себе оценку ставить нельзя.
										<?php elseif (in_array($idAuthor, $user['rating_user_selected'])): ?>
											Вы уже поставили оценку этому пользователю.
										<?php else : ?>
											Сколько звёзд поставите пользователю?
											<form  method="post" action="/module4/php/rating.php" class="form-rating">
												<input type="hidden" name="idUser" value="<?=$user['id'];?>">
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