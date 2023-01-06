<?php

    namespace App\Entity;

    class Empleado{
        private int $id;
        private string $Clave;
        private int $Persona;

        public function __construct(string $Clave, int $Persona){
            $this->Clave = $Clave;
            $this->Persona = $Persona;
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
        
    }