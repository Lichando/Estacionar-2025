<?php 
/**
 * Clase para mostrar las vistas
 */
class Response
{
    // Constructor privado para evitar instanciación
    private function __construct() {}

    // Renderizar una vista con variables
    public static function render($viewDir, $view, $vars = [])
    {
        // Validar las variables antes de asignarlas dinámicamente
        foreach ($vars as $key => $value) {
            if (preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $key)) {
                $$key = $value;
            }
        }

        $viewPath = APP_PATH . "views/" . $viewDir . $view . ".php";

        // Verificar si la vista existe antes de cargarla
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            throw new Exception("La vista $view no se encuentra en el directorio $viewDir");
        }
    }
}
