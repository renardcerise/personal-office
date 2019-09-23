<?php

session_start();
$connect = mysqli_connect('localhost', 'db', '12019991', 'cabinet') or die('<span class="text_text">Ошибка подключения к базе</span>'); //Подключение к базе данных

if(isset($_POST['delete_car'])) {//удаление пользователя

    mysqli_query($connect, 'DELETE FROM car WHERE ID_car="'.$_POST['delete_car'].'"');
    header('Location: admin_propuski_car.php');
    mysqli_close($connect);
}

?>
