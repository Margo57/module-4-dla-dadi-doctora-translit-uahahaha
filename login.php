<?php require("header.php"); ?>
<?php 
if (!$authorization) {
	session_destroy();
}
?>
		<div id="content">
			<?php if (!$authorization): ?>
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
			<?php else: ?>
				<p>Вы уже авторизовались!</p>
				<form method="post" action="/module4/php/exit.php">
						<input type='submit' name='exit' value='Выйти'/>
				</form>
			<?php endif; ?>
		</div>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script> 
		<script type="text/javascript" src="/module4/script.js"></script>
	</body>
</html>
