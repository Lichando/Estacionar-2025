<?php
/**
 * Conexión con la Base de Datos utilizando PDO
 */
class DataBase
{
    private static $host = "localhost";
    private static $dbname = "basededatosNombre";
    private static $dbuser = "root";
    private static $dbpass = "";

    private static $dbh = null; // Database handler
    private static $error;

    // Obtener una instancia de la conexión PDO
    private static function connection()
    {
        if (self::$dbh === null) {
            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$dbname;
            $opciones = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            try {
                self::$dbh = new PDO($dsn, self::$dbuser, self::$dbpass, $opciones);
                self::$dbh->exec('SET NAMES utf8');
                self::$dbh->exec('SET time_zone = "-03:00";');
            } catch (PDOException $e) {
                self::$error = $e->getMessage();
                throw new Exception("Error de conexión: " . self::$error);
            }
        }
        return self::$dbh;
    }

    // Ejecutar una consulta con parámetros
    public static function query($sql, $params = [])
    {
        $statement = self::prepareAndExecute($sql, $params);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    // Ejecutar un SQL que no requiere obtener resultados
    public static function execute($sql, $params = [])
    {
        return self::prepareAndExecute($sql, $params)->rowCount();
    }

    // Obtener el número de registros afectados
    public static function rowCount($sql, $params = [])
    {
        return self::prepareAndExecute($sql, $params)->rowCount();
    }

    // Obtener nombres de columnas de una tabla
    public static function getColumnsNames($table)
    {
        $sql = "SELECT column_name FROM information_schema.columns WHERE table_name = :table";
        return self::query($sql, ['table' => $table]);
    }

    // Ejecutar una transacción
    public static function ejecutar($sql)
    {
        $dbh = self::connection();
        try {
            $dbh->beginTransaction();
            $statement = $dbh->prepare($sql);
            $statement->execute();
            $dbh->commit();
            return ['state' => true, 'notification' => 'Operación exitosa'];
        } catch (PDOException $e) {
            $dbh->rollBack();
            return ['state' => false, 'notification' => $e->errorInfo[2] ?? 'Error desconocido'];
        }
    }

    // Preparar y ejecutar una consulta con manejo de excepciones
    private static function prepareAndExecute($sql, $params = [])
    {
        $statement = self::connection()->prepare($sql);
        try {
            $statement->execute($params);
        } catch (PDOException $e) {
            throw new Exception("Error en la consulta: " . $e->getMessage());
        }
        return $statement;
    }
}
