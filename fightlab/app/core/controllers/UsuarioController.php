<?php

namespace app\core\controllers;

use app\core\controllers\base\BaseController;
use app\core\controllers\base\InterfaceController;
use app\core\services\UsuarioService;
use app\core\models\dto\UsuarioDto;
use app\libs\http\Request;
use app\libs\http\Response;

final class UsuarioController extends BaseController implements InterfaceController {

    private function denyIfOperador(): void {
        if (isset($_SESSION["perfil"]) && $_SESSION["perfil"] === "Operador") {
            header("Location: " . APP_URL . "home/index");
            exit;
        }
    }


    public function index(Request $req, Response $res): void {
           $this->denyIfOperador();
         array_push($this->scripts, "apps/js/user/index.js");
        $this->setCurrentView($req);
        require_once APP_FILE_TEMPLATE;
    }

    public function load(Request $request, Response $response): void{
           $this->denyIfOperador();
        $service = new UsuarioService();
        $dto = $service->load((int)$request->getId());
        $response->setResult($dto->toArray());
        $response->send();
    }

    public function save(Request $request, Response $response): void{
           $this->denyIfOperador();
        $dto = new UsuarioDto($request->getDataFromInput());
        $service = new UsuarioService();
        if ($dto->getId()) {
            $service->update($dto);
            $response->setMessage("<p>Se actualizó el usuario correctamente.</p>");
        } else {
            $service->save($dto);
            $response->setMessage("<p>Se agregó un nuevo usuario al sistema.</p>");
        }
        
        $response->send();
    }

    public function create(Request $req, Response $res): void {
           $this->denyIfOperador();
        array_push($this->scripts, "apps/js/user/create.js");
        $this->setCurrentView($req);
        require_once APP_FILE_TEMPLATE;
     }

    public function edit(Request $req, Response $res): void {
           $this->denyIfOperador();
        array_push($this->scripts, "apps/js/user/edit.js");
        $this->setCurrentView($req);
        require_once APP_FILE_TEMPLATE;
    }

    public function delete(Request $request, Response $response): void {
           $this->denyIfOperador();
        $service = new UsuarioService();
        $dto = $service->load($request->getId());
        $service->delete($dto);
        $response->setMessage("<p>Se eliminó el usuario del sistema.</p>");
        $response->send();
}

    public function list(Request $request, Response $response): void {
           $this->denyIfOperador();
        $service = new UsuarioService();
        $filters = $request->getDataFromInput();
        if ($filters === null) {
            $filters = [];
        }
        $dtos = $service->list($filters);
        $result = [];
        foreach ($dtos as $dto) {
    if (is_object($dto) && method_exists($dto, 'toArray')) {
        $result[] = $dto->toArray();
    } else {
        $result[] = $dto;
    }
        }
        $response->setResult($result);
        $response->send();
    }

    public function update(Request $request, Response $response): void{
           $this->denyIfOperador();
        $dto = new UsuarioDto($request->getDataFromInput());
        $service = new UsuarioService();
        $service->update($dto);
        $response->setMessage("<p>Se actualizó el usuario del sistema.</p>");
        $response->send();
    }
    public function profile(Request $req, Response $res): void {
           $this->denyIfOperador();
    array_push($this->scripts, "apps/js/user/profile.js");
    $this->setCurrentView($req);
    require_once APP_FILE_TEMPLATE;
}
/*
 public function profileData(Request $req, Response $res): void {
    $usuarioDao = new UsuarioDao(Connection::get());
    $usuario = $usuarioDao->findById($_SESSION["usuarioId"] ?? 0);

    if (!$usuario) {
        $res->setMessage("No autorizado");
    } else {
        unset($usuario["clave"]); // nunca devuelvas la clave
        $res->setResult($usuario);
    }

    $res->send();
}
*/

}
