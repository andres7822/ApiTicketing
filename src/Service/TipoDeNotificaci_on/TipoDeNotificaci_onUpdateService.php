<?php

    namespace App\Service\TipoDeNotificaci_on;

    use App\Entity\TipoDeNotificaci_on;
    use App\Repository\TipoDeNotificaci_onRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class TipoDeNotificaci_onUpdateService{
        private TipoDeNotificaci_onRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(TipoDeNotificaci_onRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function update(int $id, string $Nombre): TipoDeNotificaci_on{
            $TipoDeNotificaci_on = $this->repository->findById($id);
            $TipoDeNotificaci_on->setNombre($Nombre);
            $this->repository->save($TipoDeNotificaci_on);

            $data = [
                'Nombre' => $TipoDeNotificaci_on->getNombre()
            ];
            $this->accesoService->create('TipoDeNotificaci_on', $id, 5, $data);

            return $TipoDeNotificaci_on;
        }
    }