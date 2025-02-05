<?php
namespace app\controllers;
use \Controller;
use app\models\CategoriaModel;

class SiteController extends Controller
{
	// Constructor
	public function __construct()
	{
		// self::$sessionStatus = SessionController::sessionVerificacion();
	}

	public static function head()
	{
		// static::path();
		// $head = file_get_contents(APP_PATH.'/views/inc/head.php');
		// $head = str_replace('#PATH#', self::$ruta, $head);
		// return $head;
		$head = file_get_contents(APP_PATH . '/views/inc/head.php');

		// Reemplazar #PATH# por la ruta base calculada
		$head = str_replace('#PATH#', self::path(), $head);

		return $head;
	}

	public static function header()
	{
		$header = file_get_contents(APP_PATH . '/views/inc/header.php');

		// Reemplazar #PATH# por la ruta base calculada
		$header = str_replace('#PATH#', self::path(), $header);

		return $header;
	}
}
