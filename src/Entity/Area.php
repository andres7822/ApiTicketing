<?php

namespace App\Entity;

class Area{
    private string $id;
    private string $Nombre;

    public function __construct(string $Nombre){
        $this->Nombre = $Nombre;
    }

    public function setId(string $id): void{
        $this->id = $id;
    }

    public function getId(): string{
        return $this->id;
    }

    public function setNombre(string $Nombre): void{
        $this->Nombre = $Nombre;
    }

    public function getNombre(): string{
        return $this->Nombre;
    }


}