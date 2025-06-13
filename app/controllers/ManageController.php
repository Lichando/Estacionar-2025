<?php

namespace app\controllers;

use \Controller;
use \Response;
use \DataBase;
use app\models\FranjaModel;

class ManageController extends Controller
{
    public $idFranja;
    public $nombre;
    public $provincia;
    public $localidad;
    public $direccion;
    public $telefono;


    public function actionAgregar()
    {
        $operacion['status'] = true;
        $operacion['msg'] = array();

        if (isset($_POST) && !empty($_POST)) {
            isset($_POST['nombre']) ? $franjaData['nombre'] = trim($_POST['nombre']) : $franjaData['nombre'] = "";
            isset($_POST['horaDesde']) ? $franjaData['horaDesde'] = $_POST['horaDesde'] : $franjaData['horaDesde'] = "";
            isset($_POST['horaHasta']) ? $franjaData['horaHasta'] = $_POST['horaHasta'] : $franjaData['horaHasta'] = "";
            isset($_POST['fechaDesde']) ? $franjaData['fechaDesde'] = $_POST['fechaDesde'] : $franjaData['fechaDesde'] = "";
            isset($_POST['fechaHasta']) ? $franjaData['fechaHasta'] = $_POST['fechaHasta'] : $franjaData['fechaHasta'] = "";
            isset($_POST['estado']) ? $franjaData['estado'] = 1 : $franjaData['estado'] = 0;
            isset($_POST['lun']) ? $franjaData['lun'] = 1 : $franjaData['lun'] = 0;
            isset($_POST['mar']) ? $franjaData['mar'] = 1 : $franjaData['mar'] = 0;
            isset($_POST['mie']) ? $franjaData['mie'] = 1 : $franjaData['mie'] = 0;
            isset($_POST['jue']) ? $franjaData['jue'] = 1 : $franjaData['jue'] = 0;
            isset($_POST['vie']) ? $franjaData['vie'] = 1 : $franjaData['vie'] = 0;
            isset($_POST['sab']) ? $franjaData['sab'] = 1 : $franjaData['sab'] = 0;
            isset($_POST['dom']) ? $franjaData['dom'] = 1 : $franjaData['dom'] = 0;
            isset($_POST['fer']) ? $franjaData['fer'] = 1 : $franjaData['fer'] = 0;

            foreach ($franjaData as $i => $v) {
                if (empty($v) && $v !== 0) {
                    $operacion['msg'][$i] = "Completar";
                    $operacion['status'] = false;
                }
            }

            if ($operacion['status']) {
                $operacion = self::agregar($franjaData);
            }
        }

        $head = SiteController::head();
        $header = SiteController::header();
        $path = static::path();
        Response::render($this->viewDir(__NAMESPACE__), 'agregar', [
            "head" => $head,
            "header" => $header,
            "title" => $this->title . "Agregar franja",
            "mensaje" => $operacion['msg']
        ]);
    }

    public function agregar($franjaData)
    {

        /*Validaciones*/
        $operacion['status'] = true;
        $operacion['msg'] = array();

        if (strlen($franjaData['nombre']) > 40) {
            $operacion['status'] = false;
            $operacion['msg']['nombre'] = "Máximo 40 caracteres";
        }

        if ($operacion['status'] === true) {
            // $USER_MODEL = new FranjaModel();
            FranjaModel::agregar($franjaData);

            $operacion['msg'] = 'Se agregó con éxito';
        }

        return $operacion;
    }

    public function actionListar()
    {

        $sqlFranjas = "SELECT * FROM franjas_horarias";

        $franjas = DataBase::query($sqlFranjas);

        $head = SiteController::head();
        $header = SiteController::header();
        $path = static::path();
        Response::render($this->viewDir(__NAMESPACE__), 'listar', [
            "head" => $head,
            "header" => $header,
            "title" => $this->title . "Listado de franjas",
            //"patch" => self::$patch,
            //"footer" =>  SiteController::footer(),
            "franjas" => $franjas
        ]);
    }
    public function actionPromos()
    {

        $sqlPromos = "SELECT * FROM promociones";

        $promos = DataBase::query($sqlPromos);

        $head = SiteController::head();
        $header = SiteController::header();
        $path = static::path();
        Response::render($this->viewDir(__NAMESPACE__), 'promos', [
            "head" => $head,
            "header" => $header,
            "title" => $this->title . "Promociones",
            "promos"=>$promos,
            //"patch" => self::$patch,
            //"footer" =>  SiteController::footer(),
            
        ]);
    }
}