<?php

    namespace App\Entity;

    class CatalogoCondicionesComerciales{
        private int $id;
        private string $Nombre;
        private string $DescripcionCondicion;
        private int $Requerida;

        public function __construct(string $Nombre, string $DescripcionCondicion, int $Requerida){
            $this->Nombre = $Nombre;
            $this->DescripcionCondicion = $DescripcionCondicion;
            $this->Requerida = $Requerida;
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
        
        public function setDescripcionCondicion(string $DescripcionCondicion): void{
            $this->DescripcionCondicion = $DescripcionCondicion;
        }
        
        public function getDescripcionCondicion(): string{
            return $this->DescripcionCondicion;
        }
        
        public function setRequerida(int $Requerida): void{
            $this->Requerida = $Requerida;
        }
        
        public function getRequerida(): int{
            return $this->Requerida;
        }
        
    }