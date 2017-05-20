<?php
	require_once ROOT."/views/admin/header.php";
?>
<center>
    <h1><?php echo $title; ?></h1>

	<form method="POST" style="max-width: 500px;">
	<?php
		if(!empty($errors)){
			foreach ($errors as $key => $error) {
	?>		
				<p class="error" style="color: red">*<?=@$error;?></p>
	<?php
			}
		}
	?>
		<div class="form-group">
			<label>Виберіть Назву початку маршруту:</label>
            <input type="text" class="form-control" id="name" name="name_start" placeholder="Ввести назву" required>
		</div>

		<div class="form-group">
			<label>Виберіть Назву кінця маршруту:</label>
            <input type="text" class="form-control" id="name" name="name_end" placeholder="Ввести назву" required>
		</div>

		<div class="form-group">
			<label>Введіть номер маршруту:</label>
	    	<input class="form-control" type="text" name="number" placeholder="number" required>
		</div>

		<div class="form-group">
			<label>Виберіть тип транспорту:</label>
			<select class="form-control" name="carriage_id" required>
				<?php
				if(!empty($carriages)){
					foreach ($carriages as $key => $carriage) {
						echo "<option "; if($key == 0) echo "selected"; echo " value=".$carriage['id'].">".$carriage['name']."</option>";
					}
				}
				?>
			</select>
		</div>

		<div class="form-group">
			<label>Утримуючи клавішу <b>Shift</b> Виберіть Зупинки по яким відбувається рух від початку маршруту:</label>
			<select class="form-control" size="5" name="id_stations_start[]" multiple required>
				<?php
				if(!empty($stations)){
					foreach ($stations as $key => $station) {
						echo "<option "; if($key == 0) echo "selected"; echo " value=".$station['id'].">".$station['name']."</option>";
					}
				}
				?>
			</select>
		</div>

		<div class="form-group">
			<label>Утримуючи клавішу <b>Shift</b> Виберіть Зупинки по яким відбувається рух від кінця маршруту:</label>
			<select class="form-control" size="5" name="id_stations_end[]" multiple required>
				<?php
				if(!empty($stations)){
					foreach ($stations as $key => $station) {
						echo "<option "; if($key == 0) echo "selected"; echo " value=".$station['id'].">".$station['name']."</option>";
					}
				}
				?>
			</select>
		</div>

		<div class="form-group">
			<label>Введіть через скільки хвилин транспорт буде на зупинці від початку:</label>
	    	<input class="form-control" type="text" name="delta_time_start" placeholder="delta_time_start" required>
		</div>

		<div class="form-group">
			<label>Введіть через скільки хвилин транспорт буде на зупинці від початку:</label>
	    	<input class="form-control" type="text" name="delta_time_end" placeholder="delta_time_end" required>
		</div>

		<div class="form-group">
			<button type="submit" name="createRoute" class="btn btn-default">Створити Маршрут</button>
		</div>
		
	</form>
</center>
<?php
	require_once ROOT."/views/admin/footer.php";
?>