<?php
require_once "../../app/config/DBConfig.php";
require_once "../../app/libs/database/Connection.php";
require_once '../../app/core/models/dto/base/InterfaceDto.php';
require_once '../../app/core/models/dto/CategoriaDto.php';

use app\libs\database\Connection;
use app\core\models\dto\CategoriaDto;

try {
    $conn = Connection::get();
    
    $id = 3;
    $sql = "SELECT id, nombre FROM categorias WHERE id = " . $id;
    $stmt = $conn->query($sql);

    $data = $stmt->fetch(\PDO::FETCH_ASSOC);
    if ($data !== false) {
        $dto = new CategoriaDto($data);
        print_r($dto->toArray());
    } else {
        echo "No se encontraron datos para el ID especificado.";
    }
} catch (\PDOException $ex) {
    echo "Error database => " . $ex->getMessage();
}
