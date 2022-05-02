<?php

//стартуем сессию, в ней будем хранить статус авторизации (true/false)
session_start();

require('../helpers/db.php');
require('../helpers/functions.php');

// если форма была отправлена, проверяем имя и пароль

if(isset($_POST['name'])) {

	$stmt = $pdo->prepare('SELECT password FROM admins WHERE name = ?');
	$stmt->execute(array($_POST['name']));
	$user = $stmt->fetch();

	if(empty($user)) {
		echo 'Неверное имя';
		echo '<p><a href="/actions/login.php">Назад</a></p>';
	}

	else {
		// сравниваем введенный пароль с паролем в базе
		if (password_verify($_POST['password'], $user['password'])) {

			// если пароли совпадают - пропускаем юзера в интерфейс администратора
			$_SESSION['logged'] = true;
			header('location: /admin.php');	
			exit();
		}
		else {
			echo 'Неверный пароль';
			echo '<p><a href="/actions/login.php">Назад</a></p>';
		}
	}
	
}


// если форма не была отправлена, выводим ее

else {
	require('../forms/login.form.php');
}

?>