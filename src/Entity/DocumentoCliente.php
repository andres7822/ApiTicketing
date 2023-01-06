<?php

    namespace App\Entity;

    class DocumentoCliente{
        private int $id;
        private int $Cliente;
        private int $Documento;
        private ?int $Archivo;
        private ?string $Comentarios;

        public function __construct(int $Cliente, int $Documento, ?int $Archivo, ?string $Comentarios){
            $this->Cliente = $Cliente;
            $this->Documento = $Documento;
            $this->Archivo = $Archivo;
            $this->Comentarios = $Comentarios;
        }
        
        public function setId(int $id): void{
            $this->id = $id;
        }
        
        public function getId(): int{
            return $this->id;
        }
        
        public function setCliente(int $Cliente): void{
            $this->Cliente = $Cliente;
        }
        
        public function getCliente(): int{
            return $this->Cliente;
        }
        
        public function setDocumento(int $Documento): void{
            $this->Documento = $Documento;
        }
        
        public function getDocumento(): int{
            return $this->Documento;
        }
        
        public function setArchivo(?int $Archivo): void{
            $this->Archivo = $Archivo;
        }
        
        public function getArchivo(): ?int{
            return $this->Archivo;
        }
        
        public function setComentarios(?string $Comentarios): void{
            $this->Comentarios = $Comentarios;
        }
        
        public function getComentarios(): ?string{
            return $this->Comentarios;
        }
        
    }