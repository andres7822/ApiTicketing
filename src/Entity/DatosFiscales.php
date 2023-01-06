<?php

    namespace App\Entity;

    class DatosFiscales{
        private int $id;
        private string $NombreORazonSocial;
        private string $RFC;
        private int $RegimenFiscal;
        private int $Domicilio;
        private \DateTime $FechaTupla;
        private string $Origen;
        private string $Tupla;

        public function __construct(string $NombreORazonSocial, string $RFC, int $RegimenFiscal, int $Domicilio, \DateTime $FechaTupla, string $Origen, string $Tupla){
            $this->NombreORazonSocial = $NombreORazonSocial;
            $this->RFC = $RFC;
            $this->RegimenFiscal = $RegimenFiscal;
            $this->Domicilio = $Domicilio;
            $this->FechaTupla = $FechaTupla;
            $this->Origen = $Origen;
            $this->Tupla = $Tupla;
        }
        
        public function setId(int $id): void{
            $this->id = $id;
        }
        
        public function getId(): int{
            return $this->id;
        }
        
        public function setNombreORazonSocial(string $NombreORazonSocial): void{
            $this->NombreORazonSocial = $NombreORazonSocial;
        }
        
        public function getNombreORazonSocial(): string{
            return $this->NombreORazonSocial;
        }
        
        public function setRFC(string $RFC): void{
            $this->RFC = $RFC;
        }
        
        public function getRFC(): string{
            return $this->RFC;
        }
        
        public function setRegimenFiscal(int $RegimenFiscal): void{
            $this->RegimenFiscal = $RegimenFiscal;
        }
        
        public function getRegimenFiscal(): int{
            return $this->RegimenFiscal;
        }
        
        public function setDomicilio(int $Domicilio): void{
            $this->Domicilio = $Domicilio;
        }
        
        public function getDomicilio(): int{
            return $this->Domicilio;
        }
        
        public function setFechaTupla(\DateTime $FechaTupla): void{
            $this->FechaTupla = $FechaTupla;
        }
        
        public function getFechaTupla(): \DateTime{
            return $this->FechaTupla;
        }
        
        public function setOrigen(string $Origen): void{
            $this->Origen = $Origen;
        }
        
        public function getOrigen(): string{
            return $this->Origen;
        }
        
        public function setTupla(string $Tupla): void{
            $this->Tupla = $Tupla;
        }
        
        public function getTupla(): string{
            return $this->Tupla;
        }
        
    }