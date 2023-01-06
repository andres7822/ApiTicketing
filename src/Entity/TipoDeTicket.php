<?php

namespace App\Entity;

class TipoDeTicket{
    private int $id;
    private string $TipoDeTicket;

    public function __construct(string $TipoDeTicket){
        $this->TipoDeTicket = $TipoDeTicket;
    }

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function getId(): int{
        return $this->id;
    }

    public function setTipoDeTicket(string $TipoDeTicket): void{
        $this->TipoDeTicket = $TipoDeTicket;
    }

    public function getTipoDeTicket(): string{
        return $this->TipoDeTicket;
    }

}