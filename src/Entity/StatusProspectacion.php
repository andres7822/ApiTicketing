<?php

    namespace App\Entity;

    class StatusProspectacion{
        private int $id;
        private string $Descipcion;
        private string $Acotacion;
        private string $Origen;
        private ?string $Nombre;
        private ?string $Descripcion;

        public function __construct(string $Descipcion, int $Acotacion, string $Origen, ?string $Nombre, ?string $Descripcion){
            $this->Descipcion = $Descipcion;
            $this->Acotacion = $Acotacion;
            $this->Origen = $Origen;
            $this->Nombre = $Nombre;
            $this->Descripcion = $Descripcion;
        }
        
        public function setId(int $id): void{
            $this->id = $id;
        }
        
        public function getId(): int{
            return $this->id;
        }
        
        public function setDescipcion(string $Descipcion): void{
            $this->Descipcion = $Descipcion;
        }
        
        public function getDescipcion(): string{
            return $this->Descipcion;
        }
        
        public function setAcotacion(int $Acotacion): void{
            $this->Acotacion = $Acotacion;
        }
        
        public function getAcotacion(): int{
            return $this->Acotacion;
        }
        
        public function setOrigen(string $Origen): void{
            $this->Origen = $Origen;
        }
        
        public function getOrigen(): string{
            return $this->Origen;
        }
        
        public function setNombre(?string $Nombre): void{
            $this->Nombre = $Nombre;
        }
        
        public function getNombre(): ?string{
            return $this->Nombre;
        }
        
        public function setDescripcion(?string $Descripcion): void{
            $this->Descripcion = $Descripcion;
        }
        
        public function getDescripcion(): ?string{
            return $this->Descripcion;
        }
        
    }