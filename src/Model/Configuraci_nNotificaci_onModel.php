<?php

    namespace App\Model;

    class Configuraci_nNotificaci_onModel{

        public function readDataTable($params = false): array{
            if($params && is_array($params)){
                extract($params, EXTR_OVERWRITE);
            }

            $serverQuery = [
                'table'     => [
                    'name'  => 'Configuraci_nNotificaci_on',
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
                        'name'   => '(select e.Clave from Empleado e where e.id = Usuario)',
                        'alias'  => 'Usuario',
                        'extra'  => '',
                        'render' => ''
                    ],
                    [
                        'type'   => 1,
                        'name'   => '(select tdn.Nombre from TipoDeNotificaci_on tdn where tdn.id = TipoDeNotificaci_on)',
                        'alias'  => 'TipoDeNotificaci_on',
                        'extra'  => '',
                        'render' => ''
                    ],
                    
                ],
                'condition' => $condition,
                'group'     => '',
                'order'     => ' id ASC ',
                'renderRow' => '',
                'debug'     => 0
            ];

            return $serverQuery;
        }

        public function combo($inText = false): string{
            if($inText){
                return "select * from Configuraci_nNotificaci_on where Usuario = $inText";
            }else{
                $fields = 'id, Usuario';
            }
            return "select $fields from Configuraci_nNotificaci_on order by Usuario";
        }
    }
