<?php
session_start();
session_unset();
session_destroy();
setcookie(session_name(), '', time() - 60 * 60 * 24 * 32, '/');
header('Location: auth/auth.php');
?>