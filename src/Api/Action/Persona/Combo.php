<?php
    
    declare(strict_types=1);
    
    
    namespace App\Api\Action\Persona;
    
    use App\Model\PersonaModel;
    use App\Service\systemCore\Combo as ComboService;
    use Doctrine\DBAL\Driver\Exception as ExceptionDBAL;
    use Doctrine\DBAL\Exception;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Request;

    class Combo{
        private ComboService $combo;
        private PersonaModel $model;
        
        public function __construct(ComboService $combo, PersonaModel $model){
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