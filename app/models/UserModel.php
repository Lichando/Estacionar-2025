<?php
namespace app\models;
use \DataBase;
use \Model;

class UserModel extends Model
{
	protected $table = "usuarios";
	protected $primaryKey = "id";
	protected $secundaryKey = "email";
	public $email;

	public static function findEmail($email){
		$model = new static();
		$sql = "SELECT * from ".$model->table." where ".$model->secundaryKey." = :email";
		$params = ["email" => $email];
		$result = DataBase::query($sql, $params);

		if ($result) {
			foreach ($result as $key => $value) {
				$model->$key = $value;
			}
		}else{
			$model = false;
		}
		return $result[0];
	}

	public static function changePassword($newPass, $token){
		$model = new static();
		$sql[] = "UPDATE usuarios SET password = '$newPass' WHERE token = '$token'";
		
		try {
				$resultado = DataBase::transaction($sql);
				$result['state'] = $resultado['state']; //restulado puede ser TRUE si esta todo bien o FALSE
				$result['notification'] = $resultado['notification'];
		} catch (Exception $e) {
			 // echo 'Error en Archivo: ',  $e->getMessage(), "\n"; DESCOMENTAR PARA VER ERRORES
			  	$result['notification'] = $e->getMessage();
			 	$result['state']  = false;
		}

		return $result;
	}
}
