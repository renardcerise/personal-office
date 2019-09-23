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
                    <li><a href="../car/car.php">Пропуск на машину</a></li>
                    <li><a href="../bron/zagruzka.php">Резерв под загрузку</a></li>
                    <li><a href="uslugi.php">Заказ доп. услуги</a></li>
                    <li><a href="../personal/personal.php">Пропуск на персонал</a></li>
                    <li class="exit"><a href="../exit.php">Выход</a></li>
                </ul>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-6">
                <hr>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-6 margin_fixed">

                <div class=" top_menu_uslugi">
                    <ul class="menu menu_uslugi">
                        <li class="active_li" id="razgruzka_pogruzka">Разгрузочно-погрузочные</li>
                        <li id="vizov_sotrudnika">Вызов сотрудника</li>
                        <li id="transport">Транспорт</li>
                        <li id="stroitelstvo">Строительство</li>
                    </ul>
                </div>

                <div class="usluga razgruzka_pogruzka">
                    <form action="uslugi_func.php" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="row uslugi_row">
                                    <div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name_add">
                                        Вид услуги:
                                    </div>
                                    <div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_add">
                                        <select name="vid_razgr_pogr" required>

                                            <?php
                                            $connect = mysqli_connect('localhost', 'db', '12019991', 'cabinet') or die('<span class="text_text">Ошибка подключения к базе</span>'); //Подключение к базе данных

                                            $vid_razgr_pogr = mysqli_query($connect, 'SELECT naimenovanie  FROM vid_razgr_pogr'); //Выбор наименований всех видов услуги

                                            while ($row = mysqli_fetch_assoc($vid_razgr_pogr)) {
                                                echo '<option>'.$row['naimenovanie'].'</option>';

                                            }
                                            mysqli_close($connect); //Закрываем подключение к БД
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="row uslugi_row">
                                    <div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name_add">
                                        Дата:
                                    </div>
                                    <div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_add">
                                        <input type="date" class="date_today" name="date" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="row uslugi_row">
                                    <div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name_add">
                                        Комментарий:
                                    </div>
                                    <div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_add">
                                        <textarea name="message" placeholder="Например, разгрузка 3 машин с вентялиционным оборудованием около 13 часов"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="zayavka_button">
                            <button type="submit" class="button" name="zayavka_razgr_pogr">Отправить заявку</button>
                        </div>
                    </form>
                </div>

                <div class="usluga vizov_sotrudnika">
                    <form action="uslugi_func.php" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="row uslugi_row">
                                    <div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name_add">
                                        Сотрудник:
                                    </div>
                                    <div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_add">
                                        <select name="vid_sotr" required>

                                            <?php
                                            $connect = mysqli_connect('localhost', 'db', '12019991', 'cabinet') or die('<span class="text_text">Ошибка подключения к базе</span>'); //Подключение к базе данных

                                            $vid_sotrudnika = mysqli_query($connect, 'SELECT naimenovanie  FROM vid_sotrudnika'); //Выбор наименований всех видов услуги

                                            while ($row = mysqli_fetch_assoc($vid_sotrudnika)) {
                                                echo '<option>'.$row['naimenovanie'].'</option>';

                                            }
                                            mysqli_close($connect); //Закрываем подключение к БД
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="row uslugi_row">
                                    <div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name_add">
                                        Дата:
                                    </div>
                                    <div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_add">
                                        <input type="date" class="date_today" name="date" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="row uslugi_row">
                                    <div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name_add">
                                        Комментарий:
                                    </div>
                                    <div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_add">
                                        <textarea name="message" placeholder="Например, помещение №205, влажная уборка + помыть окна"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="zayavka_button">
                            <button type="submit" class="button" name="zayavka_personal">Отправить заявку</button>
                        </div>
                    </form>
                </div>

                <div class="usluga transport">
                    <form action="uslugi_func.php" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="row uslugi_row">
                                    <div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name_add">
                                        Заявка:
                                    </div>
                                    <div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_add">
                                        <select name="vid_zayavki" required>

                                            <?php
                                            $connect = mysqli_connect('localhost', 'db', '12019991', 'cabinet') or die('<span class="text_text">Ошибка подключения к базе</span>'); //Подключение к базе данных

                                            $vid_zayavki = mysqli_query($connect, 'SELECT naimenovanie  FROM vid_zayavki'); //Выбор наименований всех видов услуги

                                            while ($row = mysqli_fetch_assoc($vid_zayavki)) {
                                                echo '<option>'.$row['naimenovanie'].'</option>';

                                            }
                                            mysqli_close($connect); //Закрываем подключение к БД
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="row uslugi_row">
                                    <div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name_add">
                                        Дата:
                                    </div>
                                    <div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_add">
                                        с
                                        <input type="date" class="date_today mini_date date_nach" name="date_nach" required />
                                        <br>по
                                        <input type="date" class="date_today mini_date date_okonch" name="date_okonch" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="row uslugi_row">
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name_add">
                                            Марка:
                                        </div>
                                        <div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_add">
                                            <input type="text" name="marka" required />
                                        </div>
                                    </div>
                                    <div class="row car_row">
                                        <div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name_add">
                                            Номер машины:
                                        </div>
                                        <div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_add">
                                            <input type="text" name="car_number" required />
                                        </div>

                                    </div>
                                    <div class="row car_row">
                                        <div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name_add">
                                            ФИО водителя:
                                        </div>
                                        <div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_add">
                                            <input type="text" name="fio_driver" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="zayavka_button">
                            <button type="submit" class="button" name="zayavka_transport">Отправить заявку</button>
                        </div>
                    </form>
                </div>

                <div class="usluga stroitelstvo">
                    <form action="uslugi_func.php" method="post">
                        <div class="row uslugi_row">
                            <div class="col-lg-2 col-md-3 col-sm-1 col-xs-6 row_name_add">
                                Комментарий:
                            </div>
                            <div class="col-lg-10 col-md-3 col-sm-1 col-xs-6 row_value_add">
                                <textarea name="message" placeholder="Например, покраска стен в помещении 202а"></textarea>
                            </div>
                        </div>
                        <div class="zayavka_button">
                            <button type="submit" class="button" name="zayavka_stroitelstvo">Отправить заявку</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>