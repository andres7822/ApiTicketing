<?php

namespace App\Entity;

class StatusTicket{
    private int $id;
    private string $Nombre;
    private ?string $Descripcion;
    private ?string $Acotacion;

    public function __construct(string $Nombre, ?string $Descripcion, ?string $Acotacion){
        $this->Nombre = $Nombre;
        $this->Descripcion = $Descripcion;
        $this->Acotacion = $Acotacion;
    }

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function getId(): int{
        return $this->id;
    }

    public function setNombre(string $Nombre): void{
        $this->Nombre = $Nombre;
    }

    public function getNombre(): string{
        return $this->Nombre;
    }

    public function setDescripcion(?string $Descripcion): void{
        $this->Descripcion = $Descripcion;
    }

    public function getDescripcion(): ?string{
        return $this->Descripcion;
    }

    public function setAcotacion(?string $Acotacion): void{
        $this->Acotacion = $Acotacion;
    }

    public function getAcotacion(): ?string{
        return $this->Acotacion;
    }


}