<?php
    
    declare(strict_types=1);
    
    
    namespace App\Service\systemCore;
    
    use App\Entity\systemUser;

    /**
     * @deprecated
     */
    class LogAccess{
        private systemUser $usuario;
    
        public function __construct(systemUser $usuario){
            $this->usuario = $usuario;
        }
    
        public static function RecordLog(string $table, int $idRecord, int $action, mixed $Data){
        
        }
    }