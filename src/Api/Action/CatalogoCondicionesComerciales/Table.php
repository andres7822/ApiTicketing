<?php
    
    declare(strict_types=1);
    
    
    namespace App\Api\Action\CatalogoCondicionesComerciales;
    
    use App\Service\systemCore\Datatable;
    use App\Model\CatalogoCondicionesComercialesModel;
    use Doctrine\DBAL\Driver\Exception as ExceptionDBAL;
    use Doctrine\DBAL\Exception;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Request;

    class Table{
        private Datatable $datatable;
        private CatalogoCondicionesComercialesModel $model;
    
        public function __construct(Datatable $datatable, CatalogoCondicionesComercialesModel $model){
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