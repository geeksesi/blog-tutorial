<?php

use App\Services\RoutingService;

include __DIR__ . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$routingService = new RoutingService();

$routingService->execute();
