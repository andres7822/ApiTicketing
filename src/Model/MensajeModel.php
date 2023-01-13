<?php

    namespace App\Model;

    class MensajeModel{

        public function readDataTable($params = false): array{
            if($params && is_array($params)){
                extract($params, EXTR_OVERWRITE);
            }

            $serverQuery = [
                'table'     => [
                    'name'  => 'Mensaje',
                    'alias' => ''
                ],
                'index'     => [
                    'name'  => 'id',
                    'alias' => ''
                ],
                'columns'   => [
                    [
                        'type'   => 0,
                        'name'   => '',
                        'alias'  => '',
                        'extra'  => 'actions',
                        'render' => ''
                    ],
                    [
                        'type'   => 1,
                        'name'   => 'Mensaje',
                        'alias'  => '',
                        'extra'  => '',
                        'render' => ''
                    ],
                    
                ],
                'condition' => '',
                'group'     => '',
                'order'     => ' id ASC ',
                'renderRow' => '',
                'debug'     => 0
            ];

            return $serverQuery;
        }

        public function combo($inText = false): string{
            if($inText){
                $fields = 'Mensaje, Mensaje';
            }else{
                $fields = 'id, Mensaje';
            }

            return "select $fields from Mensaje order by Mensaje";
        }
    }
