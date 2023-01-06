<?php

    namespace App\Entity;

    class TipoDeServicio{
        private int $id;
        private string $Nombre;
        private ?string $Descripcion;
        private int $Activo;

        public function __construct(string $Nombre, ?string $Descripcion, int $Activo){
            $this->Nombre = $Nombre;
            $this->Descripcion = $Descripcion;
            $this->Activo = $Activo;
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
        
        public function setActivo(int $Activo): void{
            $this->Activo = $Activo;
        }
        
        public function getActivo(): int{
            return $this->Activo;
        }
        
    }