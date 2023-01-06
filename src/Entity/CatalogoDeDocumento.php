<?php

    namespace App\Entity;

    class CatalogoDeDocumento{
        private int $id;
        private string $Nombre;
        private ?string $Descripcion;
        private int $Activo;
        private int $Prioridad;
        private string $Origen;
        private ?int $Requerido;

        public function __construct(string $Nombre, ?string $Descripcion, int $Activo, int $Prioridad, string $Origen, ?int $Requerido){
            $this->Nombre = $Nombre;
            $this->Descripcion = $Descripcion;
            $this->Activo = $Activo;
            $this->Prioridad = $Prioridad;
            $this->Origen = $Origen;
            $this->Requerido = $Requerido;
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
        
        public function setPrioridad(int $Prioridad): void{
            $this->Prioridad = $Prioridad;
        }
        
        public function getPrioridad(): int{
            return $this->Prioridad;
        }
        
        public function setOrigen(string $Origen): void{
            $this->Origen = $Origen;
        }
        
        public function getOrigen(): string{
            return $this->Origen;
        }
        
        public function setRequerido(?int $Requerido): void{
            $this->Requerido = $Requerido;
        }
        
        public function getRequerido(): ?int{
            return $this->Requerido;
        }
        
    }