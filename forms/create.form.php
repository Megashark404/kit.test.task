	<div class="create-form">
		<div>Создать новый объект</div>
		<form action="/actions/create.php" method="post">
			<label>Название</label>	
			<input type="text" name="name">
			<label>Описание</label>
			<input type="text" name="description">
			<label>Родитель</label>
			<input type="text" name="parent_id" value="<?=$id?>">
			<input type="submit" name="submit" value="Создать">
		</form>
	</div>