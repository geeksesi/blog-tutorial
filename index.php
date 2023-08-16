<?php

use App\Services\RoutingService;

include __DIR__ . "/vendor/autoload.php";

$routingService = new RoutingService();

$routingService->execute();
