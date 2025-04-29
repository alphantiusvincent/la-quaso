<?php
//isi disini
session_start();
session_unset();
session_destroy();

setcookie('no_rekening', '', time() - 3600, "/");
header("Location: login.php");
exit();
?>