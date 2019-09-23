<?php
$old_pass  = $_POST["old_pass"];
$new_pass  = $_POST["new_pass"];
$new_pass2 = $_POST["new_pass_povtor"];

session_start();

$connect = mysqli_connect('localhost', 'db', '12019991', 'cabinet') or die('<span class="text_text">Ошибка подключения к базе</span>'); //Подключение к базе данных

$result = mysqli_fetch_array(mysqli_query($connect, 'SELECT password FROM user WHERE nomer_dogovora = "' . $_SESSION['login'] . '" '));

if ($new_pass == $new_pass2) {
    if ($result['password'] == $old_pass) {
        mysqli_query($connect, 'UPDATE user SET password="' . $new_pass . '" WHERE nomer_dogovora = "' . $_SESSION['login'] . '"');

        header('Location: profile.php');
        mysqli_close($connect); //Закрываем подключение к бд
        die();
    } else {
        //неверный старый пароль
        $errortext_old = 'Неверный пароль';
        require('profile.php');

        mysqli_close($connect); //Закрываем подключение к бд
        die();
    }
} else {
    //новые пароли не совпадают
    $errortext_new = 'Пароли не совпадают';
    require('profile.php');

    mysqli_close($connect); //Закрываем подключение к бд
    die();
}
?>