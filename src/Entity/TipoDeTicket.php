<?php

namespace App\Entity;

class TipoDeTicket{
    private int $id;
    private string $TipoTicket;
    private int $DiasLimiteResolucion;

    public function __construct(string $TipoTicket, int $DiasLimiteResolucion){
        $this->TipoTicket = $TipoTicket;
        $this->DiasLimiteResolucion = $DiasLimiteResolucion;
    }

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function getId(): int{
        return $this->id;
    }

    public function setTipoTicket(string $TipoTicket): void{
        $this->TipoTicket = $TipoTicket;
    }

    public function getTipoTicket(): string{
        return $this->TipoTicket;
    }

    public function setDiasLimiteResolucion(int $DiasLimiteResolucion): void{
        $this->DiasLimiteResolucion = $DiasLimiteResolucion;
    }

    public function getDiasLimiteResolucion(): int{
        return $this->DiasLimiteResolucion;
    }

}