<?php
    namespace app\core\models\dao;

    use app\core\models\dao\base\BaseDao;
    use app\core\models\dao\base\interfaceDao;

    final class productoDao extends BaseDao implements interfaceDao{
        
        public function __construct(?\PDO $connection){
            parent::__construct($connection, "productos");
        }

        public function load(int $id): array {
            $sql = "SELECT id, nombre, codigo, descripcion, categoriaId, precio, stock FROM {$this->table} WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(["id" => $id]);

            if ($stmt->rowCount() === 0) {
                throw new \Exception("No se encontró producto $id");
            }
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        public function save(array $data): void {
            $sql = "INSERT INTO {$this->table} 
            (nombre, codigo, descripcion, categoriaId, precio, stock) 
            VALUES (:nombre, :codigo, :descripcion, :categoriaId, :precio, :stock)";
        $stmt = $this->connection->prepare($sql);
        $params = [
            'nombre' => $data['nombre'],
            'codigo' => $data['codigo'],
            'descripcion' => $data['descripcion'],
            'categoriaId' => $data['categoriaId'],
            'precio' => $data['precio'],
            'stock' => $data['stock']
        ];
        $stmt->execute($params);
        if ($stmt->rowCount() === 0) {
            throw new \Exception("No se pudo guardar el producto");
        }
        $data['id'] = $this->connection->lastInsertId();
        if (!$data['id']) {
            throw new \Exception("No se pudo obtener el ID del producto guardado");
        }
        }

        public function update(array $data): void{
           $sql = "UPDATE {$this->table} SET 
            nombre = :nombre,
            codigo = :codigo,
            descripcion = :descripcion,
            categoriaId = :categoriaId,
            precio = :precio,
            stock = :stock
            WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($data);
        if ($stmt->rowCount() === 0) {
            throw new \Exception("No se pudo actualizar el producto con id {$data['id']}");
        } 
        }

        public function delete(int $id): void {
             $sql = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(["id" => $id]);
            if ($stmt->rowCount() === 0) {
                throw new \Exception("No se pudo eliminar el producto con id $id");
            }
        }


        public function list(array $filters): array {
            $sql = "SELECT * FROM {$this->table}";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function suggestive(array $filters): array{
            return[];
        }
    }