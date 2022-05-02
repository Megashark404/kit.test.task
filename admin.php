<?php 

// страница администратора


session_start();

// Проверяем, авторизовался ли юзер, если нет - отправляем на форму авторизации
if ($_SESSION['logged'] != true) {
	header('location: actions/login.php');
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Тестовое задание КИТ</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>

<h1>Интерфейс администратора </h1>

<div class="logout">
	<a href="actions/logout.php">Выйти</a>
</div>

<?php

require('helpers/db.php');
require('helpers/functions.php');



// выводим дерево объектов
$output = '<div class="tree">';
$stmt = $pdo->query('SELECT id, name FROM objects WHERE parent_id IS NULL');
while ($row = $stmt->fetch())	
{
    $output .= getDescendants($row, $pdo);
}

echo $output."</div>";

?>


<div class="content">


<?php


// если админ нажал на объект, извлекаем его id
if(isset($_GET['id'])) {
	$id = $_GET['id'];	

	// запрашиваем данные объекта
	$stmt = $pdo->prepare('SELECT * FROM objects WHERE id = ?');
	$stmt->execute(array($id));
	$object = $stmt->fetch();

	// выводим формы редактирования и удаления
	require ('forms/update.form.php');
	require ('forms/delete.form.php');
}
else {
	$id = ''; // для подставления в форму создания объекта, чтобы админ мог создать дочерний объект текущего объекта
}

// выводим форму создания нового объекта
require ('forms/create.form.php');
?>


</div>



</body>
</html>