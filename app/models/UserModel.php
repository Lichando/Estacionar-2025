<?php
namespace app\models;
use \DataBase;
use \Model;
use PDOException;

class UserModel extends Model
{
	protected $table = "usuarios";
	protected $primaryKey = "IdUsuario";
	protected $secundaryKey = "email";
	protected $tertiaryKey = "nickname";
	public $email;

	public static function findEmail($email)
	{
		$model = new static();
		$sql = "SELECT * FROM " . $model->table . " WHERE " . $model->secundaryKey . " = :email";
		$params = [":email" => $email];
		$result = DataBase::query($sql, $params);
		if ($result) {
			return [
				'existe' => true,
				'msg' => 'el email ya esta registrado'
			];
		} else {
			return [
				'existe' => false,
				'msg' => 'el email es valido'
			];
		}
	}

	public static function FindUser($email)
	{
		$model = new static();
		$sql = "SELECT IdUsuario,nickname,email, contrasena FROM " . $model->table . " WHERE " . $model->secundaryKey . " = ?";
		$params = [$email];
		$result = DataBase::query($sql, $params);
		if ($result) {
			return [
				'existe' => true,
				'usuario' => $result[0],
				'msg' => 'usuario encontrado'
			];
		}
		return [
			'existe' => false,
			'msg' => 'usuario y/o contraseña incorrectos'
		];
	}

	public static function findNickName($nickname)
	{
		$model = new static();
		$sql = "SELECT nickname FROM " . $model->table . " WHERE " . $model->tertiaryKey . " = :nickname";
		$params = [":nickname" => $nickname];
		$result = DataBase::query($sql, $params);
		if ($result) {
			return [
				'existe' => true,
				'msg' => 'usuario no disponible'
			];
		} else {
			return [
				'existe' => false,
				'msg' => 'usuario disponible'
			];
		}
	}

	public static function InsertUser($data)
	{
		$model = new static();
		$sql = "INSERT INTO " . $model->table . " (firstname, lastname, nickname, email, contrasena, tipo_usuario, verificado, code_verify, FechaAlta, estado)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$params = [
			$data['firstname'] ?? '',
			$data['lastname'] ?? '',
			$data['nickname'] ?? '',
			$data['email'] ?? '',
			$data['contrasena'] ?? '',
			$data['tipo_usuario'] ?? null,
			0, //email verificado
			$data['code_verify'] ?? '',
			$data['FechaAlta'] ?? '',
			1 //estado
		];
		$resultado = DataBase::query($sql, $params);
		return $resultado;
	}
	public static function verifyCode($email, $code)
	{
		$model = new static();
		$sql = "SELECT email, code_verify FROM " . $model->table . " WHERE " . $model->secundaryKey . " = ? AND code_verify = ?";
		$params = [$email, $code];
		$resultado = DataBase::query($sql, $params);
		if ($resultado) {
			return true;
		} else {
			return false;
		}
	}
	public static function Verify($email)
	{
		$model = new static();
		$sql = "UPDATE " . $model->table . " SET verificado = 1 WHERE " . $model->secundaryKey . " = ?";
		$params = [$email];
		$resultado = DataBase::query($sql, $params);
		if ($resultado) {	
			return true;
		} else {
			return false;
		}
	}


	#Modelo para roles
	// private function GetPermissionByUser($userId)
    // {
    //     $sql = "SELECT p.PermissionName FROM permisos AS p JOIN permisos_roles AS rp ON p.PermissionId = rp.PermisosId 
	// 	JOIN roles AS r ON rp.RolesId = r.RolId JOIN usuarios_roles AS ur ON r.RolId = ur.RolesId WHERE ur.UsersId. = :UsersId";
    //     $params = [':UsersId', $userId];
    //     $result = DataBase::query($sql, $params);

    //     $permisos = [];
    //     foreach ($result as $fila) {
    //         $permisos[] = $fila->PermissionName;
    //     }
    //     return $permisos;
    // }



	// public static function changePassword($newPass, $token)
	// {
	// 	$model = new static();
	// 	$sql[] = "UPDATE usuarios SET password = '$newPass' WHERE token = '$token'";

	// 	try {
	// 		$resultado = DataBase::transaction($sql);
	// 		$result['state'] = $resultado['state']; //restulado puede ser TRUE si esta todo bien o FALSE
	// 		$result['notification'] = $resultado['notification'];
	// 	} catch (PDOException $e) {
	// 		// echo 'Error en Archivo: ',  $e->getMessage(), "\n"; DESCOMENTAR PARA VER ERRORES
	// 		$result['notification'] = $e->getMessage();
	// 		$result['state'] = false;
	// 	}

	// 	return $result;
}
