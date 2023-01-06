<?php

    namespace App\Entity;

    class Seguimiento{
        private int $id;
        private \DateTime $FechaYHora;
        private string $Descripcion;
        private string $Conclusiones;
        private int $Status;
        private int $Empleado;
        private int $Medio;
        private int $Prospectacion;

        public function __construct(\DateTime $FechaYHora, string $Descripcion, string $Conclusiones, int $Status, int $Empleado, int $Medio, int $Prospectacion){
            $this->FechaYHora = $FechaYHora;
            $this->Descripcion = $Descripcion;
            $this->Conclusiones = $Conclusiones;
            $this->Status = $Status;
            $this->Empleado = $Empleado;
            $this->Medio = $Medio;
            $this->Prospectacion = $Prospectacion;
        }
        
        public function setId(int $id): void{
            $this->id = $id;
        }
        
        public function getId(): int{
            return $this->id;
        }
        
        public function setFechaYHora(\DateTime $FechaYHora): void{
            $this->FechaYHora = $FechaYHora;
        }
        
        public function getFechaYHora(): \DateTime{
            return $this->FechaYHora;
        }
        
        public function setDescripcion(string $Descripcion): void{
            $this->Descripcion = $Descripcion;
        }
        
        public function getDescripcion(): string{
            return $this->Descripcion;
        }
        
        public function setConclusiones(string $Conclusiones): void{
            $this->Conclusiones = $Conclusiones;
        }
        
        public function getConclusiones(): string{
            return $this->Conclusiones;
        }
        
        public function setStatus(int $Status): void{
            $this->Status = $Status;
        }
        
        public function getStatus(): int{
            return $this->Status;
        }
        
        public function setEmpleado(int $Empleado): void{
            $this->Empleado = $Empleado;
        }
        
        public function getEmpleado(): int{
            return $this->Empleado;
        }
        
        public function setMedio(int $Medio): void{
            $this->Medio = $Medio;
        }
        
        public function getMedio(): int{
            return $this->Medio;
        }
        
        public function setProspectacion(int $Prospectacion): void{
            $this->Prospectacion = $Prospectacion;
        }
        
        public function getProspectacion(): int{
            return $this->Prospectacion;
        }
        
    }