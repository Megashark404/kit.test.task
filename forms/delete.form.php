	<div class="delete-form">
		<div>Удалить объект "<?=$object['name']?>"</div>
		<form action="/actions/delete.php" method="get">
			<input type="hidden" name="id" value="<?=$object['id']?>">
			<button onclick="return confirm('Вы уверены, что хотите удалить объект?')">Удалить</button>
		</form>
	</div>