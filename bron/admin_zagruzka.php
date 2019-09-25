<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../auth/auth.php'); //Если не авторизированы
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Аренда склада и производственных площадей в Бирюлёво</title>
    <!-- Bootstrap -->
    <link href="http://psk-technology.ru/wp-content/themes/psk/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://psk-technology.ru/wp-content/themes/psk/css/style.css?1" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Exo+2:300,400,700&amp;subset=cyrillic" rel="stylesheet">
    <link rel="canonical" href="http://psk-technology.ru/" />

    <link rel='shortlink' href='http://psk-technology.ru/' />
    <style>
        html {
            margin-top: 0px !important;
        }
    </style>
    <link rel="stylesheet" href="../style.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/mask.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
</head>
<body>
<div id="head" class="container">
    <div class="row">
        <div id="col-logo" class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="logo">
                <a href="/"><img src="../img/logo.png"></a>
            </div>
            <div class="descript">
                Производственно-складской комплекс
            </div>
        </div>
        <div id="col-menu" class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
            <div id="topmenu">
                <div class="menu-pic"><span></span></div>
                <ul id="menu-menu-1" class="menu">
                    <li id="menu-item-26" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26"><a href="http://psk-technology.ru/about">О комплексе</a></li>
                    <li id="menu-item-48" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-48"><a href="http://psk-technology.ru/category/platforms">Площадки</a></li>
                    <li id="menu-item-27" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-27"><a href="http://psk-technology.ru/layouts">Планировки</a></li>
                    <li id="menu-item-30" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-30"><a href="http://psk-technology.ru/services">Услуги</a></li>
                    <li id="menu-item-25" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-25"><a href="http://psk-technology.ru/contacts" aria-current="page">Контакты</a></li>
                    <li id="menu-item-40" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-21 current_page_item menu-item-20 button_cab"><img src="../img/icon_person.png" id="img">Личный кабинет</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <div class="phone">
                <a href="tel:+79264741814">+7 926 474 18 14</a>
            </div>
            <div class="top_text">
                Москва, улица Касимовская, проектируемый проезд 3989
            </div>
        </div>
    </div>
</div>

<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 fixed">
                <ul class="cabinet_menu">
                    <li><a href="../profile/admin_polzovateli.php">Пользователи</a></li>
                    <div class="cabinet_menu_text">Заявки</div>
                    <li><a href="../car/admin_propuski_car.php">Пропуски на машину</a></li>
                    <li><a href="admin_zagruzka.php">Резерв под загрузку</a></li>
                    <li><a href="../uslugi/admin_zayavki.php">Заявки на услуги</a></li>
                    <li><a href="../personal/admin_propusk_personal.php">Пропуски на персонал</a></li>
                    <li class="exit"><a href="../exit.php">Выход</a></li>
                </ul>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-6">
                <hr>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-6 margin_fixed">
                <div class="main_text"><span>Б</span>ронирование</div>
                <div class="top_menu_bron">
                    <ul class="menu menu_uslugi">
                        <li class="active_li" id="menu_lift">Лифты</li>
                        <li id="menu_vorot">Ворота</li>
                    </ul>
                </div>





                <div class="row lift_block">
                    <?php

                    $connect = mysqli_connect('localhost', 'db', '12019991', 'cabinet') or die('<span class="text_text">Ошибка подключения к базе</span>'); //Подключение к базе данных

                    echo '<div class="col-lg-5 col-md-5 col-sm-6 col-xs-6 ">';
                    echo '<div class="personal_info" style="margin-top: 40px">';
                    echo '<div class="polz_text">Все брони лифтов:</div>';

                    echo '<form action="admin_func.php" method="post">';
                    echo '<input type="date" value="'.$_COOKIE["date_lift_zan"].'" class="date_today date_obor " name="select_date_lift_zan" id="date_bron" onchange="submit();" required/>';
                    echo '</form>';

                    $all_lift = mysqli_query($connect, 'SELECT nomer, ID_nomer_obor FROM nomer_obor WHERE ID_tip_razgruzki= 1 ORDER BY nomer');

                    while ($row=mysqli_fetch_array($all_lift)){
                        echo '<div class="row_name_main obor_name">Лифт №'.$row['nomer'].'</div>';
                        $ID_lift = mysqli_fetch_array(mysqli_query($connect, 'SELECT ID_nomer_obor FROM nomer_obor WHERE nomer="'.$row['nomer'].'" AND 	ID_tip_razgruzki=1'));
                        $bron_lift_zan = mysqli_query($connect, 'SELECT ID_razgruzka, vremya_nachala, familiya, imya, otchestvo, nazvanie_organizacii, naimenovanie FROM razgruzka, user, type_arendatora WHERE razgruzka.ID_user=user.ID_user AND user.ID_type_arendatora=type_arendatora.ID_type_arendatora AND data = "'.$_COOKIE['date_lift_zan'].'" AND ID_nomer_obor="'.$ID_lift['ID_nomer_obor'].'" ORDER BY vremya_nachala');
                        while ($row=mysqli_fetch_array($bron_lift_zan)){
                            echo '<div class="row bron">';
                            echo '<div class="col-lg-10 col-md-7 col-sm-7 col-xs-7 row_name_main bron_info">'.date('H:i', strtotime($row['vremya_nachala'])).' - '. $row['naimenovanie'] .' '. $row['nazvanie_organizacii'] .' '. $row['familiya'] .' '. $row['imya'] .' '. $row['otchestvo'] .'</div>';
                            echo '<div class="col-lg-2 col-md-5 col-sm-5 col-xs-5 right">';
                            echo '<form method="post" action="admin_func.php" style="margin-bottom: 0;"><button class="delete" style="margin-top: 8px; margin-right: 10px; margin-bottom: 0; padding: 0;" name="delete_bron" value="' . $row['ID_razgruzka'] . '"><img src="../img/icons8-delete.png" /></button></form>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                    echo '<br>';
                    echo '<br>';
                    echo '<br>';


                    echo '</div>';
                     echo '</div>';

                    echo '<div class="col-lg-1 col-md-1 col-sm-1 col-xs-6 polz">
                        <hr>
                    </div>';

                    echo '<div class="col-lg-5 col-md-5 col-sm-6 col-xs-6 " >';

                    $all_lift_select = mysqli_query($connect, 'SELECT nomer, ID_nomer_obor FROM nomer_obor WHERE ID_tip_razgruzki=1');
                    $arendatorinfo = mysqli_query($connect, 'SELECT  ID_user, familiya, imya, otchestvo, nazvanie_organizacii, naimenovanie FROM user, type_arendatora WHERE user.ID_type_arendatora = type_arendatora.ID_type_arendatora GROUP BY ID_user');

                    echo '<div class="polz_text" style="margin-bottom: 10px; margin-top: 40px;">Сделайте бронь:</div>';
                    echo '<form action="admin_func.php" method="post">';
                    echo 'Номер лифта: <select name="nomer_obor" class="nomer_obor" onchange="submit();" required>';

                    while ($row = mysqli_fetch_assoc($all_lift_select)) {
                        if($row['ID_nomer_obor'] != $_COOKIE['nomer_lift_admin']) {

                            echo '<option>'.$row['nomer'].'</option>';
                        } else {
                            echo '<option selected>'.$row['nomer'].'</option>';
                        }
                    }

                    echo '</select>';

                    echo '<input type="date" value="'.$_COOKIE["date_lift_admin"].'" class="date_today date_obor" name="select_date_lift" id="date_bron" onchange="submit();" required/>';

                    echo '<div></div>Арендатор: <select name="arendator" style="width: 75%; margin-bottom: 5px; padding-left: 5px; margin-left: 5px;" required>';

                    while ($row = mysqli_fetch_assoc($arendatorinfo)) {
                        echo '<option value="'.$row['ID_user'].'">'. $row['naimenovanie'] .' '. $row['nazvanie_organizacii'] .' '. $row['familiya'] .' '. $row['imya'] .' '. $row['otchestvo'] .'</option>';
                    }
                    echo '</select>';

                    echo '<br>';
                    $time = mysqli_query($connect, 'SELECT ID_razgruzka, vremya_nachala, ID_user FROM razgruzka WHERE data = "'.$_COOKIE["date_lift_admin"].'" and ID_nomer_obor="'.$_COOKIE["nomer_lift_admin"].'"');

                    while ($row = mysqli_fetch_array($time)){
                        if ($row['ID_user'] === NULL) {
                            echo '<input id="'.$row['vremya_nachala'].'" class="radio-inline__input" type="radio" name="accessible-radio" value="'.$row['ID_razgruzka'].'" checked="checked"/>';
                            echo '<label class="radio-inline__label" for="'.$row['vremya_nachala'].'">'.date('H:i', strtotime($row['vremya_nachala'])).'</label>';
                        } else {
                            echo '<input id="'.$row['vremya_nachala'].'" class="radio-inline__input" type="radio" name="accessible-radio" value="'.$row['ID_razgruzka'].'" disabled/>';
                            echo '<label class="radio-inline__label_dis" for="'.$row['vremya_nachala'].'">'.date('H:i', strtotime($row['vremya_nachala'])).'</label>';
                        }

                    }

                    echo '<div class="zayavka_button">
                            <button type="submit" class="button" name="lift">Забронировать</button>
                        </div>';

                    echo '</form>';
                    echo '</div>';

                    ?>

                </div>


                <div class="row vorota_block">

                    <?php
                    $connect = mysqli_connect('localhost', 'db', '12019991', 'cabinet') or die('<span class="text_text">Ошибка подключения к базе</span>'); //Подключение к базе данных

                    echo '<div class="col-lg-5 col-md-5 col-sm-6 col-xs-6 ">';
                    echo '<div class="personal_info" style="margin-top: 40px">';
                    echo '<div class="polz_text">Все брони ворот:</div>';

                    echo '<form action="admin_func.php" method="post">';
                    echo '<input type="date" value="'.$_COOKIE["date_vorota_zan"].'" class="date_today date_obor select_date_vorota_zan" name="select_date_vorota_zan" id="date_bron" onchange="submit();" required/>';
                    echo '</form>';

                    $all_vorota = mysqli_query($connect, 'SELECT nomer, ID_nomer_obor FROM nomer_obor WHERE ID_tip_razgruzki= 2 ORDER BY nomer');

                    while ($row=mysqli_fetch_array($all_vorota)){
                        echo '<div class="row_name_main obor_name">Ворота №'.$row['nomer'].'</div>';
                        $ID_vorota = mysqli_fetch_array(mysqli_query($connect, 'SELECT ID_nomer_obor FROM nomer_obor WHERE nomer="'.$row['nomer'].'" AND ID_tip_razgruzki=2'));
                        $bron_vorota_zan = mysqli_query($connect, 'SELECT ID_razgruzka, vremya_nachala, familiya, imya, otchestvo, nazvanie_organizacii, naimenovanie FROM razgruzka, user, type_arendatora WHERE razgruzka.ID_user=user.ID_user AND user.ID_type_arendatora=type_arendatora.ID_type_arendatora AND data = "'.$_COOKIE['date_vorota_zan'].'" AND ID_nomer_obor="'.$ID_vorota['ID_nomer_obor'].'" ORDER BY vremya_nachala');
                        while ($row=mysqli_fetch_array($bron_vorota_zan)){
                            echo '<div class="row bron">';
                            echo '<div class="col-lg-10 col-md-7 col-sm-7 col-xs-7 row_name_main bron_info">'.date('H:i', strtotime($row['vremya_nachala'])).' - '. $row['naimenovanie'] .' '. $row['nazvanie_organizacii'] .' '. $row['familiya'] .' '. $row['imya'] .' '. $row['otchestvo'] .'</div>';
                            echo '<div class="col-lg-2 col-md-5 col-sm-5 col-xs-5 right">';
                            echo '<form method="post" action="admin_func.php" style="margin-bottom: 0;"><button class="delete" style="margin-top: 8px; margin-right: 10px; margin-bottom: 0; padding: 0;" name="delete_bron" value="' . $row['ID_razgruzka'] . '"><img src="../img/icons8-delete.png" /></button></form>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                    echo '<br>';
                    echo '<br>';
                    echo '<br>';


                    echo '</div>';


                    echo '</div>';


                    echo '<div class="col-lg-1 col-md-1 col-sm-1 col-xs-6 polz">
                    <hr>
                </div>';

                    echo '<div class="col-lg-5 col-md-5 col-sm-6 col-xs-6 " >';

                    $all_vorota_select = mysqli_query($connect, 'SELECT nomer, ID_nomer_obor FROM nomer_obor WHERE ID_tip_razgruzki=2');

                    echo '<div class="polz_text" style="margin-bottom: 10px; margin-top: 40px;">Сделайте бронь:</div>';
                    echo '<form action="admin_func.php" method="post">';
                    echo 'Номер ворот: <select name="nomer_obor" class="nomer_obor" onchange="submit();" required>';

                    while ($row = mysqli_fetch_assoc($all_vorota_select)) {
                        if($row['ID_nomer_obor'] != $_COOKIE['nomer_vorot_admin']) {

                            echo '<option>'.$row['nomer'].'</option>';
                        } else {
                            echo '<option selected>'.$row['nomer'].'</option>';
                        }
                    }

                    echo '</select>';

                    echo '<input type="date" value="'.$_COOKIE["date_vorota_admin"].'" class="date_today date_obor" name="select_date_vorota" id="date_bron" onchange="submit();" required/>';

                    $arendatorinfo = mysqli_query($connect, 'SELECT  ID_user, familiya, imya, otchestvo, nazvanie_organizacii, naimenovanie FROM user, type_arendatora WHERE user.ID_type_arendatora = type_arendatora.ID_type_arendatora GROUP BY ID_user');

                    echo '<div></div>Арендатор: <select name="arendator" style="width: 75%; margin-bottom: 5px; padding-left: 5px; margin-left: 5px;" required>';

                    while ($row = mysqli_fetch_assoc($arendatorinfo)) {
                        echo '<option value="'.$row['ID_user'].'">'. $row['naimenovanie'] .' '. $row['nazvanie_organizacii'] .' '. $row['familiya'] .' '. $row['imya'] .' '. $row['otchestvo'] .'</option>';
                    }
                    echo '</select>';

                    echo '<br>';
                    $time = mysqli_query($connect, 'SELECT ID_razgruzka, vremya_nachala, ID_user FROM razgruzka WHERE data = "'.$_COOKIE["date_vorota_admin"].'" and ID_nomer_obor="'.$_COOKIE["nomer_vorot_admin"].'"');

                    while ($row = mysqli_fetch_array($time)){
                        if ($row['ID_user'] === NULL) {
                            echo '<input id="'.$row['ID_razgruzka'].'" class="radio-inline__input" type="radio" name="accessible-radio" value="'.$row['ID_razgruzka'].'" checked="checked"/>';
                            echo '<label class="radio-inline__label" for="'.$row['ID_razgruzka'].'">'.date('H:i', strtotime($row['vremya_nachala'])).'</label>';
                        } else {
                            echo '<input id="'.$row['ID_razgruzka'].'" class="radio-inline__input" type="radio" name="accessible-radio" value="'.$row['ID_razgruzka'].'" disabled/>';
                            echo '<label class="radio-inline__label_dis" for="'.$row['ID_razgruzka'].'">'.date('H:i', strtotime($row['vremya_nachala'])).'</label>';
                        }

                    }

                    echo '<div class="zayavka_button">
                            <button type="submit" class="button" name="vorota">Забронировать</button>
                        </div>';

                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';


                    ?>

                    <?php
                    if ($_COOKIE['obor'] == 2) {
                        echo '<script> $(".lift_block").hide(); $(".vorota_block").show(); $("#menu_lift").removeClass("active_li");
                             $("#menu_vorot").addClass("active_li");</script>';

                    }

                    ?>

                </div>
            </div>
        </div>
    </div>
</body>
</html>

