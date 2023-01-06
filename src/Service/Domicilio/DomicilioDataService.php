<?php

    namespace App\Service\Domicilio;

    use App\Entity\Domicilio;
    use App\Repository\DomicilioRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class DomicilioDataService{
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
        public function data(int $id): Domicilio{
            $Domicilio = $this->repository->findById($id);
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

            $this->accesoService->create('Domicilio', $id, 4, $data);

            return $Domicilio;
        }
    }