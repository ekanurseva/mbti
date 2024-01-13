<?php
session_start();
$_SESSION = [];
// unset untuk memastikan apakah ada session yang masih aktif atau tidak
session_unset();
session_destroy();

//menghapus cookie
// setcookie('key cookie', ''(dikosongkan), 'waktu yang sudah lalu')
setcookie('SPmbti', '', time() - 3600);

header("Location: index.php");
exit;
?>