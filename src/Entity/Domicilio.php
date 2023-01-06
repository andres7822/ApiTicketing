<?php

    namespace App\Entity;

    class Domicilio{
        private int $id;
        private ?int $TipoDeVialidad;
        private ?string $Vialidad;
        private ?int $TipoDeAsentamiento;
        private ?string $Asentamiento;
        private ?string $NumeroExterior;
        private ?string $NumeroInterior;
        private ?string $Pais;
        private ?string $EntidadFederativa;
        private ?string $Municipio;
        private ?string $Localidad;
        private ?string $CodigoPostal;
        private ?string $Latitud;
        private ?string $Longitud;
        private ?string $GooglePin;
        private int $Visible;
        private int $Actual;
        private \DateTime $FechaTupla;
        private string $Origen;
        private string $Tupla;

        public function __construct(?int $TipoDeVialidad, ?string $Vialidad, ?int $TipoDeAsentamiento, ?string $Asentamiento, ?string $NumeroExterior, ?string $NumeroInterior, ?string $Pais, ?string $EntidadFederativa, ?string $Municipio, ?string $Localidad, ?string $CodigoPostal, ?string $Latitud, ?string $Longitud, ?string $GooglePin, int $Visible, int $Actual, \DateTime $FechaTupla, string $Origen, string $Tupla){
            $this->TipoDeVialidad = $TipoDeVialidad;
            $this->Vialidad = $Vialidad;
            $this->TipoDeAsentamiento = $TipoDeAsentamiento;
            $this->Asentamiento = $Asentamiento;
            $this->NumeroExterior = $NumeroExterior;
            $this->NumeroInterior = $NumeroInterior;
            $this->Pais = $Pais;
            $this->EntidadFederativa = $EntidadFederativa;
            $this->Municipio = $Municipio;
            $this->Localidad = $Localidad;
            $this->CodigoPostal = $CodigoPostal;
            $this->Latitud = $Latitud;
            $this->Longitud = $Longitud;
            $this->GooglePin = $GooglePin;
            $this->Visible = $Visible;
            $this->Actual = $Actual;
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
        
        public function setTipoDeVialidad(?int $TipoDeVialidad): void{
            $this->TipoDeVialidad = $TipoDeVialidad;
        }
        
        public function getTipoDeVialidad(): ?int{
            return $this->TipoDeVialidad;
        }
        
        public function setVialidad(?string $Vialidad): void{
            $this->Vialidad = $Vialidad;
        }
        
        public function getVialidad(): ?string{
            return $this->Vialidad;
        }
        
        public function setTipoDeAsentamiento(?int $TipoDeAsentamiento): void{
            $this->TipoDeAsentamiento = $TipoDeAsentamiento;
        }
        
        public function getTipoDeAsentamiento(): ?int{
            return $this->TipoDeAsentamiento;
        }
        
        public function setAsentamiento(?string $Asentamiento): void{
            $this->Asentamiento = $Asentamiento;
        }
        
        public function getAsentamiento(): ?string{
            return $this->Asentamiento;
        }
        
        public function setNumeroExterior(?string $NumeroExterior): void{
            $this->NumeroExterior = $NumeroExterior;
        }
        
        public function getNumeroExterior(): ?string{
            return $this->NumeroExterior;
        }
        
        public function setNumeroInterior(?string $NumeroInterior): void{
            $this->NumeroInterior = $NumeroInterior;
        }
        
        public function getNumeroInterior(): ?string{
            return $this->NumeroInterior;
        }
        
        public function setPais(?string $Pais): void{
            $this->Pais = $Pais;
        }
        
        public function getPais(): ?string{
            return $this->Pais;
        }
        
        public function setEntidadFederativa(?string $EntidadFederativa): void{
            $this->EntidadFederativa = $EntidadFederativa;
        }
        
        public function getEntidadFederativa(): ?string{
            return $this->EntidadFederativa;
        }
        
        public function setMunicipio(?string $Municipio): void{
            $this->Municipio = $Municipio;
        }
        
        public function getMunicipio(): ?string{
            return $this->Municipio;
        }
        
        public function setLocalidad(?string $Localidad): void{
            $this->Localidad = $Localidad;
        }
        
        public function getLocalidad(): ?string{
            return $this->Localidad;
        }
        
        public function setCodigoPostal(?string $CodigoPostal): void{
            $this->CodigoPostal = $CodigoPostal;
        }
        
        public function getCodigoPostal(): ?string{
            return $this->CodigoPostal;
        }
        
        public function setLatitud(?string $Latitud): void{
            $this->Latitud = $Latitud;
        }
        
        public function getLatitud(): ?string{
            return $this->Latitud;
        }
        
        public function setLongitud(?string $Longitud): void{
            $this->Longitud = $Longitud;
        }
        
        public function getLongitud(): ?string{
            return $this->Longitud;
        }
        
        public function setGooglePin(?string $GooglePin): void{
            $this->GooglePin = $GooglePin;
        }
        
        public function getGooglePin(): ?string{
            return $this->GooglePin;
        }
        
        public function setVisible(int $Visible): void{
            $this->Visible = $Visible;
        }
        
        public function getVisible(): int{
            return $this->Visible;
        }
        
        public function setActual(int $Actual): void{
            $this->Actual = $Actual;
        }
        
        public function getActual(): int{
            return $this->Actual;
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