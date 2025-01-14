<?php 
/**
 * Clase encargada de la carga automática de clases
 */
class Autoloader
{
    public function __construct()
    {
        $this->loadAppClasses();
    }

    /**
     * Registra la función de autoload para cargar clases automáticamente
     */
    private function loadAppClasses()
    {
        spl_autoload_register(function ($nombreClase) {
            $clasesParaCargaAutomatica = ['App', 'Controller', 'Model', 'Response', 'DataBase'];
            $cargaAutomatica = false;

            foreach ($clasesParaCargaAutomatica as $clase) {
                if (strstr($nombreClase, $clase)) {
                    $cargaAutomatica = true;
                    break; // Salir del bucle cuando se encuentre una coincidencia
                }
            }

            // Si la clase cumple con los criterios, se carga
            if ($cargaAutomatica) {
                require_once str_replace('\\', '/', $nombreClase).".php";
            } else {
                // Si no, lanzamos una excepción clara
                throw new Exception("No se pudo cargar la clase: $nombreClase");
            }
        }, true, false);
    }
}

// Instanciamos el Autoloader
new Autoloader();
