<?php

namespace app\core\services;

use app\core\services\base\InterfaceService;
use app\core\models\dao\ProductoDao;
use app\core\models\dto\base\InterfaceDto;
use app\core\models\dto\ProductoDto;
use app\libs\database\Connection;

final class ProductoService implements InterfaceService {

    public function load(int $id): InterfaceDto {
        $dao = new ProductoDao(Connection::get());
        return new ProductoDto($dao->load($id));
    }

   public function save(InterfaceDto $dto): void {
    $productoDto = $dto instanceof ProductoDto ? $dto : new ProductoDto($dto->toArray());
    $this->validate($productoDto);

    $data = $productoDto->toArray();

    
    if (isset($data["categoriaId"])) {
        $data["categoria"] = $data["categoriaId"];
        //unset($data["categoriaId"]);
    }

    unset($data["id"]);

    $dao = new ProductoDao(Connection::get());
    $dao->save($data);
}

    public function update(InterfaceDto $dto): void {
        $productoDto = $dto instanceof ProductoDto ? $dto : new ProductoDto($dto->toArray());
        $this->validate($dto);
        $data = $dto->toArray();
        $dao = new ProductoDao(Connection::get());
        $dao->update($data);
    }

    public function delete(InterfaceDto $dto): void {
        $dao = new ProductoDao(Connection::get());
        $productoDto = $dto instanceof ProductoDto ? $dto : new ProductoDto($dto->toArray());
        $dao->delete($productoDto->getId());
    }

    private function validate(ProductoDto $dto): void {
        if ($dto->getNombre() === "") {
            throw new \Exception("<p>El <strong>nombre</strong> del producto es obligatorio.</p>");
        }
    }

     public function list(array $filters): array {
        $dao = new ProductoDao(Connection::get());
        $result = $dao->list($filters);
        $productos = [];
        foreach ($result as $data) {
            $productos[] = new ProductoDto($data);
        }
        return $productos;
    }
}

