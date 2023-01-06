<?php

    namespace App\Entity;

    class RequerimientoCliente{
        private int $id;
        private int $Cliente;
        private \DateTime $Fecha;
        private ?int $Status;
        private string $Valor;
        private int $Solicitante;
        private ?int $Requerimiento;
        private int $UsuarioRegistro;
        private int $EmpleadoElaboro;

        public function __construct(int $Cliente, \DateTime $Fecha, ?int $Status, string $Valor, int $Solicitante, ?int $Requerimiento, int $UsuarioRegistro, int $EmpleadoElaboro){
            $this->Cliente = $Cliente;
            $this->Fecha = $Fecha;
            $this->Status = $Status;
            $this->Valor = $Valor;
            $this->Solicitante = $Solicitante;
            $this->Requerimiento = $Requerimiento;
            $this->UsuarioRegistro = $UsuarioRegistro;
            $this->EmpleadoElaboro = $EmpleadoElaboro;
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
        
        public function setFecha(\DateTime $Fecha): void{
            $this->Fecha = $Fecha;
        }
        
        public function getFecha(): \DateTime{
            return $this->Fecha;
        }
        
        public function setStatus(?int $Status): void{
            $this->Status = $Status;
        }
        
        public function getStatus(): ?int{
            return $this->Status;
        }
        
        public function setValor(string $Valor): void{
            $this->Valor = $Valor;
        }
        
        public function getValor(): string{
            return $this->Valor;
        }
        
        public function setSolicitante(int $Solicitante): void{
            $this->Solicitante = $Solicitante;
        }
        
        public function getSolicitante(): int{
            return $this->Solicitante;
        }
        
        public function setRequerimiento(?int $Requerimiento): void{
            $this->Requerimiento = $Requerimiento;
        }
        
        public function getRequerimiento(): ?int{
            return $this->Requerimiento;
        }
        
        public function setUsuarioRegistro(int $UsuarioRegistro): void{
            $this->UsuarioRegistro = $UsuarioRegistro;
        }
        
        public function getUsuarioRegistro(): int{
            return $this->UsuarioRegistro;
        }
        
        public function setEmpleadoElaboro(int $EmpleadoElaboro): void{
            $this->EmpleadoElaboro = $EmpleadoElaboro;
        }
        
        public function getEmpleadoElaboro(): int{
            return $this->EmpleadoElaboro;
        }
        
    }