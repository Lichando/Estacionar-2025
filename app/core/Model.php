<?php 
/**
 * Clase Modelo base para interactuar con la base de datos
 */
class Model
{
    protected $table; // Tabla de la base de datos
    protected $primaryKey = "id"; // Clave primaria

    // Buscar un registro por ID
    public static function findId($id)
    {
        $model = new static();
        $sql = "SELECT * FROM " . $model->table . " WHERE " . $model->primaryKey . " = :id";
        $params = ["id" => $id];
        $result = DataBase::getRecord($sql, $params);

        // Asignar los valores devueltos al modelo si hay un resultado
        if ($result) {
            foreach ($result as $key => $value) {
                $model->$key = $value;
            }
        }

        return $model;
    }

    // Obtener todos los registros de la tabla
    public static function getAll()
    {
        $model = new static();
        $sql = "SELECT * FROM " . $model->table;
        return DataBase::getRecords($sql);
    }

    // Obtener nombres de las columnas de una tabla
    public static function getColumnsNames($table)
    {
        return DataBase::getColumnsNames($table);
    }
}
