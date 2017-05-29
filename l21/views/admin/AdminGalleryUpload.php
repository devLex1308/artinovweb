<?php
require_once ROOT."/views/admin/header.php";
?>
<!-- Тип кодування данних, enctype, Слід вказати саме так -->
<form enctype="multipart/form-data"  method="POST">
    <!-- Поле MAX_FILE_SIZE поавинно бути до поля завантаження файлу -->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    <!-- Назва елементу input визначає ім'я в масиві $_FILES -->
    Надіслати файл: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>

<form method="post" enctype="multipart/form-data">
    <input name="userFile[]" type="file" multiple><br>
    <input type="submit" value="Загрузить">
</form>

<?php
require_once ROOT."/views/admin/footer.php";
?>