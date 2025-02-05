<?php

namespace app\models;

use \DataBase;
use \Model;

class FranjaModel extends Model
{
    protected $table = "franjas_horarias";
    protected $primaryKey = "idFranja";


    public static function agregar($franjaData)
    {
        $model = new static();

        $operacion['status'] = true;
        $operacion['msg'] = '';

        $nombre = $franjaData['nombre'];
        $horaDesde = $franjaData['horaDesde'];
        $horaHasta = $franjaData['horaHasta'];
        $fechaDesde = $franjaData['fechaDesde'];
        $fechaHasta = $franjaData['fechaHasta'];
        $estado = $franjaData['estado'];
        $lun = $franjaData['lun'];
        $mar = $franjaData['mar'];
        $mie = $franjaData['mie'];
        $jue = $franjaData['jue'];
        $vie = $franjaData['vie'];
        $sab = $franjaData['sab'];
        $dom = $franjaData['dom'];
        $fer = $franjaData['fer'];

        $sqlFranja = "INSERT INTO franjas_horarias(nombre, hora_inicio, hora_fin, fecha_inicio, fecha_fin, lun, mar, mir, jue, vie, sab, dom, fer, estado) 
        VALUES ('$nombre','$horaDesde','$horaHasta','$fechaDesde','$fechaHasta',$lun,$mar,$mie,$jue,$vie,$sab,$dom,$fer,$estado)";

        $operacion = DataBase::execute($sqlFranja);

        return $operacion;
    }

    public static function eliminar($idFranja)
    {

        /* $sql = "UPDATE franjas SET estadoFranja=false WHERE idFranja=$idFranja";
        $result = DataBase::execute($sql);
        return $result; */
    }

    public static function modificar($franjaData)
    {

        /* $operacion['status'] = true;
        $operacion['msg'] = '';
        //self::dump_var($franjaData);
        $idFranja = $franjaData['idFranja'];

        $sql = "UPDATE franjas SET ";
        foreach ($franjaData as $i => $v) {
            if (is_string($v) === true) {
                $sql = $sql . "$i='$v', ";
            } else {
                $sql = $sql . "$i=$v, ";
            }
        }
        $sql = substr($sql, 0, -2);
        $sql = $sql . " WHERE idFranja='$idFranja'";

        DataBase::execute($sql);

        echo $sql;

        return $operacion; */
    }

    public static function consultar($campos = null, $filter = null)
    {
        /* $operacion['status'] = true;
        $operacion['msg'] = '';

        $sql = "SELECT ";
        if (!empty($campos)) {
            foreach ($campos as $i => $v) {
                $sql = $sql . "$v, ";
            }
            $sql = substr($sql, 0, -2);
        } else {
            $sql = $sql . "*";
        }
        $sql = $sql . " FROM franjas";
        if (!empty($filter)) {
            $sql = $sql . " WHERE";
            foreach ($filter as $i => $v) {
                if (is_string($v) === true) {
                    $sql = $sql . " $i='$v' AND";
                } else {
                    $sql = $sql . " $i=$v AND";
                }
            }
            $sql = substr($sql, 0, -4);
        } */
        //$franjas = $this->getRecords($sql);

        //return $franjas;
    }

    public static function recuperar($idFranja)
    {

        /* $operacion['status'] = true;
        $operacion['msg'] = '';

        $sql = "UPDATE franjas SET estadoFranja=1 WHERE idFranja='$idFranja'";
        $result = DataBase::execute($sql);
        return $result; */
    }

    public static function checkEstado($idFranja)
    {
        /* $model = new static();
        $sql = "SELECT franjas FROM usuarios WHERE idFranja = '$idFranja'";

        $operacion = DataBase::getRecord($sql);
        foreach ($operacion as $i => $v) {
            $operacion = $v;
        }
        /*si está activo retorna 1, sino 0
        return $operacion; */
    }

    public static function getUltimoID()
    {
        /* $sql = "SELECT MAX(idFranja) as idFranja FROM franjas";

        $operacion = DataBase::getRecord($sql);

        /*si está activo retorna 1, sino 0
        return $operacion->idFranja; */
    }

    public static function consultarFranjas($filtro = null)
    {
        /* $sqlFranjas = 'SELECT idFranja,nombre,provincia,localidad,direccion,telefono,estadoFranja,x(ubicacion) as latitud, y(ubicacion) as longitud FROM franjas NATURAL JOIN geolocalizaciones WHERE ';

        $sqlFranjas = $sqlFranjas . '1=1 ORDER BY estadoFranja DESC, idFranja';

        $franjas = DataBase::getRecords($sqlFranjas);

        return $franjas; */
    }
}