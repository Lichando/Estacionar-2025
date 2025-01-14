<?php 
/**
 * Clase Iniciadora para el manejo de rutas y controladores
 */
class App
{
    protected $controller = "app\\controllers\\"."HomeController";
    protected $method = "actionIndex";
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        $controllerName = isset($url[0]) ? ucfirst(strtolower($url[0])) . "Controller" : $this->controller;
        $controllerPath = APP_PATH . "controllers/" . $controllerName . ".php";
        
        // Verificar si el controlador existe
        if ($this->controllerExists($controllerPath)) {
            $this->controller = APP_PATH . "controllers/" . $controllerName;
            unset($url[0]);
        } else {
            $this->handleControllerNotFound($url);
        }

        $controller = $this->getControllerClass($this->controller);

        $this->controller = new $controller;

        // Manejo de métodos
        $methodName = $this->getMethodFromUrl($url);
        $this->method = method_exists($this->controller, $methodName) ? $methodName : 'action404';

        $this->params = $url ? array_values($url) : [];
        
        // Llama al método del controlador con los parámetros
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // Parsear la URL
    public function parseUrl()
    {
        return isset($_GET['url']) ? explode("/", filter_var(rtrim($_GET["url"], "/"), FILTER_SANITIZE_URL)) : [];
    }

    // Verificar si el controlador existe
    protected function controllerExists($path)
    {
        return file_exists($path);
    }

    // Obtener el nombre del controlador con el namespace adecuado
    protected function getControllerClass($controllerPath)
    {
        return str_replace('/', '\\', $controllerPath);
    }

    // Manejar cuando el controlador no existe
    protected function handleControllerNotFound(&$url)
    {
        if (isset($url[0])) {
            $this->method = 'action404';
            unset($url[0]);
        }
    }

    // Obtener el método desde la URL
    protected function getMethodFromUrl(&$url)
    {
        return isset($url[1]) ? "action" . ucfirst(strtolower($url[1])) : $this->method;
    }
}
