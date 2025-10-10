<?php

namespace app\core\models\dao;

use app\core\models\dao\base\BaseDao;
use app\core\models\dao\base\InterfaceDao;

final class UsuarioDao extends BaseDao implements InterfaceDao {

    public function __construct(\PDO $connection) {
        parent::__construct($connection, "usuarios");
    }

    public function login($cuenta): array{
        $sql = "SELECT id, apellido, nombres, cuenta, clave, perfil, estado, resetPass";
        $sql .= " FROM usuarios";
        $sql .= " WHERE (cuenta = :cuenta OR correo = :cuenta)";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute(["cuenta" => $cuenta]);
        if($stmt->rowCount() != 1){
            throw new \Exception("El nombre de usuario o la contraseña no coinciden");
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function load(int $id): array {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(["id" => $id]);
        if ($stmt->rowCount() == 0) {
            throw new \Exception("No se encontró el usuario con id {$id}");
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function save(array $data): void {
         $sql = "INSERT INTO {$this->table} 
            (apellido, nombres, cuenta, perfil, clave, correo, estado, fechaAlta, resetPass) 
            VALUES (:apellido, :nombres, :cuenta, :perfil, :clave, :correo, :estado, :fechaAlta, :resetPass)";
        $params = [
            'apellido'   => $data['apellido'],
            'nombres'    => $data['nombres'],
            'cuenta'     => $data['cuenta'],
            'perfil'     => $data['perfil'],
            'clave'      => $data['clave'],
            'correo'     => $data['correo'],
            'estado'     => $data['estado'],
            'fechaAlta'  => $data['fechaAlta'],
            'resetPass'  => $data['resetPass']
        ];
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        if ($stmt->rowCount() === 0) {
            throw new \Exception("No se pudo guardar el usuario");
        }
        $data['id'] = $this->connection->lastInsertId();
        if (!$data['id']) {
            throw new \Exception("No se pudo obtener el ID del usuario guardado");
        }
    }

    public function update(array $data): void {
        $sql = "UPDATE {$this->table} SET 
            apellido = :apellido,
            nombres = :nombres,
            cuenta = :cuenta,
            perfil = :perfil,
            clave = :clave,
            correo = :correo,
            estado = :estado,
            fechaAlta = :fechaAlta,
            resetPass = :resetPass
            WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($data);
        if ($stmt->rowCount() === 0) {
            throw new \Exception("No se pudo actualizar el usuario con id {$data['id']}");
        }
    }

    public function delete(int $id): void {
            $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(["id" => $id]);
        if ($stmt->rowCount() === 0) {
            throw new \Exception("No se pudo eliminar el usuario con id {$id}");
        }
        }

 
     public function list(array $filters): array {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function enable(int $id): void {
        $sql = "UPDATE {$this->table} SET estado = 1 WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(["id" => $id]);
    }

    public function disable(int $id): void {
        $sql = "UPDATE {$this->table} SET estado = 0 WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(["id" => $id]);
    }

    public function reset(int $id): void {
        $sql = "UPDATE {$this->table} SET resetPass = 1 WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(["id" => $id]);
    }

     public function suggestive(array $filters): array{
        return [];
    }
}
