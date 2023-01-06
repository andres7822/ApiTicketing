<?php

    namespace App\Service\Domicilio;

    use App\Entity\Domicilio;
    use App\Repository\DomicilioRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class DomicilioRegisterService{
        private DomicilioRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(DomicilioRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function create(?int $TipoDeVialidad, ?string $Vialidad, ?int $TipoDeAsentamiento, ?string $Asentamiento, ?string $NumeroExterior, ?string $NumeroInterior, ?string $Pais, ?string $EntidadFederativa, ?string $Municipio, ?string $Localidad, ?string $CodigoPostal, ?string $Latitud, ?string $Longitud, ?string $GooglePin, int $Visible, int $Actual, \DateTime $FechaTupla, string $Origen, string $Tupla): Domicilio{
            $Domicilio = new Domicilio($TipoDeVialidad, $Vialidad, $TipoDeAsentamiento, $Asentamiento, $NumeroExterior, $NumeroInterior, $Pais, $EntidadFederativa, $Municipio, $Localidad, $CodigoPostal, $Latitud, $Longitud, $GooglePin, $Visible, $Actual, $FechaTupla, $Origen, $Tupla);

            $this->repository->save($Domicilio);

            $data = [
                'TipoDeVialidad' => $Domicilio->getTipoDeVialidad(),
                'Vialidad' => $Domicilio->getVialidad(),
                'TipoDeAsentamiento' => $Domicilio->getTipoDeAsentamiento(),
                'Asentamiento' => $Domicilio->getAsentamiento(),
                'NumeroExterior' => $Domicilio->getNumeroExterior(),
                'NumeroInterior' => $Domicilio->getNumeroInterior(),
                'Pais' => $Domicilio->getPais(),
                'EntidadFederativa' => $Domicilio->getEntidadFederativa(),
                'Municipio' => $Domicilio->getMunicipio(),
                'Localidad' => $Domicilio->getLocalidad(),
                'CodigoPostal' => $Domicilio->getCodigoPostal(),
                'Latitud' => $Domicilio->getLatitud(),
                'Longitud' => $Domicilio->getLongitud(),
                'GooglePin' => $Domicilio->getGooglePin(),
                'Visible' => $Domicilio->getVisible(),
                'Actual' => $Domicilio->getActual(),
                'FechaTupla' => $Domicilio->getFechaTupla(),
                'Origen' => $Domicilio->getOrigen(),
                'Tupla' => $Domicilio->getTupla()
            ];
            $this->accesoService->create('Domicilio', $Domicilio->getId(), 2, $data);

            return $Domicilio;
        }
    }