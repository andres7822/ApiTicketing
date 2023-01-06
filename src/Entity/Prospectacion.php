<?php

    namespace App\Entity;

    class Prospectacion{
        private int $id;
        private int $Cliente;
        private \DateTime $FechaYHora;
        private int $TipoDeServicio;
        private string $DescripcionDelServicio;
        private int $Usuario;
        private int $Empleado;
        private int $Status;
        private int $Canalizado;

        public function __construct(int $Cliente, \DateTime $FechaYHora, int $TipoDeServicio, string $DescripcionDelServicio, int $Usuario, int $Empleado, int $Status, int $Canalizado){
            $this->Cliente = $Cliente;
            $this->FechaYHora = $FechaYHora;
            $this->TipoDeServicio = $TipoDeServicio;
            $this->DescripcionDelServicio = $DescripcionDelServicio;
            $this->Usuario = $Usuario;
            $this->Empleado = $Empleado;
            $this->Status = $Status;
            $this->Canalizado = $Canalizado;
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
        
        public function setFechaYHora(\DateTime $FechaYHora): void{
            $this->FechaYHora = $FechaYHora;
        }
        
        public function getFechaYHora(): \DateTime{
            return $this->FechaYHora;
        }
        
        public function setTipoDeServicio(int $TipoDeServicio): void{
            $this->TipoDeServicio = $TipoDeServicio;
        }
        
        public function getTipoDeServicio(): int{
            return $this->TipoDeServicio;
        }
        
        public function setDescripcionDelServicio(string $DescripcionDelServicio): void{
            $this->DescripcionDelServicio = $DescripcionDelServicio;
        }
        
        public function getDescripcionDelServicio(): string{
            return $this->DescripcionDelServicio;
        }
        
        public function setUsuario(int $Usuario): void{
            $this->Usuario = $Usuario;
        }
        
        public function getUsuario(): int{
            return $this->Usuario;
        }
        
        public function setEmpleado(int $Empleado): void{
            $this->Empleado = $Empleado;
        }
        
        public function getEmpleado(): int{
            return $this->Empleado;
        }
        
        public function setStatus(int $Status): void{
            $this->Status = $Status;
        }
        
        public function getStatus(): int{
            return $this->Status;
        }
        
        public function setCanalizado(int $Canalizado): void{
            $this->Canalizado = $Canalizado;
        }
        
        public function getCanalizado(): int{
            return $this->Canalizado;
        }
        
    }