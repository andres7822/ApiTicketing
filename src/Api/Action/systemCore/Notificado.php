<?php

namespace App\Service\systemCore;

use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Driver\Exception as ExceptionDriver;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class Notificado{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    /**
     * @throws Exception
     * @throws ExceptionDriver
     */
    public function notificadoController(object $Class, $inText = false, ?array $Params = null): JsonResponse{
        $config = $Class->notificado($inText, $Params);

        return new JsonResponse(
            json_encode($this->entityManager->getConnection()->executeQuery($config)->fetchAllNumeric(), JSON_NUMERIC_CHECK), 200, [], true
        );
    }
}