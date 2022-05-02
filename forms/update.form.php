	<div class="update-form">
		<div>Обновить данные объекта "<?=$object['name']?>"</div>
		<form action="/actions/update.php" method="post">
			<label>Название</label>	
			<input type="text" name="name" value="<?=$object['name']?>">
			<label>Описание</label>
			<input type="text" name="description" value="<?=$object['description']?>">
			<label>Родитель</label>
			<input type="text" name="parent_id" value="<?=$object['parent_id']?>">
			<input type="hidden" name="id" value="<?=$object['id']?>">
			<input type="submit" name="submit" value="Обновить">
		</form>
	</div>