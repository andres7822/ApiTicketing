<?php

namespace App\Service\Configuraci_nNotificaci_on;

use App\Entity\Configuraci_nNotificaci_on;
use App\Repository\Configuraci_nNotificaci_onRepository;
use App\Service\systemLog\systemLogRegisterService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class Configuraci_nNotificaci_onUpdateService
{
    private Configuraci_nNotificaci_onRepository $repository;
    private systemLogRegisterService $accesoService;

    public function __construct(Configuraci_nNotificaci_onRepository $repository,
                                systemLogRegisterService             $accesoService)
    {
        $this->repository = $repository;
        $this->accesoService = $accesoService;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function update(mixed $id, int $Usuario, int $TipoDeNotificaci_on): Configuraci_nNotificaci_on
    {
        if ($Usuario == null) {
            $Usuario = $this->tokenStorage->getToken()?->getUser()?->getId();
        }
        $Configuraci_nNotificaci_on = $this->repository->findById($id);
        $Configuraci_nNotificaci_on->setUsuario($Usuario);
        $Configuraci_nNotificaci_on->setTipoDeNotificaci_on($TipoDeNotificaci_on);
        $this->repository->save($Configuraci_nNotificaci_on);

        $data = [
            'Usuario' => $Configuraci_nNotificaci_on->getUsuario(),
            'TipoDeNotificaci_on' => $Configuraci_nNotificaci_on->getTipoDeNotificaci_on()
        ];
        $this->accesoService->create('Configuraci_nNotificaci_on', $id, 5, $data);

        return $Configuraci_nNotificaci_on;
    }
}