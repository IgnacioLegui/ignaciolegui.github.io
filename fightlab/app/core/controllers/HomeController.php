<?php

namespace app\core\controllers;

use app\core\controllers\base\BaseController;
use app\core\controllers\base\InterfaceController;
use app\libs\http\Request;
use app\libs\http\Response;
use app\libs\database\Connection;

final class HomeController extends BaseController{

    public function index(Request $request, Response $response): void{
        // --- Datos para el dashboard ---
        $pdo = Connection::get();

        // Total de productos
        $stmt = $pdo->query("SELECT COUNT(*) AS total FROM productos");
        $totalProductos = (int) $stmt->fetch(\PDO::FETCH_OBJ)->total;

        // Total de usuarios
        $stmt = $pdo->query("SELECT COUNT(*) AS total FROM usuarios");
        $totalUsuarios = (int) $stmt->fetch(\PDO::FETCH_OBJ)->total;

        // --- Script y vista ---
        array_push($this->scripts, "app/js/{$request->getController()}/{$request->getAction()}.js");
        $this->setCurrentView($request);
        require_once APP_FILE_TEMPLATE;
    }
}