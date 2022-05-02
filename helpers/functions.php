<?php 

// рекурсивная функция обхода вложенных объектов
function getDescendants($row, $pdo) {

	// выводим имя объекта
	$output = "<div><p><a href='admin.php?id={$row['id']}'>{$row['name']}</a></p>";

	// проверяем, есть ли у объекта вложенные объекты
	if ($pdo->query("SELECT count(id) FROM objects WHERE parent_id = {$row['id']}")->fetchColumn() != 0) {	

		// если есть - запрашиваем и фетчим
		$stmt = $pdo->query("SELECT * FROM objects WHERE parent_id = {$row['id']}");		
		$output .= "<div class='descendants' >";

		// выводим потомков
		while ($r = $stmt->fetch()) {	
			$output .= getDescendants($r, $pdo);		
		}

		$output .= "</div>";		
	}	

	$output .= '</div>';
	return $output;


}

// аналогичная функция для пользователя
function getDescendantsForUser($row, $pdo) {
	// выводим имя объекта
	$output = "<div><p><a onclick='getDescription({$row['id']})' href='#'>{$row['name']}</a>";

	// проверяем, есть ли у объекта вложенные объекты
	if ($pdo->query("SELECT count(id) FROM objects WHERE parent_id = {$row['id']}")->fetchColumn() != 0) {	

		// если есть - запрашиваем и фетчим
		$stmt = $pdo->query("SELECT * FROM objects WHERE parent_id = {$row['id']}");
		$output .= '<a class="plus"  onclick="toggleDescendants(event)">+</a></p>';
		$output .= "<div class='descendants' style='display:none'>";

		// выводим потомков
		while ($r = $stmt->fetch()) {	
			$output .= getDescendantsForUser($r, $pdo);		
		}

		$output .= "</div>";		
	}	

	$output .= '</div>';
	return $output;
}