<?php

    namespace App\Entity;

    class ClienteCondicionComercial{
        private int $id;
        private int $Cliente;
        private int $CatalogoCondicionesComerciales;
        private string $Descripcion;
        private ?\DateTime $FechaAceptaci_on;
        private int $Status;
        private int $UsuarioRegistro;
        private \DateTime $FechaTupla;

        public function __construct(int $Cliente, int $CatalogoCondicionesComerciales, string $Descripcion, ?\DateTime $FechaAceptaci_on, int $Status, int $UsuarioRegistro, \DateTime $FechaTupla){
            $this->Cliente = $Cliente;
            $this->CatalogoCondicionesComerciales = $CatalogoCondicionesComerciales;
            $this->Descripcion = $Descripcion;
            $this->FechaAceptaci_on = $FechaAceptaci_on;
            $this->Status = $Status;
            $this->UsuarioRegistro = $UsuarioRegistro;
            $this->FechaTupla = $FechaTupla;
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
        
        public function setCatalogoCondicionesComerciales(int $CatalogoCondicionesComerciales): void{
            $this->CatalogoCondicionesComerciales = $CatalogoCondicionesComerciales;
        }
        
        public function getCatalogoCondicionesComerciales(): int{
            return $this->CatalogoCondicionesComerciales;
        }
        
        public function setDescripcion(string $Descripcion): void{
            $this->Descripcion = $Descripcion;
        }
        
        public function getDescripcion(): string{
            return $this->Descripcion;
        }
        
        public function setFechaAceptaci_on(?\DateTime $FechaAceptaci_on): void{
            $this->FechaAceptaci_on = $FechaAceptaci_on;
        }
        
        public function getFechaAceptaci_on(): ?\DateTime{
            return $this->FechaAceptaci_on;
        }
        
        public function setStatus(int $Status): void{
            $this->Status = $Status;
        }
        
        public function getStatus(): int{
            return $this->Status;
        }
        
        public function setUsuarioRegistro(int $UsuarioRegistro): void{
            $this->UsuarioRegistro = $UsuarioRegistro;
        }
        
        public function getUsuarioRegistro(): int{
            return $this->UsuarioRegistro;
        }
        
        public function setFechaTupla(\DateTime $FechaTupla): void{
            $this->FechaTupla = $FechaTupla;
        }
        
        public function getFechaTupla(): \DateTime{
            return $this->FechaTupla;
        }
        
    }