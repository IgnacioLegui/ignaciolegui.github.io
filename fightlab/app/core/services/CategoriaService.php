<?php

namespace app\core\services;

use app\core\models\dao\CategoriaDao;
use app\core\models\dto\base\InterfaceDto;
use app\core\models\dto\CategoriaDto;
use app\core\services\base\InterfaceService;
use app\libs\database\Connection;

final class CategoriaService implements InterfaceService{
    
    public function load(int $id): InterfaceDto{
        $dao = new CategoriaDao(Connection::get());
        return new CategoriaDto($dao->load($id));
    }

    public function save(InterfaceDto $dto): void{
        $this->validate($dto);
        $data = $dto->toArray();
        //unset($data["id"]);
        $dao = new CategoriaDao(Connection::get());
        $dao->save($data);
    }

    public function update(InterfaceDto $dto): void {
        $categoriaDto = $dto instanceof CategoriaDto ? $dto : new CategoriaDto($dto->toArray());
        $this->validate($dto);
        $data = $dto->toArray();
        $dao = new CategoriaDao(Connection::get());
        $dao->update($data);
    }


    public function delete(InterfaceDto $dto): void {
        $dao = new CategoriaDao(Connection::get());
        $categoriaDto = $dto instanceof CategoriaDto ? $dto : new CategoriaDto($dto->toArray());
        $dao->delete($categoriaDto->getId());
    }


    public function list(array $filters): array {
        $dao = new CategoriaDao(Connection::get());
        $result = $dao->list($filters);
        $categorias = [];
        foreach ($result as $data) {
            $categorias[] = new CategoriaDTO($data);
        }
        return $categorias;
}



    private function validate(CategoriaDto $dto): void{
        if($dto->getNombre() == ""){
            throw new \Exception("<p>El <strong>nombre</strong> de la categoría es obligatorio.</p>");
        }
    }

}