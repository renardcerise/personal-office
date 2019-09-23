<?php
session_start();
$connect = mysqli_connect('localhost', 'db', '12019991', 'cabinet') or die('<span class="text_text">Ошибка подключения к базе</span>'); //Подключение к базе данных

if (isset($_POST['add_personal'])) {
    addpersonal($connect);
}
if (isset($_POST['delete_personal'])) {
    deletepersonal($connect);
}

function addpersonal($connect)
{
    $familiya  = $_POST["familiya"];
    $imya      = $_POST["imya"];
    $otchestvo = $_POST["otchestvo"];

    $checkisset = mysqli_fetch_array(mysqli_query($connect, 'select personal.imya from personal, user where personal.ID_user=user.ID_user and personal.familiya="' . $familiya . '" and personal.imya = "' . $imya . '" and personal.otchestvo = "' . $otchestvo . '" and nomer_dogovora = "' . $_SESSION['login'] . '"'));

    if ($checkisset['imya'] === NULL) {
        $ID_user = mysqli_fetch_array(mysqli_query($connect, 'SELECT ID_user from user where  nomer_dogovora = "' . $_SESSION['login'] . '"'));
        mysqli_query($connect, 'INSERT INTO `personal` (`familiya`, `imya`, `otchestvo`, `ID_user`) VALUES ("' . $familiya . '", "' . $imya . '", "' . $otchestvo . '", "' . $ID_user['ID_user'] . '")');
        header('Location: personal.php');
        mysqli_close($connect);
    } else {
        $errortext = 'Пропуск на такого сотрудника уже заказан';
        require('personal.php');
        mysqli_close($connect);
    }
}

function deletepersonal($connect)
{
    mysqli_query($connect, 'DELETE FROM personal WHERE id_personal="' . $_POST['delete_personal'] . '"');
    header('Location: personal.php');
    mysqli_close($connect);
}
header('Location: personal.php');

?>