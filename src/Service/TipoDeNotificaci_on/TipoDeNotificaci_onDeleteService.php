<?php

    namespace App\Service\TipoDeNotificaci_on;

    use App\Entity\TipoDeNotificaci_on;
    use App\Repository\TipoDeNotificaci_onRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class TipoDeNotificaci_onDeleteService{
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
        public function delete(int $id): TipoDeNotificaci_on{
            $TipoDeNotificaci_on = $this->repository->findById($id);
            $data = [
                'Nombre' => $TipoDeNotificaci_on->getNombre()
            ];

            $this->repository->removeEntity($TipoDeNotificaci_on);

            $this->accesoService->create('TipoDeNotificaci_on', $id, 3, $data);

            return $TipoDeNotificaci_on;
        }
    }