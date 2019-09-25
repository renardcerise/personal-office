<?php
session_start();

$connect = mysqli_connect('localhost', 'db', '12019991', 'cabinet') or die('<span class="text_text">Ошибка подключения к базе</span>'); //Подключение к базе данных
$ID_user = mysqli_fetch_array(mysqli_query($connect, 'SELECT ID_user FROM user WHERE nomer_dogovora = "' . $_SESSION['login'] . '"'));

if (isset($_POST['select_date_lift'])) {

    $ID_nomer_obor = mysqli_fetch_array(mysqli_query($connect, 'SELECT ID_nomer_obor FROM nomer_obor WHERE nomer="'.$_POST['nomer_obor'].'" AND ID_tip_razgruzki=1'));

    setcookie("date_lift",$_POST['select_date_lift']);
    setcookie("nomer_lift", $ID_nomer_obor['ID_nomer_obor']);

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
    mysqli_query($connect, 'UPDATE razgruzka SET ID_user="'.$ID_user['ID_user'].'" WHERE ID_razgruzka = "'.$_POST['accessible-radio'].'";');

}

if (isset($_POST['select_date_vorota'])) {

    $ID_nomer_vor = mysqli_fetch_array(mysqli_query($connect, 'SELECT ID_nomer_obor FROM nomer_obor WHERE nomer="'.$_POST['nomer_obor'].'" AND ID_tip_razgruzki=2'));

    setcookie("date_vorota",$_POST['select_date_vorota']);
    setcookie("nomer_vorot", $ID_nomer_vor['ID_nomer_obor']);

    if( $_POST['select_date_vorota'] != NULL) {
        $issetdate = mysqli_fetch_array(mysqli_query($connect, 'SELECT ID_razgruzka FROM razgruzka WHERE data="' . $_POST['select_date_vorota'] . '" AND ID_nomer_obor= "' . $ID_nomer_vor['ID_nomer_obor'] . '"'));
        if ($issetdate['ID_razgruzka'] === NULL) {
            $i = 1;
            $time = date('H:i:s', strtotime('9:00:00'));
            while ($i < 10) {
                mysqli_query($connect, 'INSERT INTO `razgruzka` (`data`, `vremya_nachala`, `ID_nomer_obor`) VALUES ( "' . $_POST['select_date_vorota'] . '", "' . $time . '", "' . $ID_nomer_vor['ID_nomer_obor'] . '");');
                $time = date('H:i:s', strtotime("+1 hour", strtotime($time)));


                $i++;
            }
        }
    }
}

if (isset($_POST['vorota'])) {
    mysqli_query($connect, 'UPDATE razgruzka SET ID_user="'.$ID_user['ID_user'].'" WHERE ID_razgruzka = "'.$_POST['accessible-radio_vor'].'";');


}

if (isset($_POST['delete_bron'])) {
    mysqli_query($connect, 'UPDATE razgruzka SET ID_user = NULL WHERE ID_razgruzka = "'.$_POST['delete_bron'].'"');

}


mysqli_close($connect);
header('Location: zagruzka.php');
?>
