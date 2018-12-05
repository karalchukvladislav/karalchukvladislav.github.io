<?php
// настройки подключения к бд

$dbhost = "cp.aurum.neolocation.net";
$dblogin = "epiby";
$dbpasswd = "qeR1ju0kvyHd";
$dbname = "epiby";

// общие настройки

$config_id_name = "mID";

$site_url = "http://pesante.neolocation.net/";

$site_footer = '© 2011, РУП "Белтаможсервис". All rights reserved.';

$db = new mysqli($dbhost, $dblogin, $dbpasswd, $dbname) or die("Невозможно подключится к базе данных:".mysqli_connect_error());


?>