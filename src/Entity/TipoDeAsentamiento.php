<?php

    namespace App\Entity;

    class TipoDeAsentamiento{
        private int $id;
        private string $Nombre;

        public function __construct(string $Nombre){
            $this->Nombre = $Nombre;
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
        
    }