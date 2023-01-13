<?php

    namespace App\Entity;

    class Mensaje{
        private int $id;
        private string $Mensaje;

        public function __construct(string $Mensaje){
            $this->Mensaje = $Mensaje;
        }
        
        public function setId(int $id): void{
            $this->id = $id;
        }
        
        public function getId(): int{
            return $this->id;
        }
        
        public function setMensaje(string $Mensaje): void{
            $this->Mensaje = $Mensaje;
        }
        
        public function getMensaje(): string{
            return $this->Mensaje;
        }
        
    }