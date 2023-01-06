<?php

    namespace App\Api\Action\Involucrados;

    use App\Entity\Involucrados;
    use App\Service\Involucrados\InvolucradosRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private InvolucradosRegisterService $service;

        public function __construct(InvolucradosRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): Involucrados{
            $NivelDeParticipacion = RequestService::getField($request, 'NivelDeParticipacion');
            $Ticket = RequestService::getField($request, 'Ticket');
            $Participante = RequestService::getField($request, 'Participante');
            $Participacion = RequestService::getField($request, 'Participacion');

            return $this->service->create($NivelDeParticipacion, $Ticket, $Participante, $Participacion);
        }
    }