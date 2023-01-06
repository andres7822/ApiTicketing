<?php

    namespace App\Entity;

    class ClientePersona{
        private int $id;
        private int $Cliente;
        private int $Persona;
        private int $Relacion;
        private ?string $Titulo;
        private ?string $Telefono;
        private ?string $Telefono2;
        private ?string $CorreoElectronico;

        public function __construct(int $Cliente, int $Persona, int $Relacion, ?string $Titulo, ?string $Telefono, ?string $Telefono2, ?string $CorreoElectronico){
            $this->Cliente = $Cliente;
            $this->Persona = $Persona;
            $this->Relacion = $Relacion;
            $this->Titulo = $Titulo;
            $this->Telefono = $Telefono;
            $this->Telefono2 = $Telefono2;
            $this->CorreoElectronico = $CorreoElectronico;
        }
        
        public function setId(int $id): void{
            $this->id = $id;
        }
        
        public function getId(): int{
            return $this->id;
        }
        
        public function setCliente(int $Cliente): void{
            $this->Cliente = $Cliente;
        }
        
        public function getCliente(): int{
            return $this->Cliente;
        }
        
        public function setPersona(int $Persona): void{
            $this->Persona = $Persona;
        }
        
        public function getPersona(): int{
            return $this->Persona;
        }
        
        public function setRelacion(int $Relacion): void{
            $this->Relacion = $Relacion;
        }
        
        public function getRelacion(): int{
            return $this->Relacion;
        }
        
        public function setTitulo(?string $Titulo): void{
            $this->Titulo = $Titulo;
        }
        
        public function getTitulo(): ?string{
            return $this->Titulo;
        }
        
        public function setTelefono(?string $Telefono): void{
            $this->Telefono = $Telefono;
        }
        
        public function getTelefono(): ?string{
            return $this->Telefono;
        }
        
        public function setTelefono2(?string $Telefono2): void{
            $this->Telefono2 = $Telefono2;
        }
        
        public function getTelefono2(): ?string{
            return $this->Telefono2;
        }
        
        public function setCorreoElectronico(?string $CorreoElectronico): void{
            $this->CorreoElectronico = $CorreoElectronico;
        }
        
        public function getCorreoElectronico(): ?string{
            return $this->CorreoElectronico;
        }
        
    }