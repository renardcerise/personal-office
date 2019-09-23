<?php
session_start();

$connect = mysqli_connect('localhost', 'db', '12019991', 'cabinet') or die('<span class="text_text">Ошибка подключения к базе</span>'); //Подключение к базе данных

$arendatorinfo = mysqli_fetch_array(mysqli_query($connect, 'SELECT  familiya, imya, otchestvo, nazvanie_organizacii, telephone, rezerv_telephone, email FROM user WHERE nomer_dogovora = "' . $_SESSION['login'] . '"'));
$tipcheck      = mysqli_fetch_array(mysqli_query($connect, 'SELECT type_arendatora.naimenovanie FROM user, type_arendatora WHERE nomer_dogovora = "' . $_SESSION['login'] . '" and type_arendatora.ID_type_arendatora=user.ID_type_arendatora '));
$ID_user       = mysqli_fetch_array(mysqli_query($connect, 'SELECT ID_user from user where  nomer_dogovora = "' . $_SESSION['login'] . '"'));

$to      = "nasya008@yandex.ru";
$subject = "Заявка от " . date('j.m.Y') . " в " . date('H:i');
$headers = "From: ПСК Технология";

$dogovor      = $_SESSION['login'];
$tip          = $tipcheck['naimenovanie'];
$familiya     = $arendatorinfo['familiya'];
$imya         = $arendatorinfo['imya'];
$otchestvo    = $arendatorinfo['otchestvo'];
$organizaciya = $arendatorinfo['nazvanie_organizacii'];
$phone        = $arendatorinfo['telephone'];
$rezervphone  = $arendatorinfo['rezerv_telephone'];


if (isset($_POST['lift'])) {

    $message = $_POST['message'];
    $mailText = "Заявка на бронь лифта
    
Номер д/а: $dogovor
Заявитель: $tip $familiya $imya $otchestvo
Контактный тел.: $phone
Дополнительный тел.: $rezervphone

Услуга: Бронь лифта
Комментарий: $message";

}

if (isset($_POST['vorota'])) {

    $message = $_POST['message'];
    $mailText = "Заявка на услугу
    
Номер д/а: $dogovor
Заявитель: $tip $familiya $imya $otchestvo
Контактный тел.: $phone
Дополнительный тел.: $rezervphone

Услуга: Бронь ворот
Комментарий: $message";
}

mail($to, $subject, $mailText, $headers);
header("Location: zagruzka.php");
?>
