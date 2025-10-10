<?php

namespace app\core\services;

use app\core\services\base\InterfaceService;
use app\core\models\dao\UsuarioDao;
use app\core\models\dto\base\InterfaceDto;
use app\core\models\dto\UsuarioDto;
use app\libs\database\Connection;

final class UsuarioService implements InterfaceService {

    public function load(int $id): InterfaceDto{
        $dao = new UsuarioDao(Connection::get());
        return new UsuarioDto($dao->load($id));
    }

    public function save(InterfaceDto $dto): void{
        $usuarioDto = $dto instanceof UsuarioDto ? $dto : new UsuarioDto($dto->toArray());
        if($usuarioDto->getClave() == ""){
            throw new \Exception("<p>La <strong>clave</strong> del usuario es obligatoria.</p>");
        }

        $this->validate($usuarioDto);
        if($usuarioDto->getPerfil() == ""){
            throw new \Exception("<p>El <strong>perfil</strong> del usuario es obligatorio.</p>");
        }
        
        $this->validate($usuarioDto);
         $hashedClave = password_hash($usuarioDto->getClave(), PASSWORD_DEFAULT);
        $usuarioDto->setClave($hashedClave);
        $data = $usuarioDto->toArray();
        unset($data["id"]);
        $dao = new UsuarioDao(Connection::get());
        $dao->save($data);
    }

    public function update(InterfaceDto $dto): void{
        $usuarioDto = $dto instanceof UsuarioDto ? $dto : new UsuarioDto($dto->toArray());
        $this->validate($usuarioDto);
        $data = $usuarioDto->toArray();
        $dao = new UsuarioDao(Connection::get());
        $dao->update($data);
    }

    public function delete(InterfaceDto $dto): void {
        $dao = new UsuarioDao(Connection::get());
        $usuarioDto = $dto instanceof UsuarioDto ? $dto : new UsuarioDto($dto->toArray());
        $dao->delete($usuarioDto->getId());
    }


   private function validate(UsuarioDto $dto): void{
        if($dto->getNombres() == ""){
            throw new \Exception("<p>El <strong>nombre</strong> del usuario es obligatorio.</p>");
        }
    }

    
    public function list(array $filters): array {
    $dao = new UsuarioDao(Connection::get());
    return $dao->list($filters);
}
}
