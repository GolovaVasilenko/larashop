<?php

    if(!defined('ROOT')) define('ROOT', dirname(__DIR__));
    if(!defined('WWW')) define('WWW', ROOT . "/public");
    if(!defined('APP')) define('APP', ROOT . "/app");
    if(!defined('CORE')) define('CORE', ROOT . "/resources");
    if(!defined('LIBS')) define('LIBS', ROOT . "/resources/libs");
    if(!defined('CACHE')) define('CACHE', ROOT . "/tmp/cache");
    if(!defined('CONF')) define('CONF', ROOT . "/config");
    if(!defined('LAYOUT')) define('LAYOUT', ROOT . "app.blade.php");
    if(!defined('GALLERY')) define('GALLERY', WWW . "/uploads/gallery");
    if(!defined('IMG')) define('IMG', WWW . "/uploads/single");

    $host = false;
    $protocol = 'http://';

    if(isset($_SERVER['HTTP_HOST'])) {
        $host = $_SERVER['HTTP_HOST'];
    }

    $allowed_host = $protocol . $host . '/index.php';

    if(!defined('PATH')) define('PATH', $protocol . $host . '/');
    if(!defined('ADMIN')) define('ADMIN', PATH . 'admin/index');
