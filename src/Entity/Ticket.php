<?php

namespace App\Entity;

class Ticket
{
    private int $id;
    private string $Folio;
    private \DateTime $FechaYHora;
    private ?string $Tema;
    private string $Descripcion;
    private int $Solicitante;
    private int $Sucursal;
    private int $Area;
    private ?\DateTime $FechaCompromiso;
    private ?string $Observaciones;
    private int $Status;
    private int $Tipo;
    private ?int $Involucrados;

    public function __construct(string $Folio, \DateTime $FechaYHora, ?string $Tema, string $Descripcion, int $Solicitante, int $Sucursal, int $Area, ?\DateTime $FechaCompromiso, ?string $Observaciones, int $Status, int $Tipo, ?int $Involucrados)
    {
        $this->Folio = $Folio;
        $this->FechaYHora = $FechaYHora;
        $this->Tema = $Tema;
        $this->Descripcion = $Descripcion;
        $this->Solicitante = $Solicitante;
        $this->Sucursal = $Sucursal;
        $this->Area = $Area;
        $this->FechaCompromiso = $FechaCompromiso;
        $this->Observaciones = $Observaciones;
        $this->Status = $Status;
        $this->Tipo = $Tipo;
        $this->Involucrados = $Involucrados;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setFolio(string $Folio): void
    {
        $this->Folio = $Folio;
    }

    public function getFolio(): string
    {
        return $this->Folio;
    }

    public function setFechaYHora(\DateTime $FechaYHora): void
    {
        $this->FechaYHora = $FechaYHora;
    }

    public function getFechaYHora(): \DateTime
    {
        return $this->FechaYHora;
    }

    public function setTema(?string $Tema): void
    {
        $this->Tema = $Tema;
    }

    public function getTema(): ?string
    {
        return $this->Tema;
    }

    public function setDescripcion(string $Descripcion): void
    {
        $this->Descripcion = $Descripcion;
    }

    public function getDescripcion(): string
    {
        return $this->Descripcion;
    }

    public function setSolicitante(int $Solicitante): void
    {
        $this->Solicitante = $Solicitante;
    }

    public function getSolicitante(): int
    {
        return $this->Solicitante;
    }

    public function setSucursal(int $Sucursal): void
    {
        $this->Sucursal = $Sucursal;
    }

    public function getSucursal(): int
    {
        return $this->Sucursal;
    }

    public function setArea(int $Area): void
    {
        $this->Area = $Area;
    }

    public function getArea(): int
    {
        return $this->Area;
    }

    public function setFechaCompromiso(?\DateTime $FechaCompromiso): void
    {
        $this->FechaCompromiso = $FechaCompromiso;
    }

    public function getFechaCompromiso(): ?\DateTime
    {
        return $this->FechaCompromiso;
    }

    public function setObservaciones(?string $Observaciones): void
    {
        $this->Observaciones = $Observaciones;
    }

    public function getObservaciones(): ?string
    {
        return $this->Observaciones;
    }

    public function setStatus(int $Status): void
    {
        $this->Status = $Status;
    }

    public function getStatus(): int
    {
        return $this->Status;
    }

    public function setTipo(int $Tipo): void
    {
        $this->Tipo = $Tipo;
    }

    public function getTipo(): int
    {
        return $this->Tipo;
    }

    public function setInvolucrados(?int $Involucrados): void
    {
        $this->Involucrados = $Involucrados;
    }

    public function getInvolucrados(): ?int
    {
        return $this->Involucrados;
    }

}