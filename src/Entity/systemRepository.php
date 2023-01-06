<?php

    namespace App\Entity;

    class systemRepository{
        private int $id;
        private ?string $name;
        private ?string $description;
        private ?float $size;
        private ?string $table;
        private ?string $tuple;
        private ?string $route;

        public function __construct(?string $name, ?string $description, ?float $size, ?string $table, ?string $tuple, ?string $route){
            $this->name = $name;
            $this->description = $description;
            $this->size = $size;
            $this->table = $table;
            $this->tuple = $tuple;
            $this->route = $route;
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
        
        public function setSize(?float $size): void{
            $this->size = $size;
        }
        
        public function getSize(): ?float{
            return $this->size;
        }
        
        public function setTable(?string $table): void{
            $this->table = $table;
        }
        
        public function getTable(): ?string{
            return $this->table;
        }
        
        public function setTuple(?string $tuple): void{
            $this->tuple = $tuple;
        }
        
        public function getTuple(): ?string{
            return $this->tuple;
        }
        
        public function setRoute(?string $route): void{
            $this->route = $route;
        }
        
        public function getRoute(): ?string{
            return $this->route;
        }
        
    }