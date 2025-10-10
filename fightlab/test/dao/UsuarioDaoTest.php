<?php

require_once '../../app/config/AppConfig.php';
require_once '../../app/config/DBConfig.php';
require_once '../../app/vendor/autoload.php';

use app\libs\database\Connection;
use app\core\models\dao\UsuarioDao;

try {
     $data = ["id" => 1];
    $dao = new UsuarioDao(Connection::get());
    $result = $dao->load($data["id"]);
    print_r($result);

} catch (\PDOException $ex) {
    echo "Error DB: " . $ex->getMessage();
} catch (\Exception $ex) {
    echo "Error sistema: " . $ex->getMessage();
}
