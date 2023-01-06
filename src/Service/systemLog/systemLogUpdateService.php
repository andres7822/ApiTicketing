<?php

    namespace App\Service\systemLog;

    use App\Entity\systemLog;
    use App\Repository\systemLogRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class systemLogUpdateService{
        private systemLogRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(systemLogRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function update(int $id, ?string $table, ?string $tuple, ?\DateTime $date, ?string $data, ?int $idSystemUser, ?int $idSystemAction, ?string $ipAddress, ?string $agent, ?string $form): systemLog{
            $systemLog = $this->repository->findById($id);
            $systemLog->settable($table);
            $systemLog->settuple($tuple);
            $systemLog->setdate($date);
            $systemLog->setdata($data);
            $systemLog->setidSystemUser($idSystemUser);
            $systemLog->setidSystemAction($idSystemAction);
            $systemLog->setipAddress($ipAddress);
            $systemLog->setagent($agent);
            $systemLog->setform($form);
            $this->repository->save($systemLog);

            $data = [
                'table' => $systemLog->gettable(),
                'tuple' => $systemLog->gettuple(),
                'date' => $systemLog->getdate(),
                'data' => $systemLog->getdata(),
                'idSystemUser' => $systemLog->getidSystemUser(),
                'idSystemAction' => $systemLog->getidSystemAction(),
                'ipAddress' => $systemLog->getipAddress(),
                'agent' => $systemLog->getagent(),
                'form' => $systemLog->getform()
            ];
            $this->accesoService->create('systemLog', $id, 5, $data);

            return $systemLog;
        }
    }