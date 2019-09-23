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

if (isset($_POST['zayavka_razgr_pogr'])) {

    $vid     = $_POST['vid_razgr_pogr'];
    $date    = date('d.m.Y', strtotime(str_replace('-', '/', $_POST['date'])));
    $message = $_POST['message'];

    $mailText = "Заявка на услугу
    
Номер д/а: $dogovor
Заявитель: $tip $familiya $imya $otchestvo
Контактный тел.: $phone
Дополнительный тел.: $rezervphone

Услуга: Разгрузочно-погрузочная
Вид услуги: $vid
Желаемая дата: $date
Комментарий: $message";

    $id_vid_razgr_pogr = mysqli_fetch_array(mysqli_query($connect, 'SELECT ID_vid_razgr_pogr FROM vid_razgr_pogr WHERE naimenovanie = "' . $vid . '"'));

    mysqli_query($connect, 'INSERT INTO `razgruzka_pogruzka` (`ID_vid_razgr_pogr`, `data`, `comment`, `data_zayavki`, `ID_user`) VALUES ("' . $id_vid_razgr_pogr['ID_vid_razgr_pogr'] . '", "' . date('Y-m-d', strtotime(str_replace('-', '/', $date))) . '", "' . $message . '", "' . date('Y-m-d H:i:s') . '", "' . $ID_user['ID_user'] . '")');

}

if (isset($_POST['zayavka_personal'])) {

    $vid     = $_POST['vid_sotr'];
    $date    = date('d.m.Y', strtotime(str_replace('-', '/', $_POST['date'])));
    $message = $_POST['message'];

    $mailText = "Заявка на услугу
    
Номер д/а: $dogovor
Заявитель: $tip $familiya $imya $otchestvo
Контактный тел.: $phone
Дополнительный тел.: $rezervphone

Услуга: Служба эксплуатации
Сотрудник: $vid
Желаемая дата: $date
Комментарий: $message";

    $id_vid_sotr = mysqli_fetch_array(mysqli_query($connect, 'SELECT ID_vid_sotrudnika FROM vid_sotrudnika WHERE naimenovanie = "' . $vid . '"'));

    mysqli_query($connect, 'INSERT INTO `vizov_sotrudnika` (`ID_vid_sotrudnika`, `data`, `comment`, `data_zayavki`, `ID_user`) VALUES ("' . $id_vid_sotr['ID_vid_sotrudnika'] . '", "' . date('Y-m-d', strtotime(str_replace('-', '/', $date))) . '", "' . $message . '", "' . date('Y-m-d H:i:s') . '", "' . $ID_user['ID_user'] . '")');
}

if (isset($_POST['zayavka_transport'])) {

    $vid        = $_POST['vid_zayavki'];
    $datenach   = date('d.m.Y', strtotime(str_replace('-', '/', $_POST['date_nach'])));
    $dateokonch = date('d.m.Y', strtotime(str_replace('-', '/', $_POST['date_okonch'])));
    $marka      = $_POST['marka'];
    $car_number = $_POST['car_number'];
    $fio_driver = $_POST['fio_driver'];

    $mailText = "Заявка на услугу
    
Номер д/а: $dogovor
Заявитель: $tip $familiya $imya $otchestvo
Контактный тел.: $phone
Дополнительный тел.: $rezervphone

Услуга: Транспорт
Заявка: $vid
Дата: с $datenach
        по $dateokonch
Марка: $marka
Номер машины: $car_number
ФИО водителя: $fio_driver";

    $ID_vid_zayavki = mysqli_fetch_array(mysqli_query($connect, 'SELECT ID_vid_zayavki FROM vid_zayavki WHERE naimenovanie = "' . $vid . '"'));

    mysqli_query($connect, 'INSERT INTO `transport` (`ID_vid_zayavki`, `data_nachala`, `data_okonch`, `marka`, `number`, `FIO`, `data_zayavki`, `ID_user`) VALUES ("' . $ID_vid_zayavki['ID_vid_zayavki'] . '", "' . date('Y-m-d', strtotime(str_replace('-', '/', $datenach))) . '", "' . date('Y-m-d', strtotime(str_replace('-', '/', $dateokonch))) . '", "' . $marka . '", "' . $car_number . '", "' . $fio_driver . '", "' . date('Y-m-d H:i:s') . '", "' . $ID_user['ID_user'] . '")');
}

if (isset($_POST['zayavka_stroitelstvo'])) {

    $message = $_POST['message'];
    $mailText = "Заявка на услугу
    
Номер д/а: $dogovor
Заявитель: $tip $familiya $imya $otchestvo
Контактный тел.: $phone
Дополнительный тел.: $rezervphone

Услуга: Строительно-монтажные работы
Комментарий: $message";

    mysqli_query($connect, 'INSERT INTO `stroitelstvo` (`comment`, `data_zayavki`, `ID_user`) VALUES ("' . $message . '", "' . date('Y-m-d H:i:s') . '", "' . $ID_user['ID_user'] . '")');
}


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

if (isset($_POST['Ворота'])) {

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
header("Location: uslugi.php");

?>