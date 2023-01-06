<?php

    namespace App\Entity;

    class TipoDePersona{
        private int $id;
        private string $Descripcion;

        public function __construct(string $Descripcion){
            $this->Descripcion = $Descripcion;
        }
        
        public function setId(int $id): void{
            $this->id = $id;
        }
        
        public function getId(): int{
            return $this->id;
        }
        
        public function setDescripcion(string $Descripcion): void{
            $this->Descripcion = $Descripcion;
        }
        
        public function getDescripcion(): string{
            return $this->Descripcion;
        }
        
    }