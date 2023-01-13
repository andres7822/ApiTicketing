<?php
    
    declare(strict_types=1);
    
    
    namespace App\Api\Action\Notificaci_on;
    
    use App\Service\systemCore\Datatable;
    use App\Model\Notificaci_onModel;
    use Doctrine\DBAL\Driver\Exception as ExceptionDBAL;
    use Doctrine\DBAL\Exception;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Request;

    class Table{
        private Datatable $datatable;
        private Notificaci_onModel $model;
    
        public function __construct(Datatable $datatable, Notificaci_onModel $model){
            $this->datatable = $datatable;
            $this->model = $model;
        }
    
        /**
         * @throws Exception
         * @throws ExceptionDBAL
         */
        public function __invoke(Request $request, string $serveFunction): JsonResponse{
            return $this->datatable->datatableController($request, $this->model, $serveFunction);
        }
    }