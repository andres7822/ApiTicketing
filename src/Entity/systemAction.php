<?php

    namespace App\Entity;

    class systemAction{
        private int $id;
        private ?string $name;
        private ?string $description;

        public function __construct(?string $name, ?string $description){
            $this->name = $name;
            $this->description = $description;
        }
        
        public function setId(int $id): void{
            $this->id = $id;
        }
        
        public function getId(): int{
            return $this->id;
        }
        
        public function setName(?string $name): void{
            $this->name = $name;
        }
        
        public function getName(): ?string{
            return $this->name;
        }
        
        public function setDescription(?string $description): void{
            $this->description = $description;
        }
        
        public function getDescription(): ?string{
            return $this->description;
        }
        
    }