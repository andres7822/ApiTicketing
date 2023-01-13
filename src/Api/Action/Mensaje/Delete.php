<?php

    namespace App\Api\Action\Mensaje;

    use App\Entity\Mensaje;
    use App\Service\Mensaje\MensajeDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private MensajeDeleteService $service;

        public function __construct(MensajeDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Mensaje{
            return $this->service->delete($id);
        }
    }