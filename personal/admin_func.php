<?php

session_start();
$connect = mysqli_connect('localhost', 'db', '12019991', 'cabinet') or die('<span class="text_text">Ошибка подключения к базе</span>'); //Подключение к базе данных

if(isset($_POST['delete_pers'])) {//удаление сотрудника

    mysqli_query($connect, 'DELETE FROM personal WHERE ID_personal="'.$_POST['delete_pers'].'"');
    header('Location: admin_propusk_personal.php');
    mysqli_close($connect);
}

?>
