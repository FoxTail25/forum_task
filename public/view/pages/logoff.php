<?php
unset($_SESSION['user']);
unset($_SESSION['user']);
session_destroy();
header('Location: /');
die();
?>