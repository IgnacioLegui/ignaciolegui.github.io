<?php

namespace app\core\models\dto;

use app\core\models\dto\base\InterfaceDto;

final class UsuarioDto implements InterfaceDto {

    private $id, $apellido, $nombres, $cuenta, $correo, $perfil, $fechaAlta, $clave, $estado, $resetPass;

    public function __construct(array $data = []) {
        $this->setId($data["id"] ?? 0);
        $this->setApellido($data["apellido"] ?? "");
        $this->setNombres($data["nombres"] ?? "");
        $this->setCuenta($data["cuenta"] ?? "");
        $this->setCorreo($data["correo"] ?? "");
        $this->setPerfil($data["perfil"] ?? "");
        $this->setFechaAlta($data["fechaAlta"] ?? date("Y-m-d"));
        $this->setClave($data["clave"] ?? "");
        $this->setEstado($data["estado"] ?? 1);
        $this->setResetPass($data["resetPass"] ?? 0);
    }

    public function getId(): int { return $this->id; }
    public function getApellido(): string { return $this->apellido; }
    public function getNombres(): string { return $this->nombres; }
    public function getCuenta(): string { return $this->cuenta; }
    public function getCorreo(): string { return $this->correo; }
    public function getPerfil(): string { return $this->perfil; }
    public function getFechaAlta(): string { return $this->fechaAlta; }
    public function getClave(): string { return $this->clave; }
    public function getEstado(): int { return $this->estado; }
    public function getResetPass(): int { return $this->resetPass; }

    public function setId(int $id): void { $this->id = $id > 0 ? $id : 0; }
    public function setApellido(string $apellido): void { $this->apellido = trim($apellido); }
    public function setNombres(string $nombres): void { $this->nombres = trim($nombres); }
    public function setCuenta(string $cuenta): void { $this->cuenta = trim($cuenta); }
    public function setCorreo(string $correo): void { $this->correo = trim($correo); }
    public function setPerfil(string $perfil): void { $this->perfil = trim($perfil); }
    public function setFechaAlta(string $fechaAlta): void { $this->fechaAlta = $fechaAlta; }
    public function setClave(string $clave): void { $this->clave = $clave; }
    public function setEstado(int $estado): void { $this->estado = $estado; }
    public function setResetPass(int $resetPass): void { $this->resetPass = $resetPass; }

    public function toArray(): array {
        return [
            "id"         => $this->getId(),
            "apellido"   => $this->getApellido(),
            "nombres"    => $this->getNombres(),
            "cuenta"     => $this->getCuenta(),
            "correo"     => $this->getCorreo(),
            "perfil"     => $this->getPerfil(),
            "fechaAlta"  => $this->getFechaAlta(),
            "clave"      => $this->getClave(),
            "estado"     => $this->getEstado(),
            "resetPass"  => $this->getResetPass()
        ];
    }
}
