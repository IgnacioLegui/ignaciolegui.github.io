<?php

require_once '../../app/core/models/dto/base/InterfaceDto.php';
require_once '../../app/core/models/dto/ProductoDto.php';

use app\core\models\dto\ProductoDto;


$peticionCliente = '{"id": 12, "nombre": "Guantes Everlast", "codigo": 123,"descripcion": "Guantes de boxeo marca everlast",
 "categoriarId": 5 , "precio": 10000.00, "stock": 5 }';

$data = json_decode($peticionCliente, true);

$producto = new ProductoDto($data);
print_r($producto->toArray());

