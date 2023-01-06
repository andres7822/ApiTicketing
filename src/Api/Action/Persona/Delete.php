<?php

    namespace App\Api\Action\Persona;

    use App\Entity\Persona;
    use App\Service\Persona\PersonaDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private PersonaDeleteService $service;

        public function __construct(PersonaDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Persona{
            return $this->service->delete($id);
        }
    }