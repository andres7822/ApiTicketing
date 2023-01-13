<?php

    namespace App\Entity;

    class Notificaci_on{
        private int $id;
        private int $Usuario;
        private ?int $Notificado;
        private int $Mensaje;

        public function __construct(int $Usuario, ?int $Notificado, int $Mensaje){
            $this->Usuario = $Usuario;
            $this->Notificado = $Notificado;
            $this->Mensaje = $Mensaje;
        }
        
        public function setId(int $id): void{
            $this->id = $id;
        }
        
        public function getId(): int{
            return $this->id;
        }
        
        public function setUsuario(int $Usuario): void{
            $this->Usuario = $Usuario;
        }
        
        public function getUsuario(): int{
            return $this->Usuario;
        }
        
        public function setNotificado(?int $Notificado): void{
            $this->Notificado = $Notificado;
        }
        
        public function getNotificado(): ?int{
            return $this->Notificado;
        }
        
        public function setMensaje(int $Mensaje): void{
            $this->Mensaje = $Mensaje;
        }
        
        public function getMensaje(): int{
            return $this->Mensaje;
        }
        
    }