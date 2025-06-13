<?php
namespace app\controllers;
use app\models\UserModel;
use \Controller;
use \Response;
use \DataBase;

class PrivacyController extends Controller
{

    public function actionPolicies()
    {
        $head = SiteController::head();
        Response::render($this->viewDir(__NAMESPACE__), 'privacycenter', [
            "head" => $head,
            "title" => $this->title . "| Centro de privacidad",
        ]);
    }
}