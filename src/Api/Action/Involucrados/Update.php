<?php

    namespace App\Api\Action\Involucrados;

    use App\Entity\Involucrados;
    use App\Service\Involucrados\InvolucradosUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private InvolucradosUpdateService $service;

        public function __construct(InvolucradosUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): Involucrados{
            $NivelDeParticipacion = RequestService::getField($request, 'NivelDeParticipacion');
            $Ticket = RequestService::getField($request, 'Ticket');
            $Participante = RequestService::getField($request, 'Participante');
            $Participacion = RequestService::getField($request, 'Participacion');

            return $this->service->update($id, $NivelDeParticipacion, $Ticket, $Participante, $Participacion);
        }
    }