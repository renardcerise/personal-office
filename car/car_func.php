<?php
session_start();
$connect = mysqli_connect('localhost', 'db', '12019991', 'cabinet') or die('<span class="text_text">Ошибка подключения к базе</span>'); //Подключение к базе данных


if (isset($_POST['add_car']))
{
    $marka      = $_POST["marka"];
    $car_number = $_POST["car_number"];
    $fio_driver = $_POST["fio_driver"];

    $checkisset = mysqli_fetch_array(mysqli_query($connect, 'select marka from car where marka="' . $marka . '" and number = "' . $car_number . '" 
        and FIO_voditelya = "' . $fio_driver . '"'));

    if ($checkisset['marka'] === NULL) {
        $ID_user = mysqli_fetch_array(mysqli_query($connect, 'SELECT ID_user from user where  nomer_dogovora = "' . $_SESSION['login'] . '"'));
        mysqli_query($connect, 'INSERT INTO `car` (`marka`, `number`, `FIO_voditelya`, `ID_user`) VALUES 
            ("' . $marka . '", "' . $car_number . '", "' . $fio_driver . '", "' . $ID_user['ID_user'] . '")');
        mysqli_close($connect);
        header('Location: car.php');
    } else {
        $errortext = 'Пропуск на такую машину уже заказан';
        require('car.php');
        mysqli_close($connect);
    }
}

if (isset($_POST['delete_car']))
{
    mysqli_query($connect, 'DELETE FROM car WHERE id_car="' . $_POST['delete_car'] . '"');
    mysqli_close($connect);
    header('Location: car.php');
}
header('Location: car.php');
?>