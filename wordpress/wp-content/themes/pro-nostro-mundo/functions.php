<?php

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

include __DIR__ . '/inc/inc.vite.php';
include __DIR__ . '/inc/inc.acf.php';
include __DIR__ . '/inc/inc.themsupports.php';
include __DIR__ . '/inc/inc.widgets.php';