<?php 
namespace app\controllers;
use \Controller;
use app\models\UserModel;

class UserController extends Controller
{
    // Constructor
    public function __construct(){

    }
    
	public function actionIndex($var = null){
		self::action404();
	}

	/*obtiene todos los datos de un usuarios por id o por email según dato ingresado*/
	public static function GetUser($emailOrId){
		if (filter_var($emailOrId, FILTER_VALIDATE_EMAIL)) {
			# obtener datos de usuario por Email
			$userData = UserModel::findEmail($emailOrId);
			// var_dump($userData);
		}else{
			# obtener datos de usuario por Id
			$userData = UserModel::findId($emailOrId);
			// var_dump($userData);
		}
		return $userData;
	}

	/*obtiene todos los datos de un usuarios token*/
	public static function GetUserbytoken($token){

		# obtener datos de usuario por token
		$userData = UserModel::GetUserbytoken($token);

		return $userData;
	}

	/*Validad si el e-mail asociado a un Usuario se encuentra en estado Activo*/
	public static function checkActivo($userEmail){
		$datosUsuario = UserModel::findEmail($userEmail);
		// var_dump($datosUsuario);
		if ($datosUsuario) {
			if ($datosUsuario->activo == 'si') {
				$result =  true;
			}else{
				// $result = 'El Usuario no se encuentra activo!';
				$result = 'Problemas al acceder a la cuenta! <br>(UC-#42)';
			}
		}else{
			$result = false;
		}
		return $result;
	}


}