<?php

    namespace App\Api\Action\systemUser;

    use App\Entity\systemUser;
    use App\Service\systemUser\systemUserRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private systemUserRegisterService $service;

        public function __construct(systemUserRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): systemUser{
            $user = RequestService::getField($request, 'user', false);
            $password = RequestService::getField($request, 'password', false);
            $email = RequestService::getField($request, 'email', false);
            $selfie = RequestService::getField($request, 'selfie', false);
            $tag = RequestService::getField($request, 'tag', false);
            $fullName = RequestService::getField($request, 'fullName', false);
            $address = RequestService::getField($request, 'address', false);
            $phone = RequestService::getField($request, 'phone', false);
            $area = RequestService::getField($request, 'area', false);
            $idSystemUserStatus = RequestService::getField($request, 'idSystemUserStatus', false);
            $idSystemRole = RequestService::getField($request, 'idSystemRole', false);
            $tries = RequestService::getField($request, 'tries', false);
            $position = RequestService::getField($request, 'position', false);
            $skype = RequestService::getField($request, 'skype', false);
            $empleado = RequestService::getField($request, 'empleado', false);

            return $this->service->create($user, $password, $email, $selfie, $tag, $fullName, $address, $phone, $area, $idSystemUserStatus, $idSystemRole, $tries, $position, $skype, $empleado);
        }
    }