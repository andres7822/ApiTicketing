<?php

    namespace App\Entity;

    class Empleado{
        private int $id;
        private string $Clave;
        private int $Persona;
        private int $Area;
        private int $Sucursal;

        public function __construct(string $Clave, int $Persona, ?int $Area, ?int $Sucursal){
            $this->Clave = $Clave;
            $this->Persona = $Persona;
            $this->Area = $Area;
            $this->Sucursal = $Sucursal;
        }
        
        public function setId(int $id): void{
            $this->id = $id;
        }
        
        public function getId(): int{
            return $this->id;
        }
        
        public function setClave(string $Clave): void{
            $this->Clave = $Clave;
        }
        
        public function getClave(): string{
            return $this->Clave;
        }
        
        public function setPersona(int $Persona): void{
            $this->Persona = $Persona;
        }
        
        public function getPersona(): int{
            return $this->Persona;
        }


        public function getArea(): ?int{
            return $this->Area;
        }

        public function setArea(?int $Area): void{
            $this->Area = $Area;
        }

        public function getSucursal(): ?int{
            return $this->Sucursal;
        }

        public function setSucursal(?int $Sucursal): void{
            $this->Sucursal = $Sucursal;
        }


        
    }