<?php

require('../helpers/db.php');

if ($_POST['parent_id'] == '') {
	$parent_id = null;
}
else {
	$parent_id = $_POST['parent_id'];
}

// запрашиваем данные объекта
$stmt = $pdo->prepare('UPDATE objects SET name = ?, description = ?, parent_id = ? WHERE id = ?');
$result = $stmt->execute(array($_POST['name'], $_POST['description'], $parent_id, $_POST['id']));

if ($result) {
	echo 'Объект обновлен успешно !';
	echo '<p><a href="/admin.php">Вернуться назад</a></p>';
}


?>