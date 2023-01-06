<?php

    namespace App\Api\Action\Domicilio;

    use App\Entity\Domicilio;
    use App\Service\Domicilio\DomicilioUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private DomicilioUpdateService $service;

        public function __construct(DomicilioUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): Domicilio{
            $TipoDeVialidad = RequestService::getField($request, 'TipoDeVialidad', false);
            $Vialidad = RequestService::getField($request, 'Vialidad', false);
            $TipoDeAsentamiento = RequestService::getField($request, 'TipoDeAsentamiento', false);
            $Asentamiento = RequestService::getField($request, 'Asentamiento', false);
            $NumeroExterior = RequestService::getField($request, 'NumeroExterior', false);
            $NumeroInterior = RequestService::getField($request, 'NumeroInterior', false);
            $Pais = RequestService::getField($request, 'Pais', false);
            $EntidadFederativa = RequestService::getField($request, 'EntidadFederativa', false);
            $Municipio = RequestService::getField($request, 'Municipio', false);
            $Localidad = RequestService::getField($request, 'Localidad', false);
            $CodigoPostal = RequestService::getField($request, 'CodigoPostal', false);
            $Latitud = RequestService::getField($request, 'Latitud', false);
            $Longitud = RequestService::getField($request, 'Longitud', false);
            $GooglePin = RequestService::getField($request, 'GooglePin', false);
            $Visible = RequestService::getField($request, 'Visible');
            $Actual = RequestService::getField($request, 'Actual');
            $FechaTupla = RequestService::getField($request, 'FechaTupla');
            $Origen = RequestService::getField($request, 'Origen');
            $Tupla = RequestService::getField($request, 'Tupla');

            return $this->service->update($id, $TipoDeVialidad, $Vialidad, $TipoDeAsentamiento, $Asentamiento, $NumeroExterior, $NumeroInterior, $Pais, $EntidadFederativa, $Municipio, $Localidad, $CodigoPostal, $Latitud, $Longitud, $GooglePin, $Visible, $Actual, $FechaTupla, $Origen, $Tupla);
        }
    }