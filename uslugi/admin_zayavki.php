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
    <script type="text/javascript" src="../js/Chart.js"></script>
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
<!--                    <li><a href="../bron/admin_zagruzka.php">Резерв под загрузку</a></li>-->
                    <li><a href="admin_zayavki.php">Заявки на услуги</a></li>
                    <li><a href="../personal/admin_propusk_personal.php">Пропуски на персонал</a></li>
                    <li class="exit"><a href="../exit.php">Выход</a></li>
                </ul>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-6">
                <hr>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-6 margin_fixed">
                <div class="main_text" style="margin-bottom: 10px;"><span>О</span>ставленные заявки</div>
                <button style="margin-top: 0; margin-bottom: 20px; " id="otchet">Посмотреть отчет</button>


                <canvas id="popChart" width="900" height="300"></canvas>
                <div class="row">


                <?php

                $connect = mysqli_connect('localhost', 'db', '12019991', 'cabinet') or die('<span class="text_text">Ошибка подключения к базе</span>'); //Подключение к базе данных

                $all_zayavki = mysqli_query($connect, 'SELECT * FROM all_zayavki');


                if ($result = mysqli_query($connect, "SELECT * from all_zayavki where naimen_usl=\"stroitelstvo\"")) {

                    $row_cnt = mysqli_num_rows($result);
                    printf("В выборке %d рядов.\n", $row_cnt);


                }

                $stroit = mysqli_fetch_array(mysqli_query($connect, 'SELECT COUNT(*) as ch from all_zayavki where naimen_usl="stroitelstvo"'));
                echo $stroit['ch'];


                echo '<script>    var popCanvas = $("#popChart");
    var barChart = new Chart(popCanvas, {
        type: \'bar\',
        data: {
            labels: ["Разгрузочно-погрузочные", "Вызов сотрудника", "Строительно-монтажные работы", "Транспорт"],
            datasets: [{
                label: \'Количество заявок\',
                data: [3, 4, 3, 1],
                backgroundColor: [
                    \'rgba(255, 99, 132, 0.6)\',
                    \'rgba(54, 162, 235, 0.6)\',
                    \'rgba(153, 102, 255, 0.6)\',
                    \'rgba(255, 159, 64, 0.6)\',
                ]
            }]
        }
    });</script>';

                while($row=mysqli_fetch_array($all_zayavki)){

                    switch ($row['naimen_usl']) {
                        case 'stroitelstvo':
                            echo '<div class="col-lg-6 col-md-3 col-sm-1 col-xs-6">';
                            echo '<div class="car_block zayavka">';
                            echo '<div class="row_name_main zayavka_name">Заявка от ' .date('d.m.Y H:i:s', strtotime(str_replace('-', '/', $row['data_zayavki']))). '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Арендатор:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . $row['familiya'] . ' ' . $row['imya'] . ' ' . $row['otchestvo'] . ' ' . $row['nazvanie_organizacii'] . '</div>';
                            echo '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Тел.:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . $row['telephone'] . '</div>';
                            echo '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Доп тел.:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . $row['rezerv_telephone'] . '</div>';
                            echo '</div>';
                            echo '<br>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Услуга:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">Строительно-монтажные работы</div>';
                            echo '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Комментарий:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . $row['comment'] . '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            break;
                        case 'transport':
                            echo '<div class="col-lg-6 col-md-3 col-sm-1 col-xs-6">';
                            echo '<div class="car_block zayavka">';
                            echo '<div class="row_name_main zayavka_name">Заявка от ' .date('d.m.Y H:i:s', strtotime(str_replace('-', '/', $row['data_zayavki']))). '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Арендатор:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . $row['familiya'] . ' ' . $row['imya'] . ' ' . $row['otchestvo'] . ' ' . $row['nazvanie_organizacii'] . '</div>';
                            echo '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Тел.:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . $row['telephone'] . '</div>';
                            echo '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Доп тел.:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . $row['rezerv_telephone'] . '</div>';
                            echo '</div>';
                            echo '<br>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Услуга:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">Транспортная</div>';
                            echo '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Вид услуги:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . $row['vid_usl'] . '</div>';
                            echo '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Дата:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">с ' . date('d.m.Y', strtotime(str_replace('-', '/', $row['data_nach']))) . ' по ' . date('d.m.Y', strtotime(str_replace('-', '/', $row['data_okonch']))) . '</div>';
                            echo '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Марка:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . $row['marka'] . '</div>';
                            echo '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Номер:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . $row['number'] . '</div>';
                            echo '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">ФИО водителя:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . $row['FIo_vod'] . '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            break;
                        case 'vizov_sotr':
                            echo '<div class="col-lg-6 col-md-3 col-sm-1 col-xs-6">';
                            echo '<div class="car_block zayavka">';
                            echo '<div class="row_name_main zayavka_name">Заявка от ' .date('d.m.Y H:i:s', strtotime(str_replace('-', '/', $row['data_zayavki']))). '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Арендатор:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . $row['familiya'] . ' ' . $row['imya'] . ' ' . $row['otchestvo'] . ' ' . $row['nazvanie_organizacii'] . '</div>';
                            echo '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Тел.:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . $row['telephone'] . '</div>';
                            echo '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Доп тел.:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . $row['rezerv_telephone'] . '</div>';
                            echo '</div>';
                            echo '<br>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Услуга:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">Вызов сотрудника</div>';
                            echo '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Сотрудник:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . $row['vid_usl'] . '</div>';
                            echo '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Дата:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . date('d.m.Y', strtotime(str_replace('-', '/', $row['data_nach']))) . '</div>';
                            echo '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Комментарий:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . $row['comment'] . '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            break;
                        case 'razgr_pogr':
                            echo '<div class="col-lg-6 col-md-3 col-sm-1 col-xs-6">';
                            echo '<div class="car_block zayavka">';
                            echo '<div class="row_name_main zayavka_name">Заявка от ' .date('d.m.Y H:i:s', strtotime(str_replace('-', '/', $row['data_zayavki']))). '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Арендатор:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . $row['familiya'] . ' ' . $row['imya'] . ' ' . $row['otchestvo'] . ' ' . $row['nazvanie_organizacii'] . '</div>';
                            echo '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Тел.:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . $row['telephone'] . '</div>';
                            echo '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Доп тел.:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . $row['rezerv_telephone'] . '</div>';
                            echo '</div>';
                            echo '<br>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Услуга:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">Разгрузочно-погрузочная</div>';
                            echo '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Вид услуги:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . $row['vid_usl'] . '</div>';
                            echo '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Дата:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . date('d.m.Y', strtotime(str_replace('-', '/', $row['data_nach']))) . '</div>';
                            echo '</div>';
                            echo '<div class="row car_row place_row">';
                            echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Комментарий:</div>';
                            echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_zayavka">' . $row['comment'] . '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            break;
                    }



                }


                mysqli_close($connect);
                ?>


            </div>
        </div>
    </div>
</body>
</html>