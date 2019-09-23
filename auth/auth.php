<?php
session_start();
if (isset($_SESSION['login'])) {
    $connect = mysqli_connect('localhost', 'db', '12019991', 'cabinet') or die('<span class="text_text">Ошибка подключения к базе</span>'); //Подключение к базе данных

    $result = mysqli_fetch_array(mysqli_query($connect, 'SELECT prava_dostypa FROM user WHERE nomer_dogovora = "' . $_SESSION['login'] . '" ')); //Проверка логина и пароля

    if ($result['prava_dostypa'] == "0") //Если права администратора
    {
        header('Location: ../profile/admin_polzovateli.php');
        mysqli_close($connect); //Закрываем подключение к бд
        die();
    } else { //Если права пользователя
        header('Location: ../profile/profile.php');
        mysqli_close($connect); //Закрываем подключение к бд
        die();
    }
}



?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Авторизация</title> <!--название вкладки в браузере-->
    <link href="http://psk-technology.ru/wp-content/themes/psk/css/bootstrap.min.css" rel="stylesheet"><!--bootstrap-->
    <link href="http://psk-technology.ru/wp-content/themes/psk/css/style.css?1" rel="stylesheet"> <!--стили основного сайта-->
    <link href="https://fonts.googleapis.com/css?family=Exo+2:300,400,700&amp;subset=cyrillic" rel="stylesheet"> <!--шрифт-->
    <link rel="canonical" href="http://psk-technology.ru/" />

    <link rel='shortlink' href='http://psk-technology.ru/' />
    <style>
        html {
            margin-top: 0px !important;
        }
    </style>

    <!--подключенные собственные файлы-->
    <link rel="stylesheet" href="style_auth.css">

    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/mask.js"></script>
    <script type="text/javascript" src="script_auth.js"></script>
</head>
<body>
<!--шапка сайта-->
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
<!--основной контент страницы-->
<div id="main-content">
    <div class="bg-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-2 col-sm-2 col-xs-1"></div>
                <div class="col-lg-6 col-md-8 col-sm-8 col-xs-10">
                    <div class="auth_form">
                        <h2 class="head_form"><span>В</span>ведите свои данные</h2>
                        <!--форма ввода логина и пароля-->
                        <form id="form" method="post" action="script_auth.php">
                            <div class="row">
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <div class="form_text dogovor">Номер договора:</div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <input type="text" name="login" class="login" required />
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <div class="form_text">Пароль:</div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <input type="password" name="password" minlength="4" required />
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <button class="button" type="submit">Войти</button>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                            </div>
                        </form>
                        <div class="bottom_text">
                            <!--сообщение об ошибке в случае неправильных логина и/или пароля-->
                            <span class="error"><?php echo $errortext;?></span>
                            <br>
                            <span class="small_txt text_after_form">Нажимая кнопку "войти", вы соглашаетесь на <a href="/politicspsk-technology.pdf" target="_blank">обработку ваших персональных данных</a>.</span>
                            <br>
                            <span class="small_txt text_after_form">* при отсутствии доступа к личному кабинету обратитесь к управляющему</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2 col-sm-2 col-xs-1"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
