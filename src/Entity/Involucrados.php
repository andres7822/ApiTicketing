<?php

    namespace App\Entity;

    class Involucrados{
        private int $id;
        private int $NivelDeParticipacion;
        private int $Ticket;
        private int $Participante;
        private int $Participacion;

        public function __construct(int $NivelDeParticipacion, int $Ticket, int $Participante, int $Participacion){
            $this->NivelDeParticipacion = $NivelDeParticipacion;
            $this->Ticket = $Ticket;
            $this->Participante = $Participante;
            $this->Participacion = $Participacion;
        }
        
        public function setId(int $id): void{
            $this->id = $id;
        }
        
        public function getId(): int{
            return $this->id;
        }
        
        public function setNivelDeParticipacion(int $NivelDeParticipacion): void{
            $this->NivelDeParticipacion = $NivelDeParticipacion;
        }
        
        public function getNivelDeParticipacion(): int{
            return $this->NivelDeParticipacion;
        }
        
        public function setTicket(int $Ticket): void{
            $this->Ticket = $Ticket;
        }
        
        public function getTicket(): int{
            return $this->Ticket;
        }
        
        public function setParticipante(int $Participante): void{
            $this->Participante = $Participante;
        }
        
        public function getParticipante(): int{
            return $this->Participante;
        }
        
        public function setParticipacion(int $Participacion): void{
            $this->Participacion = $Participacion;
        }
        
        public function getParticipacion(): int{
            return $this->Participacion;
        }
        
    }