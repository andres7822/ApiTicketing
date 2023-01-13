<?php

namespace App\Service\Configuraci_nNotificaci_on;

use App\Entity\Configuraci_nNotificaci_on;
use App\Repository\Configuraci_nNotificaci_onRepository;
use App\Service\systemLog\systemLogRegisterService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class Configuraci_nNotificaci_onRegisterService
{
    private Configuraci_nNotificaci_onRepository $repository;
    private systemLogRegisterService $accesoService;
    private TokenStorageInterface $tokenStorage;


    public function __construct(Configuraci_nNotificaci_onRepository $repository,
                                systemLogRegisterService             $accesoService,
                                TokenStorageInterface                $tokenStorage)
    {
        $this->repository = $repository;
        $this->accesoService = $accesoService;
        $this->tokenStorage = $tokenStorage;

    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function create(mixed $Usuario, int $TipoDeNotificaci_on): Configuraci_nNotificaci_on
    {
        /*if ($Usuario == null) {
            $Usuario = $this->tokenStorage->getToken()?->getUser()?->getId();
        }*/

        $Configuraci_nNotificaci_on = new Configuraci_nNotificaci_on($Usuario, $TipoDeNotificaci_on);


        $this->repository->save($Configuraci_nNotificaci_on);

        $data = [
            'Usuario' => $Configuraci_nNotificaci_on->getUsuario(),
            'TipoDeNotificaci_on' => $Configuraci_nNotificaci_on->getTipoDeNotificaci_on()
        ];
        $this->accesoService->create('Configuraci_nNotificaci_on', $Configuraci_nNotificaci_on->getId(), 2, $data);

        return $Configuraci_nNotificaci_on;
    }
}