<?php

namespace App\Entity;

class ParticipacionTicket{
    private string $id;
    private string $Descripcion;
    
    public function __construct(string $Descripcion){
        $this->Descripcion = $Descripcion;
    }

    public function setId(string $id): void{
        $this->id = $id;
    }

    public function getId(): string{
        return $this->id;
    }

    public function setDescripcion(string $Descripcion): void{
        $this->Descripcion = $Descripcion;
    }

    public function getDescripcion(): string{
        return $this->Descripcion;
    }


}