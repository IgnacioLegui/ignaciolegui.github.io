<?php

require_once '../../app/config/AppConfig.php';
require_once '../../app/config/DBConfig.php';
require_once '../../app/vendor/autoload.php';

use app\core\models\dto\UsuarioDto;
use app\core\services\UsuarioService;

try {
    $data = [
        "id" => 0,
        "apellido" => "Leguizamon",
        "nombres" => "Ignacio",
        "cuenta" => "ignaciol",
        "correo" => "ignacio@example.com",
        "perfil" => "Operador",
        "fechaAlta" => date("Y-m-d"),
        "clave" => password_hash("12345678", PASSWORD_DEFAULT),
        "estado" => 1,
        "resetPass" => 0
    ];

    $dto = new UsuarioDto($data);
    $service = new UsuarioService();
    $service->save($dto);

    echo "<p>Usuario agregado correctamente desde UsuarioService.</p>";

} catch (\PDOException $ex) {
    echo "Error database => " . $ex->getMessage();
} catch (\Exception $ex) {
    echo "Error sistema => " . $ex->getMessage();
}
