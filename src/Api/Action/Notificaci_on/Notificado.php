<?php

declare(strict_types=1);


namespace App\Api\Action\Notificaci_on;

use App\Model\Notificaci_onModel;
use App\Service\systemCore\Notificado as NotificadoService;
use Doctrine\DBAL\Driver\Exception as ExceptionDBAL;
use Doctrine\DBAL\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class Notificado{
    private NotificadoService $notificado;
    private Notificaci_onModel $model;

    public function __construct(NotificadoService $notificado, Notificaci_onModel $model){
        $this->notificado = $notificado;
        $this->model = $model;
    }

    /**
     * @throws ExceptionDBAL
     * @throws Exception
     */
    public function __invoke(Request $request): JsonResponse{
        $inText = $request->get('inText');

        if($inText == 'false'){
            $inText = false;
        }

        return $this->notificado->notificadoController($this->model, $inText);
    }
}