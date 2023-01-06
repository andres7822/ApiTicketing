<?php

    namespace App\Api\Action\Persona;

    use App\Entity\Persona;
    use App\Service\Persona\PersonaDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private PersonaDataService $service;

        public function __construct(PersonaDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Persona{
            return $this->service->data($id);
        }
    }