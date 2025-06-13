<?php
namespace app\controllers;
use \Controller;
use \Response;
use \DataBase;

class HomeController extends Controller
{

	// Constructor
	public function __construct()
	{

	}

	public function actionIndex($var = null)
	{
		$head = SiteController::head();
		Response::render($this->viewDir(__NAMESPACE__), "welcome", [
			"title" => $this->title . " | estacionamiento al instante!",
			"head" => $head
		]);
	}

	public function actionInicio()
	{
		$head = SiteController::head();
		$path = static::path();

		$locations = [
			[
				"lat" => -32.958529,
				"lon" => -60.677592,
				"price" => 2000,
				"address" => "calle falsa, 123",
				"description" => "cochera amplia",
				"otherDetails" => "https://media.istockphoto.com/id/178594527/es/foto/limpieza-el-garaje.jpg?s=612x612&w=0&k=20&c=Bxwzpj1OyETXMsBV_XgbFip1y0YidK__vL1392M7gDE="
			],
			[
				"lat" => -32.958727,
				"lon" => -60.676680,
				"price" => 3500,
				"address" => "calle falsa, 123",
				"description" => "cochera amplia",
				"otherDetails" => "https://media.istockphoto.com/id/178594527/es/foto/limpieza-el-garaje.jpg?s=612x612&w=0&k=20&c=Bxwzpj1OyETXMsBV_XgbFip1y0YidK__vL1392M7gDE="
			],
			[
				"lat" => -32.957647,
				"lon" => -60.675975,
				"price" => 5000,
				"address" => "calle falsa, 123",
				"description" => "cochera amplia",
				"otherDetails" => "https://media.istockphoto.com/id/178594527/es/foto/limpieza-el-garaje.jpg?s=612x612&w=0&k=20&c=Bxwzpj1OyETXMsBV_XgbFip1y0YidK__vL1392M7gDE="
			],
			[
				"lat" => -32.942810,
				"lon" => -60.641554,
				"price" => 9800,
				"address" => "corrientes, san lorenzo",
				"description" => "cocheras",
				"otherDetails" => "https://www.shutterstock.com/image-illustration/3d-rendering-home-garage-wood-600nw-2148150265.jpg"
			],
		];


		Response::render($this->viewDir(__NAMESPACE__), "inicio", [
			"title" => $this->title . ' | inicio',
			"head" => $head,
			"locations" => json_encode($locations), //convertimos en json
		]);
	}

	public function action404()
	{
		$head = SiteController::head();
		Response::render($this->viewDir(__NAMESPACE__), "404", [
			"title" => $this->title . ' | 404 :(',
			"head" => $head,
		]);
	}

}