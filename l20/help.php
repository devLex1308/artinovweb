<!-- Тип кодування данних, enctype, Слід вказати саме так -->
<form enctype="multipart/form-data" action="__URL__" method="POST">
    <!-- Поле MAX_FILE_SIZE поавинно бути до поля завантаження файлу -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- Назва елементу input визначає ім'я в масиві $_FILES -->
    Надіслати файл: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>

<!-- Декілька файлів -->
<form action="mce.php" method="post" enctype="multipart/form-data">
    <input name="userFile[]" type="file" multiple><br>
    <input type="submit" value="Загрузить">
</form>

<?
//Заготовка

$uploaddir = '/var/www/uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Файл завантажено.\n";
} else {
    echo "Щось не так\n";
}

print_r($_FILES);


unlink('test.html');

var latlngs = [
		[45.51,0],
		[370.77, 1022.43],
		[34.04, 118.2]
	];

var polyline = L.polyline(latlngs, {color: 'red'}).addTo(map);

map.removeLayer();

$.ajax({

            cache: false,
            timeout: TIME_FOR_SEND_RESALT,
            url: server,//SERVER_NAME,
            type: "POST",
            data: (oData),

            beforeSend: function () {

},

            success: function (data, textStatus, jqXHR) {

},

            error: function (jqXHR, textStatus, errorThrown) {

},
            complete: function (jqXHR, textStatus) {
}

        });
    };




