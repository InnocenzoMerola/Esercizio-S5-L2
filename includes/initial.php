<?php

include_once __DIR__ . "/constants.php";
include __DIR__ . "/language.php";

$cookie_time = time() + 60 * 60 * 24 * 365 * 10;
if(isset($_GET['changetheme'])){
    if(!isset($_COOKIE['theme'])){
        setcookie('theme', 'light', $cookie_time);
    }else{
        setcookie('theme', $_COOKIE['theme'] === 'light' ? 'dark' : 'light', $cookie_time);
    }
    header("Location: $_SERVER[HTTP_REFERER]");
    exit;
}

if(!isset($_COOKIE['theme'])){
    setcookie('theme', 'light', $cookie_time);
    $isLight = true;
}else{
    $isLight = $_COOKIE['theme'] === 'light' ? true : false;
}


if(!isset($_COOKIE['language'])){
    setcookie('language', 'it', $cookie_time);
    $language = 'it';
}else{
    $language = $_COOKIE['language'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/<?= $isLight ? "light.css" : "dark.css" ?>" />
    <title>EpiTranslate</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg <?= $isLight ? "bg-light" : "bg-dark" ?>">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#">EpiTranslate</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./">Home</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="?changetheme"><?= $isLight ? 
                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-fill" viewBox="0 0 16 16">
                            <path d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278"/>
                          </svg>' : 
                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-high-fill" viewBox="0 0 16 16">
                            <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/>
                          </svg>'
                            ?></a>
                    </li>     
                </ul>
                <form class="d-flex" method="get" action="<?= SITE_URL . "/change_language.php" ?>" id="languagesForm">
                    <select name="language" onchange="document.getElementById('languagesForm').submit()">
                        <option value="it" <?= $language === "it" ? 'selected' : '' ?>>ITA</option>
                        <option value="en" <?= $language === "en" ? 'selected' : '' ?>>ENG</option>
                        <option value="fr" <?= $language === "fr" ? 'selected' : '' ?>>FRA</option>
                        <option value="sp" <?= $language === "sp" ? 'selected' : '' ?>>SPA</option>
                    </select>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
            <div class="row row-gap-3">
     
