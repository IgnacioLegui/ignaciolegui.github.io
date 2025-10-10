<?php

require_once '../../app/config/AppConfig.php';
require_once '../../app/config/DBConfig.php';
require_once '../../app/vendor/autoload.php';


use app\core\models\dto\ProductoDto;
use app\core\services\ProductoService;

try{
   $data = [
        "id" => 4,
        "nombre" => "Tobilleras",
        "codigo" => 456,
        "descripcion" => "Tobilleras ortopedicas",
        "precio" => 12000.00,
        "stock" => 15,
        "categoriaId" => 3
    ];
    $dto = new ProductoDto($data);
    $service = new ProductoService();
    $service->save($dto);
    echo "<p>Se agregó un nuevo producto al sistema.</p>";
}
catch(\PDOException $ex){
    echo "Error database => " . $ex->getMessage();
}
catch(\Exception $ex){
    echo "Error sistema => " . $ex->getMessage();
}