<?php

    namespace App\Entity;

    class SeguimientoTicket{
        private int $id;
        private int $Ticket;
        private \DateTime $FechaYHora;
        private int $Usuario;
        private string $Descripcion;
        private int $Status;

        public function __construct(int $Ticket, \DateTime $FechaYHora, int $Usuario, string $Descripcion, int $Status){
            $this->Ticket = $Ticket;
            $this->FechaYHora = $FechaYHora;
            $this->Usuario = $Usuario;
            $this->Descripcion = $Descripcion;
            $this->Status = $Status;
        }
        
        public function setId(int $id): void{
            $this->id = $id;
        }
        
        public function getId(): int{
            return $this->id;
        }
        
        public function setTicket(int $Ticket): void{
            $this->Ticket = $Ticket;
        }
        
        public function getTicket(): int{
            return $this->Ticket;
        }
        
        public function setFechaYHora(\DateTime $FechaYHora): void{
            $this->FechaYHora = $FechaYHora;
        }
        
        public function getFechaYHora(): \DateTime{
            return $this->FechaYHora;
        }
        
        public function setUsuario(int $Usuario): void{
            $this->Usuario = $Usuario;
        }
        
        public function getUsuario(): int{
            return $this->Usuario;
        }
        
        public function setDescripcion(string $Descripcion): void{
            $this->Descripcion = $Descripcion;
        }
        
        public function getDescripcion(): string{
            return $this->Descripcion;
        }
        
        public function setStatus(int $Status): void{
            $this->Status = $Status;
        }
        
        public function getStatus(): int{
            return $this->Status;
        }
        
    }