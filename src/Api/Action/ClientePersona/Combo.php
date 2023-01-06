<?php
    
    declare(strict_types=1);
    
    
    namespace App\Api\Action\ClientePersona;
    
    use App\Model\ClientePersonaModel;
    use App\Service\systemCore\Combo as ComboService;
    use Doctrine\DBAL\Driver\Exception as ExceptionDBAL;
    use Doctrine\DBAL\Exception;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Request;

    class Combo{
        private ComboService $combo;
        private ClientePersonaModel $model;
        
        public function __construct(ComboService $combo, ClientePersonaModel $model){
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