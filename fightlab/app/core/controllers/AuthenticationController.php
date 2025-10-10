<?php

namespace app\core\controllers;

use app\core\controllers\base\BaseController;
use app\core\controllers\base\InterfaceController;
use app\core\models\dto\LoginDto;
use app\core\services\AuthenticationService;
use app\libs\http\Request;
use app\libs\http\Response;

final class AuthenticationController extends BaseController{

    public function index(Request $request, Response $response): void{
        array_push($this->scripts, "app/js/{$request->getController()}/{$request->getAction()}.js");
        $this->setCurrentView($request);
        require_once APP_FILE_LOGIN;
    }


public function login(Request $request, Response $response): void {
    $dto = new \app\core\models\dto\LoginDto($request->getDataFromInput());
    $service = new \app\core\services\AuthenticationService();

    try {
        $service->login($dto);
        header("Location: " . APP_URL . "home/index");
        exit;
    } catch (\Exception $e) {
        $error = $e->getMessage();  
        $this->setCurrentView($request);
        require_once APP_FILE_LOGIN;
    }
}


    public function logout(Request $request, Response $response){
        $service = new AuthenticationService();
        $service->logout();
        $this->setCurrentView($request);
        header("refresh:5;url=" . APP_URL . "authentication/index");
        require_once APP_FILE_LOGOUT;
    }




}