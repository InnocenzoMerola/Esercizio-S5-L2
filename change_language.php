<?php

$cookie_time = time() + 60 * 60 * 24 * 365 * 10;

if(isset($_GET['language'])){
    setcookie('language', $_GET['language'], $cookie_time);
}

header("Location: $_SERVER[HTTP_REFERER]");
exit;