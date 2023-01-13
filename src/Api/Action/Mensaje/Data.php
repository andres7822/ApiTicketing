<?php

    namespace App\Api\Action\Mensaje;

    use App\Entity\Mensaje;
    use App\Service\Mensaje\MensajeDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private MensajeDataService $service;

        public function __construct(MensajeDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Mensaje{
            return $this->service->data($id);
        }
    }