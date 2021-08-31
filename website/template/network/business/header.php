<?php
error_reporting(0);
if (!defined('AppiEngine')) {
    header( "refresh:0; url=/");
}
global $user;
global $qb;
global $fractionId;

$fractionId = 6;

$bName = $this->titleHtml;
$logo = 'https://gtalogo.com/img/6765.png';
$bDesc = 'Добро пожаловать на официальный сайт Arcadius Business Center!';
$bTitle = $bName;
$bImg = $logo;

if (isset($_GET['newsId']) && is_numeric($_GET['newsId'])) {
    $item = $qb->createQueryBuilder('rp_news')->selectSql()->where('id = ' . intval($_GET['newsId']))->orderBy('id DESC')->executeQuery()->getSingleResult();

    $bTitle = htmlspecialchars_decode($item['title']);
    $bImg = htmlspecialchars_decode($item['img']);
    $bDesc = 'Автор: ' . htmlspecialchars_decode($item['author_name']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title><?php
error_reporting(0); echo $bTitle; ?></title>

    <meta property="og:title" content="<?php
error_reporting(0); echo $bTitle ?>" />
    <meta property="og:description" content="<?php
error_reporting(0); echo $bDesc ?>" />
    <meta property="og:site_name" content="<?php
error_reporting(0); echo $bName ?>">
    <meta property="og:image" content="<?php
error_reporting(0); echo $bImg ?>">
    <meta property="og:image:secure_url" content="<?php
error_reporting(0); echo $bImg ?>">
    <meta property="og:image:alt" content="<?php
error_reporting(0); echo $bTitle ?>">
    <meta property="og:locale" content="ru_RU">

    <meta name="description" content="<?php
error_reporting(0); echo $bDesc ?>">

    <link rel="shortcut icon" href="<?php
error_reporting(0); echo $logo ?>">

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="/client/css/extended.css?v=5" type="text/css" rel="stylesheet" media="screen,projection"/>

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="/client/js/extended.js"></script>
    <script src="/client/js/main.js?v=31"></script>

</head>
<body>