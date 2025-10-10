<?php

use app\core\models\dto\UsuarioDto;

require_once '../../app/core/models/dto/base/InterfaceDto.php';
require_once '../../app/core/models/dto/UsuarioDto.php';

$peticionCliente = '{
    "id": 20,
    "apellido": "Leguizamon",
    "nombres": "Jose Ignacio",
    "cuenta": "ignaciol",
    "correo": "ignaciol@example.com",
    "perfil": "Operador",
    "fechaAlta": "2024-05-10",
    "clave": "12345678",
    "estado": 1,
    "resetPass": 0
}';

$data = json_decode($peticionCliente, true);

$usuario = new UsuarioDto($data);
print_r($usuario->toArray());
