<?php

    namespace App\Entity;

    class Empresa{
        private int $id;
        private int $NombreComercial;
        private ?int $DatosFiscales;

        public function __construct(int $NombreComercial, ?int $DatosFiscales){
            $this->NombreComercial = $NombreComercial;
            $this->DatosFiscales = $DatosFiscales;
        }
        
        public function setId(int $id): void{
            $this->id = $id;
        }
        
        public function getId(): int{
            return $this->id;
        }
        
        public function setNombreComercial(int $NombreComercial): void{
            $this->NombreComercial = $NombreComercial;
        }
        
        public function getNombreComercial(): int{
            return $this->NombreComercial;
        }
        
        public function setDatosFiscales(?int $DatosFiscales): void{
            $this->DatosFiscales = $DatosFiscales;
        }
        
        public function getDatosFiscales(): ?int{
            return $this->DatosFiscales;
        }
        
    }