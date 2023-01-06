<?php

declare(strict_types=1);


namespace App\Api\Action\StatusTicket;

use App\Model\StatusTicketModel;
use App\Service\systemCore\Combo as ComboService;
use Doctrine\DBAL\Driver\Exception as ExceptionDBAL;
use Doctrine\DBAL\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class Combo{
    private ComboService $combo;
    private StatusTicketModel $model;

    public function __construct(ComboService $combo, StatusTicketModel $model){
        $this->combo = $combo;
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

        return $this->combo->comboController($this->model, $inText);
    }
}