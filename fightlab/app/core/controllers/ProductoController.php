<?php

namespace app\core\controllers;

use app\core\controllers\base\BaseController;
use app\core\controllers\base\InterfaceController;
use app\core\services\ProductoService;
use app\core\models\dto\ProductoDto;
use app\libs\http\Request;
use app\libs\http\Response;

final class ProductoController extends BaseController implements InterfaceController {


    public function index(Request $req, Response $res): void {
        array_push($this->scripts, "apps/js/item/index.js");
        $this->setCurrentView($req); 
        require_once APP_FILE_TEMPLATE;
    }

    public function load(Request $request, Response $response): void {
        $service = new ProductoService();
        $dto = $service->load((int)$request->getId());
        $response->setResult($dto->toArray());
        $response->send();
    }

    public function save(Request $request, Response $response): void {
        $dto = new ProductoDto($request->getDataFromInput());
        $service = new ProductoService();
        if ($dto->getId()) {
            $service->update($dto);
            $response->setMessage("<p>Se actualizó el producto correctamente.</p>");
        } else {
            $service->save($dto);
            $response->setMessage("<p>Se agregó un nuevo producto al sistema.</p>");
        }
        $response->send();
    }

    public function create(Request $req, Response $res): void {
        array_push($this->scripts, "apps/js/item/create.js");
        $this->setCurrentView($req);
        require_once APP_FILE_TEMPLATE;
    }

    public function edit(Request $req, Response $res): void {
        array_push($this->scripts, "apps/js/item/edit.js");
        $this->setCurrentView($req);
        require_once APP_FILE_TEMPLATE;
    }

    public function delete(Request $request, Response $response): void {
    $service = new ProductoService();
        $dto = $service->load($request->getId());
        $service->delete($dto);
        $response->setMessage("Se eliminó un producto del sistema");
        $response->send();
}


   public function list(Request $request, Response $response): void {
        $service = new ProductoService();
        $filters = $request->getDataFromInput();
        if ($filters === null) {
            $filters = [];
        }
        $dtos = $service->list($filters);
        $result = [];
        foreach ($dtos as $dto) {
            if (method_exists($dto, 'toArray')) {
                $result[] = $dto->toArray();
            } else {
                $result[] = (array)$dto;
            }
        }
        $response->setResult($result);
        $response->send();
}

    public function update(Request $request, Response $response): void {
        $dto = new ProductoDto($request->getDataFromInput());
        $service = new ProductoService();
        $service->update($dto);
        $response->setMessage("<p>Se actualizó un producto del sistema.</p>");
        $response->send();
    }
}
