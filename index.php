<?php

use App\Services\RoutingService;

include __DIR__ . "/vendor/autoload.php";
define("BASE_FOLDER", __DIR__);
define('THUMBNAIL_PATH', BASE_FOLDER . "/assets/thumbnails");
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$routingService = new RoutingService();

$routingService->execute();
