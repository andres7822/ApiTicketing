<?php

    namespace App\Entity;

    class Persona{
        private int $id;
        private string $NombreORazonSocial;
        private string $Telefono;
        private string $CorreoElectronico;
        private int $TipoDePersona;
        private ?int $DatosFiscales;

        public function __construct(string $NombreORazonSocial, string $Telefono, string $CorreoElectronico, int $TipoDePersona, ?int $DatosFiscales){
            $this->NombreORazonSocial = $NombreORazonSocial;
            $this->Telefono = $Telefono;
            $this->CorreoElectronico = $CorreoElectronico;
            $this->TipoDePersona = $TipoDePersona;
            $this->DatosFiscales = $DatosFiscales;
        }
        
        public function setId(int $id): void{
            $this->id = $id;
        }
        
        public function getId(): int{
            return $this->id;
        }
        
        public function setNombreORazonSocial(string $NombreORazonSocial): void{
            $this->NombreORazonSocial = $NombreORazonSocial;
        }
        
        public function getNombreORazonSocial(): string{
            return $this->NombreORazonSocial;
        }
        
        public function setTelefono(string $Telefono): void{
            $this->Telefono = $Telefono;
        }
        
        public function getTelefono(): string{
            return $this->Telefono;
        }
        
        public function setCorreoElectronico(string $CorreoElectronico): void{
            $this->CorreoElectronico = $CorreoElectronico;
        }
        
        public function getCorreoElectronico(): string{
            return $this->CorreoElectronico;
        }
        
        public function setTipoDePersona(int $TipoDePersona): void{
            $this->TipoDePersona = $TipoDePersona;
        }
        
        public function getTipoDePersona(): int{
            return $this->TipoDePersona;
        }
        
        public function setDatosFiscales(?int $DatosFiscales): void{
            $this->DatosFiscales = $DatosFiscales;
        }
        
        public function getDatosFiscales(): ?int{
            return $this->DatosFiscales;
        }
        
    }