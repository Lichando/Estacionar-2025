<?php
namespace app\controllers;
date_default_timezone_set('America/Argentina/Buenos_Aires');
use app\models\UserModel;
use \Controller;
use \Response;
use \DataBase;

class AuthController extends Controller
{
    public function __construct()
    {
    }
    public function actionLogin()
    {
        $head = SiteController::head();
        $correo = '';
        $contrasena = '';
        $error = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['send'])) {
            $flag = false;
            $val = new ValidationController();
            $valEmail = $val->ValMail();
            if ($valEmail['error']) {
                $flag = true;
                if (!in_array($valEmail['msg'], $error)) {
                    $error[] = $valEmail['msg'];
                }
            } else {
                $correo = $valEmail['campo2'];  #guardar corro sanitizado
                #verificamos que exista en la DB
                $CheckEmailDB = $val->checkEmail($correo, false);
                if ($CheckEmailDB['error']) {
                    $flag = true;
                    if (!in_array($CheckEmailDB['msg'], $error)) {
                        $error[] = $CheckEmailDB['msg'];
                    }
                }
            }
            $valPass = $val->ValPass();
            if ($valPass['error']) {
                $flag = true;
                if (!in_array($valPass['msg'], $error)) {
                    $error[] = $valPass['msg'];
                }
            } else {
                $contrasena = $valPass['campo2'];
            }
            if ($flag === false) {
                $user = UserModel::FindUser($correo);
                if ($user['existe']) {
                    $verify = password_verify($contrasena, $user['usuario']->contrasena);
                    if ($verify) {
                        header("Location: ../home/inicio");
                        exit;
                    } else {
                        $error[] = 'credenciales incorrectas';
                    }
                } else {
                    $error[] = 'correo no registrado';
                }
            }
        }
        Response::render($this->viewDir(__NAMESPACE__), "login", [
            "title" => $this->title . "| acceder",
            "head" => $head,
            "error" => $error,
            "correo" => $correo,
            "contrasena" => $contrasena
        ]);
    }
    public function actionSignUp()
    {
        echo "En proceso...";
    }

}