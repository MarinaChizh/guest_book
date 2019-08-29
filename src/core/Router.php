<?php

namespace App\Core;

class Router
{
    public function __construct()
    {
        $this->controllerName = ($_GET["t"] ?? 'site') . 'Controller';
        $this->actionName = 'action' . ($_GET["a"] ?? 'home');
    }
    public function run()
    {
        echo $className = "App\\Controller\\{$this->controllerName}";
        if (class_exists($className)) {
            $MVC = new $className();
            if (method_exists($MVC, $this->actionName)) {
                $MVC->{$this->actionName}();
            } else {
                echo "нет такого метода: $this->actionName";
                // (new ErrorController())->notFoundAction($this->actionName);
            }
        } else {
            echo "нет такого класса: $this->controllerName";
            // (new ErrorController())->notFoundController($this->controllerName);
        }
    }
}
