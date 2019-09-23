<?php

$telephone = $_POST["telephone"];
$rezerv_telephone = $_POST["rezerv_telephone"];
$email = $_POST["email"];

session_start();

$connect = mysqli_connect('localhost', 'db', '12019991', 'cabinet') or die('<span class="text_text">Ошибка подключения к базе</span>'); //Подключение к базе данных

mysqli_query($connect, 'UPDATE user SET telephone="'.$telephone.'", rezerv_telephone="'.$rezerv_telephone.'", email = "'.$email.'" WHERE nomer_dogovora = "'.$_SESSION['login'].'"');

header('Location: profile.php');

mysqli_close($connect);
?>