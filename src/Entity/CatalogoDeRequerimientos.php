<?php

    namespace App\Entity;

    class CatalogoDeRequerimientos{
        private int $id;
        private int $TipoDeServicio;
        private string $Requerimiento;
        private int $Orden;
        private ?int $Requerido;
        private ?string $Catalogo;

        public function __construct(int $TipoDeServicio, string $Requerimiento, int $Orden, ?int $Requerido, ?string $Catalogo){
            $this->TipoDeServicio = $TipoDeServicio;
            $this->Requerimiento = $Requerimiento;
            $this->Orden = $Orden;
            $this->Requerido = $Requerido;
            $this->Catalogo = $Catalogo;
        }
        
        public function setId(int $id): void{
            $this->id = $id;
        }
        
        public function getId(): int{
            return $this->id;
        }
        
        public function setTipoDeServicio(int $TipoDeServicio): void{
            $this->TipoDeServicio = $TipoDeServicio;
        }
        
        public function getTipoDeServicio(): int{
            return $this->TipoDeServicio;
        }
        
        public function setRequerimiento(string $Requerimiento): void{
            $this->Requerimiento = $Requerimiento;
        }
        
        public function getRequerimiento(): string{
            return $this->Requerimiento;
        }
        
        public function setOrden(int $Orden): void{
            $this->Orden = $Orden;
        }
        
        public function getOrden(): int{
            return $this->Orden;
        }
        
        public function setRequerido(?int $Requerido): void{
            $this->Requerido = $Requerido;
        }
        
        public function getRequerido(): ?int{
            return $this->Requerido;
        }
        
        public function setCatalogo(?string $Catalogo): void{
            $this->Catalogo = $Catalogo;
        }
        
        public function getCatalogo(): ?string{
            return $this->Catalogo;
        }
        
    }