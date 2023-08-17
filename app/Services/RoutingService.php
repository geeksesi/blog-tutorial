<?php

namespace App\Services;

class RoutingService
{
    protected function controllerName()
    {
        $urlPath = trim($_SERVER["REQUEST_URI"], '/');
        $action = explode("/", $urlPath, 2)[0];
        $action = empty($action) ? 'home' : $action;
        $controller = ucfirst($action);
        return sprintf("App\\Controllers\\%sController", $controller);
    }

    protected function getUrlParameters(): array
    {
        $urlPath = trim($_SERVER["REQUEST_URI"], '/');
        $paths = explode("/", $urlPath);
        unset($paths[0]);
        return $paths;
    }

    public function execute()
    {
        $controller = $this->controllerName();
        if (!class_exists($controller)) {
            echo "NOT FOUND";
            return; // 404 page not found
        }
        $parameters = $this->getUrlParameters();
        try {
            return (new $controller())(...$parameters);
        } catch (\Throwable $th) {
            echo "SERVER ERROR <br/>";
            echo $th->getMessage();
            return; // 500 
        }
    }
}
