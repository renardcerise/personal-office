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
                    <li><a href="../profile/profile.php">Профиль</a></li>
                    <div class="cabinet_menu_text">Заявки</div>
                    <li><a href="car.php">Пропуск на машину</a></li>
                    <li><a href="../bron/zagruzka.php">Резерв под загрузку</a></li>
                    <li><a href="../uslugi/uslugi.php">Заказ доп. услуги</a></li>
                    <li><a href="../personal/personal.php">Пропуск на персонал</a></li>
                    <li class="exit"><a href="../exit.php">Выход</a></li>
                </ul>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-6">
                <hr>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-6 margin_fixed">
                <div class="main_text"><span>А</span>втотехника, допущенная на территорию организации</div>
                <div class="error"><?php echo $errortext?></div>
                <div class="row">


                    <?php

                    $connect = mysqli_connect('localhost', 'db', '12019991', 'cabinet') or die('<span class="text_text">Ошибка подключения к базе</span>'); //Подключение к базе данных

                    $carinfo = mysqli_query($connect, 'SELECT ID_car, marka, number, FIO_voditelya FROM car, user WHERE car.ID_user=user.ID_user and user.nomer_dogovora = "' . $_SESSION['login'] . '"');
                    $i       = 1;
                    while ($row = mysqli_fetch_assoc($carinfo)) {

                        echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
                        echo '<div class="car_block">';
                        echo '<div class="row_name_main">Машина №' . $i . '</div>';
                        echo '<div class="row car_row">';
                        echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Марка:</div>';
                        echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value">' . $row['marka'] . '</div>';
                        echo '</div>';
                        echo '<div class="row car_row">';
                        echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Номер машины:</div>';
                        echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value">' . $row['number'] . '</div>';
                        echo '</div>';
                        echo '<div class="row car_row">';
                        echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">ФИО водителя:</div>';
                        echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value">' . $row['FIO_voditelya'] . '</div>';
                        echo '</div>';
                        echo '<div class="delete_button">';
                        echo '<form method="post" action = "car_func.php"><button class="button" name="delete_car" value="' . $row['ID_car'] . '"">Удалить</button></form>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        $i++;
                    }
                    mysqli_close($connect);
                    ?>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="car_block_add">
                                <form action="car_func.php" method="post">
                                    <div class="row_name_main">Новая машина</div>
                                    <div class="row car_row">
                                        <div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name_add">
                                            Марка:
                                        </div>
                                        <div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_add">
                                            <input type="text" name="marka" id="marka" required />
                                        </div>
                                    </div>
                                    <div class="row car_row">
                                        <div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name_add">
                                            Номер машины:
                                        </div>
                                        <div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_add">
                                            <input type="text" name="car_number" id="car_number" required />
                                        </div>
                                    </div>
                                    <div class="row car_row">
                                        <div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name_add">
                                            ФИО водителя:
                                        </div>
                                        <div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_add">
                                            <input type="text" name="fio_driver" id="fio_driver" required />
                                        </div>
                                    </div>
                                    <div class="delete_button">
                                        <button type="submit" class="button save_car" name="add_car">Сохранить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>