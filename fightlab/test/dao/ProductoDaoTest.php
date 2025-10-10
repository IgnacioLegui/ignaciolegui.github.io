<?php

require_once '../../app/config/AppConfig.php';
require_once '../../app/config/DBConfig.php';
require_once '../../app/vendor/autoload.php';

use app\libs\database\Connection;
use app\core\models\dao\ProductoDao;

try {
    $data = ["id" => 2];
    $dao = new ProductoDao(Connection::get());
    $result = $dao->load($data["id"]);
    print_r($result);

} catch(\PDOException $ex){
    echo "Error database => " . $ex->getMessage();
}
catch(\Exception $ex){
    echo "Error sistema => " . $ex->getMessage();
}
