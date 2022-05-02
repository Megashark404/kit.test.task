<!-- Страница пользователя -->

<!DOCTYPE html>
<html>
<head>
	<title>Тестовое задание КИТ</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>

<h1>Интерфейс пользователя</h1>


<?php

require('helpers/db.php');
require('helpers/functions.php');


// выводим дерево
$output = '<div class="tree">';
$stmt = $pdo->query('SELECT id, name FROM objects WHERE parent_id IS NULL');
while ($row = $stmt->fetch())	
{
    $output .= getDescendantsForUser($row, $pdo);
}

echo $output."</div>";

?>


<div class="content">
	<textarea id='description' placeholder='описание' cols=50 rows = 10></textarea>
</div>

</body>




<script type="text/javascript">

// функция для получения описания объекта. чтобы не приходилось заново открывать объекты из-за обновления страницы, описание запращиваем через ajax
function getDescription(id) {

	const xhttp = new XMLHttpRequest();
  	xhttp.onload = function() {
   	 	document.getElementById("description").innerHTML = this.responseText;
  	}
	xhttp.open("GET", "/actions/get_description.php?id=" + id, true);
	xhttp.send();
}
	

// функция показа/скрытия потомков объекта
function toggleDescendants() {

	  var x = event.target.parentElement;
	  var y = x.parentElement.querySelector('.descendants');

	  if (y.style.display === "none") {
	  		y.style.display = "block";
	  } 
	  else {
	  	 	y.style.display = "none";
	  }
}

</script>
</html>