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
                    <li><a href="admin_polzovateli.php">Пользователи</a></li>
                    <div class="cabinet_menu_text">Заявки</div>
                    <li><a href="../car/admin_propuski_car.php">Пропуски на машину</a></li>
<!--                    <li><a href="../bron/admin_zagruzka.php">Резерв под загрузку</a></li>-->
                    <li><a href="../uslugi/admin_zayavki.php">Заявки на услуги</a></li>
                    <li><a href="../personal/admin_propusk_personal.php">Пропуски на персонал</a></li>
                    <li class="exit"><a href="../exit.php">Выход</a></li>
                </ul>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-6">
                <hr>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-6 margin_fixed">

                <?php

                session_start();
                $connect = mysqli_connect('localhost', 'db', '12019991', 'cabinet') or die('<span class="text_text">Ошибка подключения к базе</span>'); //Подключение к базе данных

                $personal_data = mysqli_fetch_array(mysqli_query($connect, 'SELECT user.ID_type_arendatora, ID_user, nomer_dogovora, familiya, imya, otchestvo, password, nazvanie_organizacii, telephone, rezerv_telephone, email, data_podpicaniya_dogovora, naimenovanie FROM user, type_arendatora WHERE user.ID_type_arendatora = type_arendatora.ID_type_arendatora and ID_user = "' . $_POST['edit_arend'] . '"'));

                $type_arendatora = mysqli_query($connect, 'SELECT naimenovanie  FROM type_arendatora'); //Выбор наименований всех типов арендаторов
                $type_placement  = mysqli_query($connect, 'SELECT naimenovanie  FROM type_placement'); //Выбор наименований всех типов помещений

                if (isset($_POST['edit_arend']) ) {
                    echo '<div class="row ">';
                    echo '<div class="col-lg-6 col-md-5 col-sm-5 col-xs-5 main_text"><span>И</span>зменение пользователя</div>';
                    echo '<div class="col-lg-6 col-md-5 col-sm-5 col-xs-5 right" style="margin-top: 40px;"><form action="admin_func.php" method="post"><input type="hidden"  name="id_user"  value="' . $personal_data['ID_user'] . '" /><button name="delete_arend" class="button" type="submit">Удалить пользователя</button></form> </div>';
                    echo '</div>';
                }

                if (isset($_POST['new_arend']) ) {
                    echo '<div class="main_text"><span>Д</span>обавление пользователя</div>';
                    echo '<div class="error"><?php echo $errortext?></div>';
                }

                echo '<div class="row">';
                echo '<div class="col-lg-6 col-md-5 col-sm-6 col-xs-6 ">';
                echo '<div class="personal_info" style="margin-top: 40px">';
                echo '<form action="admin_func.php" method="post">';
                echo '<div class="polz_text">Личная информация</div>';
                echo '<br>';


                echo '<div class="row personal_info_block">';
                echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form_text">Номер договора:</div>
                                    </div>';
                echo '<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"><input type="text" class="dogovor" name="nomer_dogovora" value="' . $personal_data['nomer_dogovora'] . '" required /></div>';
                echo '</div>';
                echo '<div class="row personal_info_block">';
                echo '<div class="col-lg-5 col-md-4 col-sm-4 col-xs-4">
                                        <div class="form_text">Дата подписания:</div>
                                    </div>';
                echo '<div class="col-lg-7 col-md-6 col-sm-6 col-xs-6"><input type="date" name="data_podpicaniya_dogovora" value="' . $personal_data['data_podpicaniya_dogovora'] . '" required /></div>';
                echo '</div>';
                echo '<br>';

                echo '<div class="row personal_info_block">';
                echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form_text">Номер договора:</div>
                                    </div>';
                echo '<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"><input type="text" class="dogovor" name="nomer_dogovora" value="' . $personal_data['nomer_dogovora'] . '" required /></div>';
                echo '</div>';
                echo '<div class="row personal_info_block">';
                echo '<div class="col-lg-5 col-md-4 col-sm-4 col-xs-4">
                                        <div class="form_text">Дата подписания:</div>
                                    </div>';
                echo '<div class="col-lg-7 col-md-6 col-sm-6 col-xs-6"><input type="date" name="data_podpicaniya_dogovora" value="' . $personal_data['data_podpicaniya_dogovora'] . '" required /></div>';
                echo '</div>';
                echo '<br>';

                if (isset($_POST['new_arend'])) {
                    echo '<div class="row personal_info_block">';
                    echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form_text">Тип:</div>
                                    </div>';
                    echo '<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">';
                    echo '<select name="type_arendatora" id="select_type" required>';

                    while ($row = mysqli_fetch_assoc($type_arendatora)) {
                        echo '<option>' . $row['naimenovanie'] . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';
                    echo '</div>';

                    echo '<div class="row personal_info_block" id="ooo">';
                    echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form_text">Название организации:</div>
                                    </div>';
                    echo '<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"><input type="text" name="nazvanie_organizacii" value="' . $personal_data['nazvanie_organizacii'] . '" /></div>';
                    echo '</div>';

                    echo '<div class="row personal_info_block" id="fam">';
                    echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form_text">Фамилия:</div>
                                    </div>';
                    echo '<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"><input type="text" name="familiya" value="' . $personal_data['familiya'] . '" /></div>';
                    echo '</div>';
                    echo '<div class="row personal_info_block" id="im">';
                    echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form_text">Имя:</div>
                                    </div>';
                    echo '<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"><input type="text" name="imya" value="' . $personal_data['imya'] . '" /></div>';
                    echo '</div>';
                    echo '<div class="row personal_info_block" id="ot">';
                    echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form_text">Отчество:</div>
                                    </div>';
                    echo '<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"><input type="text" name="otchestvo" value="' . $personal_data['otchestvo'] . '" /></div>';
                    echo '</div>';
                }

                if (isset($_POST['edit_arend'])) {
                    echo '<div class="row personal_info_block">';
                    echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form_text">Тип:</div>
                                    </div>';
                    echo '<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">';
                    echo '<select name="type_arendatora" id="select_type" required>';
                    echo '<option selected>' . $personal_data['naimenovanie'] . '</option>';

/*                    while ($row = mysqli_fetch_assoc($type_arendatora)) {
                        if ($personal_data['naimenovanie'] != $row['naimenovanie']) {
                            echo '<option>' . $row['naimenovanie'] . '</option>';
                        }
                    }*/

                    echo '</select>';
                    echo '</div>';
                    echo '</div>';

                    if ($personal_data['naimenovanie'] == "ООО") {
                        echo '<div class="row personal_info_block" id="ooo">';
                        echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form_text">Название организации:</div>
                                    </div>';
                        echo '<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"><input type="text" name="nazvanie_organizacii" value="' . $personal_data['nazvanie_organizacii'] . '" /></div>';
                        echo '</div>';
                    } else {

                        echo '<div class="row personal_info_block" id="fam">';
                        echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form_text">Фамилия:</div>
                                    </div>';
                        echo '<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"><input type="text" name="familiya" value="' . $personal_data['familiya'] . '" /></div>';
                        echo '</div>';
                        echo '<div class="row personal_info_block" id="im">';
                        echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form_text">Имя:</div>
                                    </div>';
                        echo '<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"><input type="text" name="imya" value="' . $personal_data['imya'] . '" /></div>';
                        echo '</div>';
                        echo '<div class="row personal_info_block" id="ot">';
                        echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form_text">Отчество:</div>
                                    </div>';
                        echo '<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"><input type="text" name="otchestvo" value="' . $personal_data['otchestvo'] . '" /></div>';
                        echo '</div>';
                    }
                }

                echo '<br>';
                echo '<div class="row personal_info_block">';
                echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form_text">Номер телефона:</div>
                                    </div>';
                echo '<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"><input type="text" name="telephone" class="telephone" value="' . $personal_data['telephone'] . '" /></div>';
                echo '</div>';
                echo '<div class="row personal_info_block">';
                echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form_text">Дополнительный телефон:</div>
                                    </div>';
                echo '<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"><input type="text" name="rezerv_telephone" class="rezerv_telephone" value="' . $personal_data['rezerv_telephone'] . '" /></div>';
                echo '</div>';
                echo '<div class="row personal_info_block">';
                echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form_text">E-mail:</div>
                                    </div>';
                echo '<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"><input type="email" name="email" class="email" value="' . $personal_data['email'] . '" /></div> ';
                echo '</div> ';
                echo '<br>';
                echo '<div class="row personal_info_block">';
                echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form_text">Пароль:</div>
                                    </div>';
                echo '<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"><input type="text" name="password" class="email" value="' . $personal_data['password'] . '" required /></div> ';
                echo '</div> ';
                echo '<br>';

                if (isset($_POST['edit_arend'])) //если редактируем пользователя
                {
                    echo '<div class="row ">';
                    echo '<div class="col-lg-6 col-md-5 col-sm-5 col-xs-5"><input type="hidden"  name="id_user"  value="' . $personal_data['ID_user'] . '" /><button class="button" name="save_arend" type="submit">Сохранить изменения</button></div>';
                    echo '<div class="col-lg-6 col-md-5 col-sm-5 col-xs-5"></div>';
                    echo '</div>';
                    echo '</form>';
                    echo '</div>';
                }

                if (isset($_POST['new_arend']) ) //если новый пользователь
                {
                    echo '<div class="row ">';
                    echo '<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" style="margin-right: 10px;"><button class="button" name="add_polz" type="submit">Добавить пользователя</button></div>';
                    echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"></div>';
                    echo '</div>';
                    echo '</form>';
                    echo '</div>';
                }

                echo '</div>';
                echo '<div class="col-lg-1 col-md-1 col-sm-1 col-xs-6 polz">
                    <hr>
                </div>';

                if (isset($_POST['edit_arend'])) {
                    echo '<div class="col-lg-5 col-md-5 col-sm-6 col-xs-6 ">';
                    echo '<div class="zayavki_text">Помещения</div>';
                    echo '<br>';

                    $placement = mysqli_query($connect, 'SELECT number, ploschad, naimenovanie, placement.ID_placement from placement, type_placement where placement.ID_type_placement = type_placement.ID_type_placement and ID_user="' . $personal_data['ID_user'] . '"  GROUP BY ID_placement');
                    $i = 1;

                    while ($row = mysqli_fetch_assoc($placement)) {
                        echo '<div class="car_block place">';
                        echo '<div class="row">';
                        echo '<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 row_name_main place_name">Помещение №' . $i . '</div>';
                        echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 right">';
                        echo '<form method="post" action="admin_func.php"><button class="delete" style="margin-top: 10px; margin-right: 10px; margin-bottom: 0;" name="delete_place" value="' . $row['ID_placement'] . '"><img src="../img/icons8-delete.png" /></button></form>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="row car_row place_row">';
                        echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Номер:</div>';
                        echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value">' . $row['number'] . '</div>';
                        echo '</div>';
                        echo '<div class="row car_row place_row">';
                        echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Площадь:</div>';
                        echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value">' . $row['ploschad'] . ' м<sup>2</sup></div>';
                        echo '</div>';
                        echo '<div class="row car_row place_row">';
                        echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name">Тип:</div>';
                        echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value">' . $row['naimenovanie'] . '</div>';
                        echo '</div>';
                        echo '</div>';

                        $i++;
                    }

                    echo '<div class="car_block_add place_add">';
                    echo '<form action="admin_func.php" method="post">';
                    echo '<div class="row_name_main ">Новое помещение</div>';
                    echo '<div class="row car_row place_row">';
                    echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name_add">Номер:</div>';
                    echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_add row_value_add_place"><input type="text" name="number" id="number" required /></div>';
                    echo '</div>';
                    echo '<div class="row car_row place_row">';
                    echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name_add">Площадь:</div>';
                    echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_add row_value_add_place">';
                    echo '<input type="number" name="ploshad" id="ploshad" required /> м<sup>2</sup>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="row car_row place_row">';
                    echo '<div class="col-lg-4 col-md-3 col-sm-1 col-xs-6 row_name_add">Тип:</div>';
                    echo '<div class="col-lg-8 col-md-3 col-sm-1 col-xs-6 row_value_add row_value_add_place">';
                    echo '<select name="type_place" id="select_type" style="width: 90%;" required>';

                    while ($row = mysqli_fetch_assoc($type_placement)) {
                        echo '<option>' . $row['naimenovanie'] . '</option>';
                    }

                    echo '</select>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="delete_button"><input type="hidden" name="id_user" value="' . $personal_data['ID_user'] . '" /><button type="submit" class="button save_place" name="add_place">Сохранить</button></div>';
                    echo '</form>';
                }

                mysqli_close($connect);
                ?>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>