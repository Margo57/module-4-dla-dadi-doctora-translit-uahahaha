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

//выборка комментариев пользователю
$sql = $link->query("SELECT text_comment, time_comment, first_name, last_name, avatar, rating_user_selected FROM comments, users WHERE comments.id_author=users.id AND comments.id_user='{$idUser}' ORDER BY time_comment DESC");

if ($link->affected_rows >= 1) {
	while ($row = $sql -> fetch_all(MYSQLI_ASSOC)) {
		$dataComments = $row;
	}
}
$itemSum = isset($_POST['itemSum']) ? $_POST['itemSum'] : 3;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$itemSumPage = ceil(count($dataComments) / $itemSum);
$min = $page * $itemSum - $itemSum;
$max = $page * $itemSum - 1;
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
								<div class="msg_send"><a href="/module4/message.php?idUser=<?=$idUser;?>">Отправить сообщение</a></div>
							</div>
						</div>
				</div>
			</div>
			<div class="listCard list-full">
				<div class="title">Комментарии</div>
				<div class="item hr_bottom"></div>
				<div class="item left item-full">
					<form class="send_comments" id="form-comment" method="POST" action="/module4/php/comments.php" >
						<input type="hidden" name="id_user" value="<?=$idUser;?>">
						<input type="hidden" name="id_author" value="<?=$idAuthor;?>">
						<textarea placeholder="Введите комментарий" name="text_comment" require></textarea>
						<input type="submit" value="Отправить" name="go-comment">
					</form>
					<?php if (isset($dataComments)) : ?>
						<?php foreach ($dataComments as $comments => $comment) :?>
						<?php if ($min <= $comments && $comments <= $max) : ?>
						<div class="msg_item">
							<div class="msg_right"><?=$comment['time_comment'];?></div>
							<div class="msg_left">
								<div class="msg_img">
									<img src="/module4/php/<?=$comment['avatar'];?>" alt="<?=$comment['first_name']."-".$$comment['last_name'];?>">
								</div>
							</div>
							<div class="msg_center">
								<div class="msg_from"><?=$comment['first_name']." ".$comment['last_name'];?></div>
								<div class="msg_text"><?=$comment['text_comment'];?></div>
							</div>
						</div>
					<?php endif; ?>
					<?php endforeach;?>
					<ul class="pagination">
						<?php if ($page != 1) :?>
							<li><a href="?idUser=<?=$idUser?>&page=1">В начало</a></li>
							<li><a href="?idUser=<?=$idUser?>&page=<?= $page-1;?>">Назад</a></li>
						<?php endif; ?>

						<?php for ($i = 1; $i <= $itemSumPage; $i++) :?>
							<li><a href="?idUser=<?=$idUser?>&page=<?=$i;?>"><?=$i;?></a></li>
						<?php endfor; ?>

						<?php if ($page != $itemSumPage) :?>
							<li><a href="?idUser=<?=$idUser?>&page=<?= $page+1;?>">Вперёд</a></li>
							<li><a href="?idUser=<?=$idUser?>&page=<?=$itemSumPage;?>">В конец</a></li>
						<?php endif; ?>
					</ul>
					<form method="post" action="">
						<select name="itemSum"  onchange="form.submit();">
							<?php for ($i = 2; $i < 9; $i++) : ?>
								<option value="<?=$i;?>" <?php if ($i == $itemSum) :?>selected<?php endif;?>><?=$i;?></option>
							<?php endfor; ?>
						</select>
					</form>
				<?php else: ?>
					<p>У этого пользователя ещё нет коменнтариев. Оставьте первый комментарий.</p>
				<?php endif; ?>



				</div>
			</div>
		</div>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script> 
		<script type="text/javascript" src="/module4/script.js"></script>
	</body>
</html>