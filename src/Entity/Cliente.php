<?php

    namespace App\Entity;

    class Cliente{
        private int $id;
        private string $Nombre;
        private string $NoCliente;
        private int $Empresa;
        private \DateTime $FechaTupla;
        private int $UsuarioRegistro;
        private int $Status;
        private ?int $PaginaWeb;
        private ?float $LimiteDeCredito;

        public function __construct(string $Nombre, string $NoCliente, int $Empresa, \DateTime $FechaTupla, int $UsuarioRegistro, int $Status, ?int $PaginaWeb, ?float $LimiteDeCredito){
            $this->Nombre = $Nombre;
            $this->NoCliente = $NoCliente;
            $this->Empresa = $Empresa;
            $this->FechaTupla = $FechaTupla;
            $this->UsuarioRegistro = $UsuarioRegistro;
            $this->Status = $Status;
            $this->PaginaWeb = $PaginaWeb;
            $this->LimiteDeCredito = $LimiteDeCredito;
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
        
        public function setNoCliente(string $NoCliente): void{
            $this->NoCliente = $NoCliente;
        }
        
        public function getNoCliente(): string{
            return $this->NoCliente;
        }
        
        public function setEmpresa(int $Empresa): void{
            $this->Empresa = $Empresa;
        }
        
        public function getEmpresa(): int{
            return $this->Empresa;
        }
        
        public function setFechaTupla(\DateTime $FechaTupla): void{
            $this->FechaTupla = $FechaTupla;
        }
        
        public function getFechaTupla(): \DateTime{
            return $this->FechaTupla;
        }
        
        public function setUsuarioRegistro(int $UsuarioRegistro): void{
            $this->UsuarioRegistro = $UsuarioRegistro;
        }
        
        public function getUsuarioRegistro(): int{
            return $this->UsuarioRegistro;
        }
        
        public function setStatus(int $Status): void{
            $this->Status = $Status;
        }
        
        public function getStatus(): int{
            return $this->Status;
        }
        
        public function setPaginaWeb(?int $PaginaWeb): void{
            $this->PaginaWeb = $PaginaWeb;
        }
        
        public function getPaginaWeb(): ?int{
            return $this->PaginaWeb;
        }
        
        public function setLimiteDeCredito(?float $LimiteDeCredito): void{
            $this->LimiteDeCredito = $LimiteDeCredito;
        }
        
        public function getLimiteDeCredito(): ?float{
            return $this->LimiteDeCredito;
        }
        
    }