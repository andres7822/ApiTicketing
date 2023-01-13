<?php

namespace App\Service\systemUser;

use App\Entity\systemUser;
use App\Repository\systemUserRepository;
use App\Service\systemLog\systemLogRegisterService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class systemUserRegisterService
{
    private systemUserRepository $repository;
    private systemLogRegisterService $accesoService;

    public function __construct(systemUserRepository     $repository,
                                systemLogRegisterService $accesoService)
    {
        $this->repository = $repository;
        $this->accesoService = $accesoService;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function create(?string $user, ?string $password, ?string $email, ?string $selfie, ?string $tag, ?string $fullName, ?string $address, ?string $phone, ?int $area, ?int $idSystemUserStatus, ?int $idSystemRole, ?int $tries, ?string $position, ?string $skype, ?int $empleado): systemUser
    {
        $systemUser = new systemUser($user, $password, $email, $selfie, $tag, $fullName, $address, $phone, $area, $idSystemUserStatus, $idSystemRole, $tries, $position, $skype, $empleado);

        $this->repository->save($systemUser);

        $data = [
            'user' => $systemUser->getuser(),
            'password' => $systemUser->getpassword(),
            'email' => $systemUser->getemail(),
            'selfie' => $systemUser->getselfie(),
            'tag' => $systemUser->gettag(),
            'fullName' => $systemUser->getfullName(),
            'address' => $systemUser->getaddress(),
            'phone' => $systemUser->getphone(),
            'area' => $systemUser->getarea(),
            'idSystemUserStatus' => $systemUser->getidSystemUserStatus(),
            'idSystemRole' => $systemUser->getidSystemRole(),
            'tries' => $systemUser->gettries(),
            'position' => $systemUser->getposition(),
            'skype' => $systemUser->getskype(),
            'empleado' => $systemUser->getempleado()
        ];
        $this->accesoService->create('systemUser', $systemUser->getId(), 2, $data);

        return $systemUser;
    }
}