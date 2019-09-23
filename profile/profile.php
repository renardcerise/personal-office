<?php
session_start();
if(!isset($_SESSION['login'])){header('Location: ../auth/auth.php');} //Если не авторизированы

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
                    <li><a href="profile.php">Профиль</a></li>
                    <div class="cabinet_menu_text">Заявки</div>
                    <li><a href="../car/car.php">Пропуск на машину</a></li>
                    <li><a href="../bron/zagruzka.php">Резерв под загрузку</a></li>
                    <li><a href="../uslugi/uslugi.php">Заказ доп. услуги</a></li>
                    <li><a href="../personal/personal.php">Пропуск на персонал</a></li>
                    <li class="exit"><a href="../exit.php">Выход</a></li>
                </ul>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-6 ">
                <hr>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-6 margin_fixed">
                <?php

                $connect = mysqli_connect('localhost', 'db', '12019991', 'cabinet') or die('<span class="text_text">Ошибка подключения к базе</span>'); //Подключение к базе данных

                $personal_data = mysqli_fetch_array(mysqli_query($connect, 'SELECT  familiya, imya, otchestvo, nazvanie_organizacii, telephone, rezerv_telephone, email, data_podpicaniya_dogovora FROM user WHERE nomer_dogovora = "' . $_SESSION['login'] . '"'));

                $tip = mysqli_fetch_array(mysqli_query($connect, 'SELECT user.ID_type_arendatora, type_arendatora.naimenovanie FROM user, type_arendatora WHERE nomer_dogovora = "' . $_SESSION['login'] . '" and type_arendatora.ID_type_arendatora=user.ID_type_arendatora '));

                echo '<div class="full_profil_info">';
                echo '<div class="first_row">';
                echo '<div class="profile_block">Тип: <span>' . $tip['naimenovanie'] . '</span></div>';

                if ($tip['ID_type_arendatora'] == 3) //если ООО, выбираем название организации
                {
                    echo ' <div class="profile_block">Название организации: <span>' . $personal_data['nazvanie_organizacii'] . '</span></div>';
                } else { // значит ФЛ или ИП, выбираем ФИО
                    echo ' <div class="profile_block">Фамилия: <span>' . $personal_data['familiya'] . '</span></div>';
                    echo '<div class="profile_block">Имя: <span>' . $personal_data['imya'] . '</span></div>';
                    echo '<div class="profile_block">Отчество: <span>' . $personal_data['otchestvo'] . '</span></div>';
                }


                echo ' </div>';
                echo '<br>';
                echo '<div class="second_row">';
                echo '<div class="profile_block">Номер договора: <span>' . $_SESSION['login'] . '</span></div>';
                echo '<div class="profile_block">Дата подписания: <span>' . date('d.m.Y', strtotime(str_replace('-', '/', $personal_data['data_podpicaniya_dogovora']))) . '</span></div>';
                echo '</div>';
                echo ' <br>';


                $info_placement = mysqli_query($connect, 'SELECT number, ploschad, naimenovanie FROM placement, type_placement, user WHERE user.nomer_dogovora = "' . $_SESSION['login'] . '" and placement.ID_type_placement = type_placement.ID_type_placement and placement.ID_user = user.ID_user');

                while ($row = mysqli_fetch_assoc($info_placement)) {
                    echo ' <div class="third_row">';
                    echo ' <div class="profile_block">Номер помещения: <span>' . $row['number'] . '</span></div>';
                    echo ' <div class="profile_block">Площадь помещения: <span>' . $row['ploschad'] . ' м2</span></div>';
                    echo '<div class="profile_block">Тип помещения: <span>' . $row['naimenovanie'] . '</span></div>';
                    echo '</div>';

                }


                echo '</div>';

                echo '<div class="personal_info">';
                echo '<form action="personal_info.php" method="post">';
                echo '<div class="row personal_info_block">';
                echo '<div class="col-lg-3 col-md-4 col-sm-4 col-xs-4"><div class="form_text">Номер телефона:</div></div>';
                echo '<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6"><input type="text" name="telephone" class="telephone" value="' . $personal_data['telephone'] . '" required/></div>';
                echo '<div class="col-lg-5 col-md-6 col-sm-6 col-xs-6"></div>';
                echo '</div>';
                echo '<div class="row personal_info_block">';
                echo '<div class="col-lg-3 col-md-4 col-sm-4 col-xs-4"><div class="form_text">Дополнительный телефон:</div></div>';
                echo '<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6"><input type="text" name="rezerv_telephone" class="rezerv_telephone" value="' . $personal_data['rezerv_telephone'] . '"/></div>';
                echo '<div class="col-lg-5 col-md-6 col-sm-6 col-xs-6"></div>';
                echo '</div>';
                echo '<div class="row personal_info_block">';
                echo '<div class="col-lg-3 col-md-4 col-sm-4 col-xs-4"><div class="form_text">E-mail:</div></div>';
                echo '<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6"><input type="email" name="email" class="email" value="' . $personal_data['email'] . '"/></div> ';
                echo '<div class="col-lg-5 col-md-6 col-sm-6 col-xs-6"></div>';
                echo '</div> ';
                echo '<div class="row right">';
                echo '<div class="col-lg-3 col-md-4 col-sm-4 col-xs-4"></div>';
                echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><button class="button" type="submit">Сохранить изменения</button></div>';
                echo '</div>';
                echo '</form>';
                echo '</div>';

                mysqli_close($connect);
                ?>

                <div class="password">
                    <form action="password.php" method="post">
                        <div class="row personal_info_block">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                                <div class="form_text">Старый пароль:</div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6"><input type="password" name="old_pass" minlength="4" required />
                                <div class="error"><?php echo $errortext_old?></div>

                                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6"></div>
                            </div>
                        </div>
                        <div class="row personal_info_block">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                                <div class="form_text">Новый пароль:</div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6"><input type="password" name="new_pass" minlength="4" /></div>
                            <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6"></div>
                        </div>
                        <div class="row personal_info_block">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                                <div class="form_text">Повторите пароль:</div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6"><input type="password" name="new_pass_povtor" minlength="4" />
                                <div class="error"><?php echo $errortext_new;?></div>
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6"></div>
                        </div>

                        <div class="row right">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4"></div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><button class="button" type="submit">Изменить пароль</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>