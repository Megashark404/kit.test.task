<?php

require('../helpers/db.php');

// удаляем  объект
$stmt = $pdo->prepare('DELETE FROM objects WHERE id = ?');
$result = $stmt->execute(array($_GET['id']));

//удаляем потомков
$stmt = $pdo->prepare('DELETE FROM objects WHERE parent_id = ?');
$result = $stmt->execute(array($_GET['id']));


if ($result) {
	echo 'Объект успешно удален!';
	echo '<p><a href="/admin.php">Вернуться назад</a></p>';
}


?>