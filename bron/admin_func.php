<?php

session_start();

$connect = mysqli_connect('localhost', 'db', '12019991', 'cabinet') or die('<span class="text_text">Ошибка подключения к базе</span>'); //Подключение к базе данных

if (isset($_POST['select_date_lift_zan'])) {
    setcookie("date_lift_zan",$_POST['select_date_lift_zan']);
    setcookie("obor","1");
}

if (isset($_POST['select_date_lift'])) {

    $ID_nomer_obor = mysqli_fetch_array(mysqli_query($connect, 'SELECT ID_nomer_obor FROM nomer_obor WHERE nomer="'.$_POST['nomer_obor'].'" AND ID_tip_razgruzki=1'));

    setcookie("date_lift_admin",$_POST['select_date_lift']);
    setcookie("nomer_lift_admin", $ID_nomer_obor['ID_nomer_obor']);
    setcookie("obor","1");
    unset($_COOKIE['date_vorota_zan']);

    if( $_POST['select_date_lift'] != NULL) {
        $issetdate = mysqli_fetch_array(mysqli_query($connect, 'SELECT ID_razgruzka FROM razgruzka WHERE data="' . $_POST['select_date_lift'] . '" AND ID_nomer_obor= "' . $ID_nomer_obor['ID_nomer_obor'] . '"'));
        if ($issetdate['ID_razgruzka'] === NULL) {
            $i = 1;
            $time = date('H:i:s', strtotime('9:00:00'));
            while ($i < 10) {
                mysqli_query($connect, 'INSERT INTO `razgruzka` (`data`, `vremya_nachala`, `ID_nomer_obor`) VALUES ( "' . $_POST['select_date_lift'] . '", "' . $time . '", "' . $ID_nomer_obor['ID_nomer_obor'] . '");');
                $time = date('H:i:s', strtotime("+1 hour", strtotime($time)));


                $i++;
            }
        }
    }
}

if (isset($_POST['lift'])) {
   mysqli_query($connect, 'UPDATE razgruzka SET ID_user="'.$_POST['arendator'].'" WHERE ID_razgruzka = "'.$_POST['accessible-radio'].'";');
    unset($_COOKIE['date_vorota_zan']);
    setcookie("obor","1");

}

if (isset($_POST['select_date_vorota_zan'])) {
    setcookie("date_vorota_zan",$_POST['select_date_vorota_zan']);
    setcookie("obor","2");

}

if (isset($_POST['select_date_vorota'])) {

    $ID_nomer_obor = mysqli_fetch_array(mysqli_query($connect, 'SELECT ID_nomer_obor FROM nomer_obor WHERE nomer="'.$_POST['nomer_obor'].'" AND ID_tip_razgruzki=2'));

    setcookie("date_vorota_admin",$_POST['select_date_vorota']);
    setcookie("nomer_vorot_admin", $ID_nomer_obor['ID_nomer_obor']);
    setcookie("obor","2");

    if( $_POST['select_date_vorota'] != NULL) {
        $issetdate = mysqli_fetch_array(mysqli_query($connect, 'SELECT ID_razgruzka FROM razgruzka WHERE data="' . $_POST['select_date_vorota'] . '" AND ID_nomer_obor= "' . $ID_nomer_obor['ID_nomer_obor'] . '"'));
        if ($issetdate['ID_razgruzka'] === NULL) {
            $i = 1;
            $time = date('H:i:s', strtotime('9:00:00'));
            while ($i < 10) {
                mysqli_query($connect, 'INSERT INTO `razgruzka` (`data`, `vremya_nachala`, `ID_nomer_obor`) VALUES ( "' . $_POST['select_date_vorota'] . '", "' . $time . '", "' . $ID_nomer_obor['ID_nomer_obor'] . '");');
                $time = date('H:i:s', strtotime("+1 hour", strtotime($time)));


                $i++;
            }
        }
    }
}

if (isset($_POST['vorota'])) {
    mysqli_query($connect, 'UPDATE razgruzka SET ID_user="'.$_POST['arendator'].'" WHERE ID_razgruzka = "'.$_POST['accessible-radio'].'";');
    setcookie("obor","2");

}

if (isset($_POST['delete_bron'])) {
    $tip = mysqli_fetch_array(mysqli_query($connect, 'SELECT ID_tip_razgruzki FROM nomer_obor, razgruzka WHERE razgruzka.ID_nomer_obor=nomer_obor.ID_nomer_obor AND ID_razgruzka = "'.$_POST['delete_bron'].'"'));
    setcookie("obor",$tip['ID_tip_razgruzki']);

    mysqli_query($connect, 'UPDATE razgruzka SET ID_user = NULL WHERE ID_razgruzka = "'.$_POST['delete_bron'].'"');

}

mysqli_close($connect);
header('Location: admin_zagruzka.php');
?>
