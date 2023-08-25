<?php

namespace App\Services;

class RoutingService
{

    public function getAdminActionByRoute($action = '', $requestType = 'GET'): string
    {
        if ($action == 'create') return 'create';
        if ($action == 'edit') return 'edit';
        if (empty($action) && $requestType === 'GET') return 'index';
        if (empty($action) && $requestType === 'POST') return 'store';
        if (!empty($action) && $requestType === 'GET') return 'show';
        if (!empty($action) && $requestType === 'POST') return 'update';
        if (!empty($action) && $requestType === 'DELETE') return 'delete';
        return '';
    }

    protected function adminControllerName($path, $urlPath): array
    {
        if ($path != 'admin') {
            return false;
        }
        $urlParted = explode("/", $urlPath);
        $modelName = $urlParted[1] ?? '';
        $modelName = empty($modelName) ? 'dashboard' : $modelName;
        $modelName = ucfirst($modelName);
        $action = $this->getAdminActionByRoute($urlParted[2] ?? '', $_SERVER['REQUEST_METHOD']);
        return [sprintf("App\\Controllers\\Admin\\%sController", $modelName), $action];
    }

    protected function controllerName()
    {
        $urlPath = trim($_SERVER["REQUEST_URI"], '/');
        $action = explode("/", $urlPath, 2)[0];
        if ($adminController = $this->adminControllerName($action, $urlPath)) {
            return $adminController;
        }
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
        if (is_array($controller)) {
            return $this->executeAdmin($controller);
        }
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

    public function executeAdmin(array $callable)
    {
        list($className, $methodName) = $callable;
        if (!class_exists($className) || empty($methodName)) {
            echo "NOT FOUND";
            return; // 404 page not found
        }
        $parameters = $this->getUrlParameters();
        try {
            return (new $className())->$methodName(...$parameters);
        } catch (\Throwable $th) {
            echo "SERVER ERROR <br/>";
            echo $th->getMessage();
            return; // 500 
        }
    }
}
