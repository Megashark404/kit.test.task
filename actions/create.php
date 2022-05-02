<?php

require('../helpers/db.php');

if ($_POST['parent_id'] == '') {
	$parent_id = null;
}
else {
	$parent_id = $_POST['parent_id'];
}

// запрашиваем данные объекта
$stmt = $pdo->prepare('INSERT INTO objects (name, description, parent_id) VALUES (?, ?, ?)');
$result = $stmt->execute(array($_POST['name'], $_POST['description'], $parent_id));

if ($result) {
	echo 'Новый объект успешно создан!';
	echo '<p><a href="/admin.php">Вернуться назад</a></p>';
}


?>