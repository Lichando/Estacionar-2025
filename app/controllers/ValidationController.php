<?php
namespace app\controllers;
use app\models\UserModel;
use \Controller;
use \Response;
use \DataBase;

class ValidationController extends Controller
{
    private static function Validate($campo, $campoNombre, $min, $max)
    {
        $msg = '';
        $error = false;
        $campo2 = '';

        if (!isset($_POST[$campo])) {
            $msg = $campoNombre . ' no existe!';
            $error = true;
        } else {
            $campo2 = trim($_POST[$campo]);
            if (empty($campo2)) {
                $msg = $campoNombre . ' no puede quedar vacio!';
                $error = true;
            }
            if (strlen($campo2) < $min || strlen($campo2) > $max) {
                $msg = ' el campo debe estar entre ' . $min . ' y ' . $max . ' caracteres';
                $error = true;
            }
        }
        $resultado['campo2'] = $campo2;
        $resultado['error'] = $error;
        $resultado['msg'] = $msg;
        return $resultado;
    }
    public function ValName()
    {
        return $this->Validate('FirstName', 'nombre', 3, 60);
    }
    public function ValLastName()
    {
        return $this->Validate('LastName', 'apellido', 3, 60);
    }

    public function ValNickName()
    {
        $resultado = $this->Validate('nickname', 'usuario', 3, 60);
        if ($resultado['error']) {
            return $resultado;
        }
        $dupNick = UserModel::findNickName($resultado['campo2']);
        if ($dupNick['existe']) {
            $resultado['msg'] = $dupNick['msg'];
            $resultado['error'] = true;
        } else {
            $resultado['msg'] = 'usuario disponible';
            $resultado['error'] = false;
        }
        return $resultado;
    }
    public function ValPass()
    {
        return $this->Validate('pass', 'contraseña', 3, 60);
    }
    public function ValRepass()
    {
        return $this->Validate('repass', 'contraseña', 3, 60);
    }
    public function valVerify_code()
    {
        $resultado = $this->Validate('verify_code', 'codigo', 3, 7);
        if ($resultado['error']) {
            return $resultado;
        }
        // if (is_int((int) $resultado['campo2'])) {
        //     $resultado['msg'] = 'numero no valido';
        //     $resultado['error'] = true;
        // }
        if (!ctype_digit($resultado['campo2'])) {
            $resultado['msg'] = 'El código debe contener solo números';
            $resultado['error'] = true;
        }
        return $resultado;
    }
    public function ValMail()
    {
        $resultado = $this->Validate('mail', 'correo', 3, 60);
        if ($resultado['error']) {
            return $resultado;
        }
        if (!filter_var($resultado['campo2'], FILTER_VALIDATE_EMAIL)) {
            $resultado['msg'] = 'formato de correo no valido';
            $resultado['error'] = true;
        } else {         
# Validacion extra
$DominioNoPermitido = ['yopmail.com', 'tempmail.com', 'mailinator.com', 'guerrillamail.com', 'trashmail.com'];
$PartesCorreo = explode('@', $resultado['campo2']);
$dominio = array_pop($PartesCorreo);
if (in_array($dominio, $DominioNoPermitido)) {
    $resultado['msg'] = 'No se acepta ese tipo de dominio';
    $resultado['error'] = true;
} else {
    $resultado['msg'] = 'Correo válido';
    $resultado['error'] = false;
}
        }
        return $resultado;
    }

    public function checkEmail($email, $checkflag = true)
    {
        $dupEmail = UserModel::findEmail($email);
        if ($checkflag) {
            #Validacion para el registro (si esta TRUE)
            if ($dupEmail['existe']) {
                return [
                    'error' => true,
                    'msg' => 'correo ya registrado'
                ];
            }
            return [
                'error' => false,
                'msg' => 'correo disponible'
            ];
        } else {
            # Debe ser valido para el login
            if (!$dupEmail['existe']) {
                return [
                    'error' => true,
                    'msg' => 'correo no registrado'
                ];
            }
            return [
                'error' => false,
                'msg' => 'correo valido'
            ];
        }
    }
    private static function checkvalidate($campo, $campoNombre, $array)
    {
        $msg = '';
        $error = false;
        $campo2 = '';
        if (!isset($_POST[$campo])) {
            $msg = $campoNombre . ' no existe';
            $error = true;
        } else {
            $campo2 = trim($_POST[$campo]);
            $checkvalid = false;
            foreach ($array as $valid) {
                if ($campo2 === $valid) {
                    $checkvalid = true;
                    break;
                }
            }
            if (!$checkvalid) {
                $msg = 'tiene que elegir un ' . $campoNombre;
                $error = true;
            }
        }

        $resultado['msg'] = $msg;
        $resultado['error'] = $error;
        $resultado['campo2'] = $campo2;

        return $resultado;
    }
    public function ValTypeUser()
    {
        $typeArray = array('cochera');
        $userTYPE = $this->checkvalidate('user_type', 'tipo de usuario', $typeArray);
        return $userTYPE;
    }
}