<?php
$login = $_POST["login"];
$pass  = $_POST["password"];

$connect = mysqli_connect('localhost', 'db', '12019991', 'cabinet') or die('<span class="text_text">Ошибка подключения к базе</span>'); //Подключение к базе данных

$result = mysqli_fetch_array(mysqli_query($connect, 'SELECT nomer_dogovora, password, prava_dostypa FROM user WHERE nomer_dogovora = "' . $login . '" AND password = "' . $pass . '"')); //Проверка логина и пароля

if ($result['nomer_dogovora'] === $login && $result['password'] === $pass) { //Если в базе существует такой набор логина и пароля
	session_start();
	$_SESSION['login'] = $login; //Помещаем в сессию имя логина

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
} else { //Если в базе не существует такого набора логина и пароля
	$errortext = 'Неверный логин или пароль';
	require('auth.php');

	mysqli_close($connect); //Закрываем подключение к бд
	die();
}
?>