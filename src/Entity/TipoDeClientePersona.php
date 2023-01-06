<?php

    namespace App\Entity;

    class TipoDeClientePersona{
        private int $id;
        private string $Nombre;
        private ?string $Descripcion;

        public function __construct(string $Nombre, ?string $Descripcion){
            $this->Nombre = $Nombre;
            $this->Descripcion = $Descripcion;
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
        
    }