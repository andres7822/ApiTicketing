<?php

    namespace App\Service\Domicilio;

    use App\Entity\Domicilio;
    use App\Repository\DomicilioRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class DomicilioUpdateService{
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
        public function update(int $id, ?int $TipoDeVialidad, ?string $Vialidad, ?int $TipoDeAsentamiento, ?string $Asentamiento, ?string $NumeroExterior, ?string $NumeroInterior, ?string $Pais, ?string $EntidadFederativa, ?string $Municipio, ?string $Localidad, ?string $CodigoPostal, ?string $Latitud, ?string $Longitud, ?string $GooglePin, int $Visible, int $Actual, \DateTime $FechaTupla, string $Origen, string $Tupla): Domicilio{
            $Domicilio = $this->repository->findById($id);
            $Domicilio->setTipoDeVialidad($TipoDeVialidad);
            $Domicilio->setVialidad($Vialidad);
            $Domicilio->setTipoDeAsentamiento($TipoDeAsentamiento);
            $Domicilio->setAsentamiento($Asentamiento);
            $Domicilio->setNumeroExterior($NumeroExterior);
            $Domicilio->setNumeroInterior($NumeroInterior);
            $Domicilio->setPais($Pais);
            $Domicilio->setEntidadFederativa($EntidadFederativa);
            $Domicilio->setMunicipio($Municipio);
            $Domicilio->setLocalidad($Localidad);
            $Domicilio->setCodigoPostal($CodigoPostal);
            $Domicilio->setLatitud($Latitud);
            $Domicilio->setLongitud($Longitud);
            $Domicilio->setGooglePin($GooglePin);
            $Domicilio->setVisible($Visible);
            $Domicilio->setActual($Actual);
            $Domicilio->setFechaTupla($FechaTupla);
            $Domicilio->setOrigen($Origen);
            $Domicilio->setTupla($Tupla);
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
            $this->accesoService->create('Domicilio', $id, 5, $data);

            return $Domicilio;
        }
    }