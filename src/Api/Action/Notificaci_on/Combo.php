<?php
    
    declare(strict_types=1);
    
    
    namespace App\Api\Action\Notificaci_on;
    
    use App\Model\Notificaci_onModel;
    use App\Service\systemCore\Combo as ComboService;
    use Doctrine\DBAL\Driver\Exception as ExceptionDBAL;
    use Doctrine\DBAL\Exception;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Request;

    class Combo{
        private ComboService $combo;
        private Notificaci_onModel $model;
        
        public function __construct(ComboService $combo, Notificaci_onModel $model){
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