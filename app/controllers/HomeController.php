<?php 
namespace app\controllers;
use \Controller;
use \Response;
use \DataBase;

class HomeController extends Controller
{

    // Constructor
    public function __construct(){

    }

	public function actionIndex($var = null){
		Echo 'hola desde index de home';
	}

	public function actionInicio(){
		$head = SiteController::head();
		$path = static::path();
		Response::render($this->viewDir(__NAMESPACE__),"inicio", [
																"title" => 'Inicio MVC',
																 "head" => $head,
																]);
	}

	public function action404(){
		$head = SiteController::head();
		Response::render($this->viewDir(__NAMESPACE__),"404", [
																"title" => $this->title.' 404',
																"head" => $head,
															   ]);
	}

	private function actionHola(){
		echo 'hola';
	}
}