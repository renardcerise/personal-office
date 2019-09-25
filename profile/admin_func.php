<?php
session_start();
$connect = mysqli_connect('localhost', 'db', '12019991', 'cabinet') or die('<span class="text_text">Ошибка подключения к базе</span>'); //Подключение к базе данных

$id_type_arend = mysqli_fetch_array(mysqli_query($connect, 'SELECT ID_type_arendatora FROM type_arendatora WHERE naimenovanie ="'.$_POST['type_arendatora'].'"'));

setcookie("id_user",$_POST['id_user']);

if (isset($_POST['add_polz'])) { //добавление пользователя
       $checkisset = mysqli_fetch_array(mysqli_query($connect, 'SELECT ID_user FROM user WHERE nomer_dogovora="'.$_POST['nomer_dogovora'].'"'));
    if ($checkisset['ID_user'] === NULL) {
        mysqli_query($connect, 'INSERT INTO user (`nomer_dogovora`, `password`,  `familiya`, `imya`, `otchestvo`, `nazvanie_organizacii`, `telephone`, `rezerv_telephone`, `email`, `data_podpicaniya_dogovora`, `ID_type_arendatora`, 	`prava_dostypa`) VALUES ("' . $_POST['nomer_dogovora'] . '", "' . $_POST['password'] . '", "' . $_POST['familiya'] . '", "' . $_POST['imya'] . '", "' . $_POST['otchestvo'] . '", "' . $_POST['nazvanie_organizacii'] . '", "' . $_POST['telephone'] . '", "' . $_POST['rezerv_telephone'] . '", "' . $_POST['email'] . '", "' . date('Y-m-d', strtotime(str_replace('-', '/', $_POST['data_podpicaniya_dogovora']))) . '", "' . $id_type_arend['ID_type_arendatora'] . '", "1")');
        $id_new_user = mysqli_fetch_array(mysqli_query($connect, 'SELECT ID_user from user WHERE nomer_dogovora="'.$_POST['nomer_dogovora'].'"'));
        mysqli_close($connect);

        setcookie("id_user",$id_new_user['ID_user']);
        header('Location: admin_full_info.php');
    } else  {
        setcookie("error","1");
        unset($_COOKIE['id_user']);
        mysqli_close($connect);
        $errortext = 'Такой номер договора уже зарегистрирован';
        require('admin_full_info.php');
    }
}

if(isset($_POST['delete_arend'])) {//удаление пользователя
    mysqli_query($connect, 'DELETE FROM user WHERE ID_user="'.$_POST['id_user'].'"');
    mysqli_query($connect, 'DELETE FROM placement WHERE ID_user="'.$_POST['id_user'].'"');
    mysqli_query($connect, 'DELETE FROM car WHERE ID_car="'.$_POST['id_user'].'"');
    mysqli_query($connect, 'DELETE FROM personal WHERE ID_personal="'.$_POST['id_user'].'"');
    mysqli_close($connect);
    header('Location: admin_polzovateli.php');
}

if(isset($_POST['save_arend'])) { //редактирование пользователя

    mysqli_query($connect, 'UPDATE user SET nomer_dogovora="'.$_POST['nomer_dogovora'].'", password="'.$_POST['password'].'", familiya="'.$_POST['familiya'].'", imya="'.$_POST['imya'].'", otchestvo="'.$_POST['otchestvo'].'", nazvanie_organizacii="'.$_POST['nazvanie_organizacii'].'", telephone="'.$_POST['telephone'].'", rezerv_telephone="'.$_POST['rezerv_telephone'].'", email="'.$_POST['email'].'", data_podpicaniya_dogovora="'.date('Y-m-d', strtotime(str_replace('-', '/',$_POST['data_podpicaniya_dogovora']))).'" WHERE ID_user="'.$_POST['id_user'].'"');

    mysqli_close($connect);
    header('Location: admin_full_info.php');
}
if(isset($_POST['add_place'])) { //добавление помещения

    $ID_type_place =mysqli_fetch_array(mysqli_query($connect, 'SELECT ID_type_placement FROM type_placement WHERE naimenovanie="'.$_POST['type_place'].'"'));


    mysqli_query($connect, 'INSERT INTO `placement` (`number`, `ploschad`, `ID_type_placement`, `ID_user`) VALUES ("' . $_POST['number'] . '", "' . $_POST['ploshad'] . '", "' . $ID_type_place['ID_type_placement'] . '", "'.$_POST['id_user'].'")');

    mysqli_close($connect);
    header('Location: admin_full_info.php');
}
if(isset($_POST['delete_place'])) { //удаление помещения
    mysqli_query($connect, 'DELETE FROM placement WHERE ID_placement="'.$_POST['delete_place'].'"');
    mysqli_close($connect);
    header('Location: admin_full_info.php');
}

mysqli_close($connect);

?>