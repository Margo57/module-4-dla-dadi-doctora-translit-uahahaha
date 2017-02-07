<?php require("header.php"); ?>
<?php 

if ($authorization) {
	header('Location: /module4/index.php');
} else {
	session_destroy();
}
?>
		<div id="content">
			<div class="listCard list-full">
				<div class="title">Зарегистрируйтесь для доступа к личному кабинету</div>
				<div class="item hr_bottom"></div>
				<div class="item left item-full">
					<form method="POST" action="php/signup.php" enctype="multipart/form-data">
						<input type="text" name="login" placeholder="Логин" required>
						<input type="text" name="first_name" placeholder="Имя" required>
						<input type="text" name="last_name" placeholder="Фамилия" required>
						<input type="email" name="email" placeholder="Email" required>
						<input type="password" name="pass" placeholder="Пароль" required>
						<input type="tel" name="phone" placeholder="Телефон" required>
						<p>Загрузите фото профиля</p>
						<input type="file" name="avatar">
						<input type="text" name="address" placeholder="Адрес" required>
						<p>Загрузите фото жилья</p>
						<input type="file" name="img_room[]" multiple required>
						<textarea  name="info" placeholder="Информация о себе" required></textarea>
						<input type="submit" value="Войти"  name="go-signup">
					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script> 
	</body>
</html>