<?php

// выдает описание объекта для показа 
require('../helpers/db.php');

$id = $_GET['id'];	

$stmt = $pdo->prepare('SELECT description FROM objects WHERE id = ?');
$stmt->execute(array($id));
$description = $stmt->fetchColumn();

echo $description;

?>