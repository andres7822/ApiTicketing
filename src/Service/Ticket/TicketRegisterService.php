<?php

namespace App\Service\Ticket;

use App\Entity\Ticket;
use App\Repository\TicketRepository;
use App\Service\systemLog\systemLogRegisterService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class TicketRegisterService
{
    private TicketRepository $repository;
    private systemLogRegisterService $accesoService;
    private TokenStorageInterface $tokenStorage;


    public function __construct(TicketRepository         $repository,
                                systemLogRegisterService $accesoService,
                                TokenStorageInterface    $tokenStorage)
    {
        $this->repository = $repository;
        $this->accesoService = $accesoService;
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function create(string $Folio, mixed $FechaYHora, ?string $Tema, string $Descripcion, ?int $Solicitante, int $Sucursal, ?int $Area, mixed $FechaCompromiso, ?string $Observaciones, int $Status, int $Tipo, ?int $Involucrados): Ticket
    {
        if (!($FechaYHora instanceof \DateTime)) {
            $FechaYHora = new \DateTime($FechaYHora);
        }
        if (!($FechaCompromiso instanceof \DateTime) && strlen($FechaCompromiso)) {
            $FechaCompromiso = new \DateTime($FechaCompromiso);
        }
        if ($Solicitante == null) {
            $Solicitante = $this->tokenStorage->getToken()?->getUser()?->getId();
        }
        $Ticket = new Ticket($Folio, $FechaYHora, $Tema, $Descripcion, $Solicitante, $Sucursal, $Area, $FechaCompromiso, $Observaciones, $Status, $Tipo, $Involucrados);
        $this->repository->save($Ticket);

        $data = [
            'Folio' => $Ticket->getFolio(),
            'FechaYHora' => $Ticket->getFechaYHora(),
            'Tema' => $Ticket->getTema(),
            'Descripcion' => $Ticket->getDescripcion(),
            'Solicitante' => $Ticket->getSolicitante(),
            'Sucursal' => $Ticket->getSucursal(),
            'Area' => $Ticket->getArea(),
            'FechaCompromiso' => $Ticket->getFechaCompromiso(),
            'Observaciones' => $Ticket->getObservaciones(),
            'Status' => $Ticket->getStatus(),
            'Tipo' => $Ticket->getTipo(),
            'Involucrados' => $Ticket->getInvolucrados()
        ];

        $this->accesoService->create('Ticket', $Ticket->getId(), 2, $data);

        return $Ticket;
    }
}