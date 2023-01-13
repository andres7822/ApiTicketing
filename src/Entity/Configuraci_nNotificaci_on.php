<?php

    namespace App\Entity;

    class Configuraci_nNotificaci_on{
        private int $id;
        private ?int $Usuario;
        private int $TipoDeNotificaci_on;

        public function __construct(?int $Usuario, int $TipoDeNotificaci_on){
            $this->Usuario = $Usuario;
            $this->TipoDeNotificaci_on = $TipoDeNotificaci_on;
        }
        
        public function setId(int $id): void{
            $this->id = $id;
        }
        
        public function getId(): int{
            return $this->id;
        }
        
        public function setUsuario(?int $Usuario): void{
            $this->Usuario = $Usuario;
        }
        
        public function getUsuario(): ?int{
            return $this->Usuario;
        }
        
        public function setTipoDeNotificaci_on(int $TipoDeNotificaci_on): void{
            $this->TipoDeNotificaci_on = $TipoDeNotificaci_on;
        }
        
        public function getTipoDeNotificaci_on(): int{
            return $this->TipoDeNotificaci_on;
        }
        
    }